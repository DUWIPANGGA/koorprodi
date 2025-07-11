<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa as ModelsMahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class mahasiswa extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodies = [
            "TM",    // D3 Teknik Mesin
            "TP",    // D3 Teknik Pendingin
            "PM",    // S1 Terapan Perancangan Manufaktur
            "TRIK",  // S1 Terapan Teknologi Rekayasa Instrumentasi & Kontrol
            "TI",    // D3 Teknik Informatika
            "RPL",   // S1 Terapan Rekayasa Perangkat Lunak
            "SIKC",  // S1 Terapan Sistem Informasi Kota Cerdas
            "TRK",   // S1 Terapan Teknologi Rekayasa Komputer
            "KEP",   // D3 Keperawatan
            "TLM",   // S1 Terapan Teknologi Laboratorium Medis
            "TREM"   // S1 Terapan Teknologi Rekayasa Elektro-Medis
        ];

        // If you need to get distinct angkatan values from database:
        $angkatans = User::select('angkatan')
                        ->distinct()
                        ->orderBy('angkatan', 'desc')
                        ->pluck('angkatan');

        return view('mahasiswa.index', compact('prodies', 'angkatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
