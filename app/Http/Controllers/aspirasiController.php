<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\article as ModelsArticle;
use App\Exports\AspirasiExport;
use Maatwebsite\Excel\Facades\Excel;

class aspirasiController extends Controller
{
    public function exportExcel(Request $request)
    {
        $date = now()->format('d-m-Y');
        return Excel::download(new AspirasiExport, "data-aspirasi $date.xlsx");
    }

    public function index()
    {
        $aspirasi = Aspirasi::orderBy('created_at', 'desc')->paginate(10);
        return view('aspirasi.index', compact('aspirasi'));
    }

    public function udahkirim()
    {
        $recommendedArticles = ModelsArticle::latest()->take(8)->get();
        return view("index", compact('recommendedArticles'));
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
            return redirect('/?status=error')
                ->with('error', 'Anda sudah mengirim aspirasi hari ini. Silakan coba lagi besok!');
        }
    
        try {
            $aspirasi = new Aspirasi();
            $aspirasi->ip_address = $request->ip();
            $aspirasi->nama = $request->nama;
            $aspirasi->isi = $request->isi;
            $aspirasi->save();

            return redirect('/?status=success')
                ->with('status', 'Aspirasi berhasil dikirim!');
        } catch (\Exception $e) {
            return redirect('/?status=error')
                ->with('error', 'Aspirasi gagal dikirim! Cek koneksi kamu.');
        }
    }

    public function destroy($id)
    {
        try {
            $aspirasi = Aspirasi::findOrFail($id);
            $aspirasi->delete();
            return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('aspirasi.index')->with('error', 'Gagal menghapus aspirasi!');
        }
    }
}