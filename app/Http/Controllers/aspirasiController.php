<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;

class aspirasiController extends Controller
{
    public function index()
    {
        return view('index');
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
    
        $adaAspirasi = Aspirasi::where('ip_address', $request->ip())
            ->where('created_at', '>=', now()->subDay())
            ->first();
    
        if ($adaAspirasi) {
            return redirect()->route('rumahaspirasi')
                ->with('error', 'Anda sudah mengirim aspirasi hari ini. Silakan coba lagi besok!');
        }
    
        try {
            $aspirasi = new Aspirasi();
            $aspirasi->ip_address = $request->ip();
            $aspirasi->nama = $request->nama;
            $aspirasi->isi = $request->isi;
            $aspirasi->save();
    
            return redirect()->route('rumahaspirasi')->with('status', 'Aspirasi berhasil dikirim!');
        } catch (\Exception $e) {
            return redirect()->route('rumahaspirasi')->with('error', 'Aspirasi gagal dikirim! Cek koneksi kamu.');
        }
    }
}