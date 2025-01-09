<?php
namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduan'));
    }

    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cerita' => 'required|string',
        ]);

        Pengaduan::create([
            'user_id' => Auth::user()->id,
            'cerita' => $request->cerita,
            'validasi' => 0,
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dibuat.');
    }

    public function edit(Pengaduan $pengaduan)
    {
        return view('pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'cerita' => 'required|string',
            'validasi' => 'required|boolean',
        ]);

        $pengaduan->update($request->only('cerita', 'validasi'));

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diupdate.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
