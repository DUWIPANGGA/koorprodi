<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;

class aspirasiController extends Controller
{
    public function index()
    {
        return view('rumahaspirasi');
    }

    public function kirim(Request $request)
    {

        $peringatankustom = [
            'nama.required' => 'Nama tidak boleh kosong!',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter!',
            'isi.required' => 'Aspirasi tidak boleh kosong!', 
            'isi.max' => 'Aspirasi tidak boleh lebih dari 1000 karakter!'
        ];

        $request->validate([
            'nama' => 'required|max:100',
            'isi' => 'required|max:1000',
        ], $peringatankustom);

        $aspirasi = new Aspirasi();
        $aspirasi->nama = $request->nama;
        $aspirasi->isi = $request->isi;
        $aspirasi->save();
    
        return redirect()->route('rumahaspirasi')->with('status', 'Aspirasi berhasil dikirim!');
    }
}