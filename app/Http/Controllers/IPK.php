<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rekap;
use App\Exports\RekapExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class IPK extends Controller
{
    public function export()
    {
        return Excel::download(new RekapExport, 'data-rekap-KHS.xlsx');
    }

    public function main()
    {
        $ipks = Rekap::where('user_id', Auth::user()->id)->get();
        return view('ipk.main', compact('ipks'));
    }
    public function index()
    {
        $user = Auth::user();
        $rekaps = Rekap::select('rekap.*', 'users.name', 'users.NIM')
            ->join('users', 'rekap.user_id', '=', 'users.id')
            ->get();
        // dd($rekaps);
        return view('ipk.index', compact('rekaps', 'user'));
    }

    public function create()
    {
        return view('ipk.create');
    }

    public function store(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'IPK' => 'required',
        'dokumen' => 'required|mimes:pdf',
    ]);
    
    // Cek apakah data rekap untuk user sudah ada
    $existingRekap = Rekap::where('user_id', $user->id)->where('semester', $request->semester)->first();
    if ($existingRekap) {
        return redirect()->back()->with('error', 'Rekap untuk semester ini sudah ada.');
    }

    // Nama dokumen
    $documentName = $user->nim . '-IPK-semester-' . $request->semester . '.' . $request->dokumen->extension();
    $path = storage_path('app/public/angkatan-' . $user->angkatan . '/semester-' . $request->semester);

    // Buat direktori jika belum ada
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }

    // Hapus file jika sudah ada
    if (file_exists($path . '/' . $documentName)) {
        unlink($path . '/' . $documentName);
    }

    // Simpan file
    if ($request->dokumen->storeAs('angkatan-' . $user->angkatan . '/semester-' . $request->semester, $documentName, 'public')) {
        $storedPath = 'storage/angkatan-' . $user->angkatan . '/semester-' . $request->semester . '/' . $documentName;
        
        Rekap::create([
            'user_id' => $user->id,
            'IPK' => $request->IPK,
            'dokumen' => $storedPath,
            'semester' => $user->semester,
            'kesulitan' => $request->kesulitan,
        ]);
        
        $user = User::find(Auth::user()->id);
        if ($user) {
            $user->update([
                'pelaporan_ipk' => 1
            ]);
        }
        
        return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan');
    } else {
        return redirect()->back()->with('error', 'Gagal menyimpan dokumen.');
    }
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ipk = Rekap::find($id);
        return view('ipk.show', compact('ipk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rekap = Rekap::select('rekap.*', 'users.name', 'users.nim')
            ->join('users', 'rekap.user_id', '=', 'users.id')
            ->where('rekap.id', $id)
            ->first();

        if (!$rekap) {
            return redirect()->route('rekap.index')->with('error', 'Data tidak ditemukan.');
        }

        return view('ipk.edit', compact('rekap'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'IPS' => 'required',
            'IPK' => 'required',
            'dokumen' => 'required',
            'semester' => 'required',
            'user_id' => 'required',
        ]);

        Rekap::find($id)->update($request->all());
        return redirect()->route('ipk.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Show form for user to edit their own pending rekap.
     */
    public function userEdit($id)
    {
        $rekap = Rekap::where('id', $id)->where('user_id', Auth::id())->where('validated', 0)->firstOrFail();
        return view('ipk.user-edit', compact('rekap'));
    }

    /**
     * Update user's own pending rekap.
     */
    public function userUpdate(Request $request, $id)
    {
        $rekap = Rekap::where('id', $id)->where('user_id', Auth::id())->where('validated', 0)->firstOrFail();
        $user = Auth::user();

        $request->validate([
            'IPK' => 'required|numeric|min:0|max:4',
            'kesulitan' => 'required',
        ]);

        $updateData = [
            'IPK' => $request->IPK,
            'kesulitan' => $request->kesulitan,
        ];

        if ($request->hasFile('dokumen')) {
            $request->validate(['dokumen' => 'mimes:pdf']);
            $documentName = $user->nim . '-IPK-semester-' . $rekap->semester . '.' . $request->dokumen->extension();
            $path = storage_path('app/public/angkatan-' . $user->angkatan . '/semester-' . $rekap->semester);
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if ($request->dokumen->storeAs('angkatan-' . $user->angkatan . '/semester-' . $rekap->semester, $documentName, 'public')) {
                $updateData['dokumen'] = 'storage/angkatan-' . $user->angkatan . '/semester-' . $rekap->semester . '/' . $documentName;
            }
        }

        $rekap->update($updateData);
        $user->update(['pelaporan_ipk' => 1]);

        return redirect()->route('dashboard')->with('success', 'Data rekap berhasil diperbarui.');
    }

    /**
     * Admin rejects a rekap — allows user to re-edit.
     */
    public function tolak($id)
    {
        $rekap = Rekap::findOrFail($id);
        $user = User::find($rekap->user_id);
        if ($user) {
            $user->update(['pelaporan_ipk' => 0]);
        }
        return redirect()->route('Rekap.index')->with('success', 'Rekap ditolak, mahasiswa dapat mengedit ulang.');
    }

    public function validasi(Request $request, $id)
    {
        $request->validate([
            'IPK' => 'required',
            'semester' => 'required',
        ]);
        $rekap = Rekap::find($id);
        if ($rekap->semester != $request->semester) {
            $user = User::find($rekap->user_id);

            $oldName = $user->nim . '-IPK-semester-' . $rekap->semester . '.pdf';
            $newName = $user->nim . '-IPK-semester-' . $request->semester . '.pdf';
            $path = 'angkatan-' . $user->angkatan;
            
            if (Storage::disk('public')->exists($path . '/' . $oldName)) {
                Storage::disk('public')->move($path . '/' . $oldName, $path . '/' . $newName);
                
                $rekap->update([
                'dokumen' => 'storage/'. $path . '/' . $newName
                ]);
            }
        }
        // dd($request->semester);
        $rekap->update([
            'IPK' => $request->IPK,
            'semester' => $request->semester,
            'validated' => 1,
        ]);

        return redirect()->route('Rekap.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rekap::find($id)->delete();
        return redirect()->route('Rekap.index')->with('success', 'Data berhasil dihapus');
    }
}
