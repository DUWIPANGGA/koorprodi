<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class IPK extends Controller
{
    public function main()
    {
        $rekaps = Rekap::where('validated', 0)->get();
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
        'semester' => 'required',
    ]);

    // Cek apakah data rekap untuk user sudah ada
    $existingRekap = Rekap::where('user_id', $user->id)->where('semester', $request->semester)->first();
    if ($existingRekap) {
        return redirect()->back()->with('error', 'Rekap untuk semester ini sudah ada.');
    }

    // Nama dokumen
    $documentName = $user->nim . '-IPK-semester-' . $request->semester . '.' . $request->dokumen->extension();
    $path = storage_path('app/public/angkatan-' . $user->angkatan);

    if (!File::exists($path)) {
        File::makeDirectory($path, 0755, true);
    }

    // Cek apakah file sudah ada
    if (file_exists($path . '/' . $documentName)) {
        return redirect()->back()->with('error', 'Dokumen sudah ada, silakan hapus dokumen yang sudah ada terlebih dahulu.');
    }

    // Simpan file
    $request->dokumen->storeAs('public/angkatan-' . $user->angkatan, $documentName);

    // Path untuk disimpan di database (relatif ke public)
    $storedPath = 'storage/angkatan-' . $user->angkatan . '/' . $documentName;

    // Simpan data ke database
    Rekap::create([
        'user_id' => $user->id,
        'IPK' => $request->IPK,
        'dokumen' => $storedPath,
        'semester' => $request->semester,
    ]);

    return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan');
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
    public function validasi(Request $request, $id)
    {
        $request->validate([
            'IPK' => 'required',
        ]);

        Rekap::find($id)->update([
            'IPK' => $request->IPK,
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
        return redirect()->route('ipk.index')->with('success', 'Data berhasil dihapus');
    }
}
