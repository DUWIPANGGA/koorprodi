<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Domisili;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DomisiliController extends Controller
{
    public function index()
    {
        $domisili = Domisili::with(['mahasiswa', 'fotos'])
            ->where('mahasiswa_id', Auth::user()->id)
            ->latest()
            ->get();

        return view('domisili.index', compact('domisili'));
    }

    public function create()
    {
        $mahasiswa = User::findOrFail(Auth::user()->id);
        return view('domisili.create', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat_lengkap' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'fotos.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $domisili = Domisili::create([
            'mahasiswa_id' => Auth::user()->id,
            'alamat_lengkap' => $request->alamat_lengkap,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => 'pending',
        ]);

        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $path = $foto->store('domisili_fotos', 'public');
                $domisili->fotos()->create(['path' => $path]);
            }
        }

        return redirect()->route('domisili.index')
            ->with('success', 'Pengajuan domisili berhasil dikirim');
    }

    public function show(Domisili $domisili)
    {
        return view('domisili.show', compact('domisili'));
    }
    // Add these methods to your DomisiliController

public function adminIndex()
{
    $domisili = Domisili::with(['mahasiswa', 'fotos'])
        ->latest()
        ->get();

    return view('admin.domisili.index', compact('domisili'));
}

public function approve(Domisili $domisili)
{
    $domisili->update([
        'status' => 'approved',
        'keterangan' => 'Pengajuan domisili telah disetujui'
    ]);

    return redirect()->back()
        ->with('success', 'Pengajuan domisili berhasil disetujui');
}

public function reject(Request $request, Domisili $domisili)
{
    $request->validate([
        'keterangan' => 'required|string|max:255'
    ]);

    $domisili->update([
        'status' => 'rejected',
        'keterangan' => $request->keterangan
    ]);

    return redirect()->back()
        ->with('success', 'Pengajuan domisili berhasil ditolak');
}
}