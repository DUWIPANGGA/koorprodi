<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    // Menampilkan semua periode
    public function index()
    {
        $periodes = Periode::orderBy('tahun', 'desc')->get();
        return view('kepengurusan.periode.index', compact('periodes'));
    }

    // Form tambah periode
    public function create()
    {
        return view('kepengurusan.periode.create');
    }

    // Menyimpan periode baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
        ]);

        // Nonaktifkan semua periode jika yang baru di-set aktif
        if ($request->aktif) {
            Periode::query()->update(['aktif' => false]);
        }

        Periode::create([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'aktif' => $request->aktif ?? false,
        ]);

        return redirect()->route('periode.index')
            ->with('success', 'Periode berhasil ditambahkan!');
    }

    // Set periode aktif
    public function setAktif(Periode $periode)
    {
        Periode::query()->update(['aktif' => false]);
        $periode->update(['aktif' => true]);

        return back()->with('success', 'Periode aktif berhasil diubah!');
    }

    // Hapus periode
    public function destroy(Periode $periode)
    {
        $periode->delete();
        return redirect()->route('periode.index')
            ->with('success', 'Periode berhasil dihapus!');
    }
}