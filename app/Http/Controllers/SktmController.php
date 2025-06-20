<?php
namespace App\Http\Controllers;

use App\Models\Sktm;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\SktmDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SktmController extends Controller
{
    public function index()
    {
        $sktm = Sktm::with(['mahasiswa', 'dokumen'])
            ->where('mahasiswa_id', Auth::user()->id)
            ->latest()
            ->get();

        return view('sktm.index', compact('sktm'));
    }

    public function create()
    {
        $mahasiswa = User::findOrFail(Auth::user()->id);
        return view('sktm.create', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alasan' => 'required|string|max:1000',
            'ktm' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'kk' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'surat_rt' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $sktm = Sktm::create([
            'mahasiswa_id' => Auth::user()->id,
            'alasan' => $request->alasan,
            'status' => 'pending',
        ]);

        // Save documents
        $dokumen = [
            ['jenis' => 'KTM', 'file' => $request->ktm],
            ['jenis' => 'KK', 'file' => $request->kk],
            ['jenis' => 'SKTM', 'file' => $request->surat_rt],
        ];

        foreach ($dokumen as $doc) {
            $path = $doc['file']->store('sktm_dokumen', 'public');
            $sktm->dokumen()->create([
                'jenis' => $doc['jenis'],
                'path' => $path
            ]);
        }

        return redirect()->route('sktm.index')
            ->with('success', 'Pengajuan SKTM berhasil dikirim');
    }

    public function show(Sktm $sktm)
    {
        return view('sktm.show', compact('sktm'));
    }

    // Admin methods
    public function adminIndex()
    {
        $sktm = Sktm::with(['mahasiswa', 'dokumen'])
            ->latest()
            ->get();

        return view('sktm.admin.index', compact('sktm'));
    }

    public function approve(Sktm $sktm)
    {
        $sktm->update([
            'status' => 'approved',
            'no_surat' => 'SKTM/' . now()->format('Ymd') . '/' . $sktm->id,
            'keterangan' => 'Surat Keterangan Tidak Mampu telah disetujui'
        ]);

        return redirect()->back()
            ->with('success', 'Pengajuan SKTM berhasil disetujui');
    }

    public function reject(Request $request, Sktm $sktm)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255'
        ]);

        $sktm->update([
            'status' => 'rejected',
            'keterangan' => $request->keterangan
        ]);

        return redirect()->back()
            ->with('success', 'Pengajuan SKTM berhasil ditolak');
    }
    // Add these methods to your existing SktmController

public function edit(Sktm $sktm)
{
    // Only allow edit if status is pending
    if ($sktm->status != 'pending') {
        return redirect()->route('sktm.index')
            ->with('error', 'Hanya pengajuan dengan status pending yang dapat diubah');
    }

    $mahasiswa = $sktm->mahasiswa;
    return view('sktm.edit', compact('sktm', 'mahasiswa'));
}

public function update(Request $request, Sktm $sktm)
{
    // Only allow update if status is pending
    if ($sktm->status != 'pending') {
        return redirect()->route('sktm.index')
            ->with('error', 'Hanya pengajuan dengan status pending yang dapat diubah');
    }

    $request->validate([
        'alasan' => 'required|string|max:1000',
        'ktm' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        'kk' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        'surat_rt' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
    ]);

    $sktm->update([
        'alasan' => $request->alasan,
    ]);

    // Update documents if new ones are uploaded
    $dokumenTypes = [
        'ktp' => 'KTP',
        'kk' => 'KK',
        'surat_rt' => 'SKTM'
    ];

    foreach ($dokumenTypes as $field => $jenis) {
        if ($request->hasFile($field)) {
            // Delete old document if exists
            $oldDoc = $sktm->dokumen()->where('jenis', $jenis)->first();
            if ($oldDoc) {
                Storage::delete('public/' . $oldDoc->path);
                $oldDoc->delete();
            }

            // Save new document
            $path = $request->file($field)->store('sktm_dokumen', 'public');
            $sktm->dokumen()->create([
                'jenis' => $jenis,
                'path' => $path
            ]);
        }
    }

    return redirect()->route('sktm.index')
        ->with('success', 'Pengajuan SKTM berhasil diperbarui');
}

public function destroy(Sktm $sktm)
{
    // Only allow delete if status is pending
    if ($sktm->status != 'pending') {
        return redirect()->route('sktm.index')
            ->with('error', 'Hanya pengajuan dengan status pending yang dapat dihapus');
    }

    // Delete all related documents
    foreach ($sktm->dokumen as $dokumen) {
        Storage::delete('public/' . $dokumen->path);
        $dokumen->delete();
    }

    $sktm->delete();

    return redirect()->route('sktm.index')
        ->with('success', 'Pengajuan SKTM berhasil dihapus');
}
}