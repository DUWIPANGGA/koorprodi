<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    public function index(Request $request)
    {
        $periode = $request->periode 
            ? Periode::findOrFail($request->periode)
            : Periode::aktif()->first();
        
        if (!$periode) {
            return redirect()->route('periode.index')
                ->with('error', 'Silahkan buat periode terlebih dahulu');
        }

        $pengurus = $periode->pengurus()
            ->orderBy('divisi')
            ->orderBy('urutan')
            ->get()
            ->groupBy('divisi');
            
        return view('kepengurusan.pengurus.index', [
            'pengurus' => $pengurus,
            'periode' => $periode,
            'periodes' => Periode::orderBy('tahun', 'desc')->get()
        ]);
    }
public function show($id = null)
{
    $periode = $id ? Periode::findOrFail($id) : Periode::first();
    
    if (!$periode) {
        return redirect()->route('login')->with('error', 'Tidak ada periode kepengurusan yang aktif');
    }

    // Get all pengurus for grouping by divisi
    $pengurus = $periode->pengurus()
        ->orderBy('divisi')
        ->orderBy('urutan')
        ->get()
        ->groupBy('divisi');

    // Get all pengurus for background (without grouping)
    $allPengurus = $periode->pengurus()->get();

    // Get all periods for dropdown
    $periodes = Periode::orderBy('tahun', 'desc')->get();

    return view('kepengurusan', compact('periode', 'pengurus', 'periodes', 'allPengurus'));
}
    public function create(Request $request)
    {
        $periode = $request->periode 
            ? Periode::findOrFail($request->periode)
            : Periode::aktif()->first();

        return view('kepengurusan.pengurus.create', [
            'divisiList' => Pengurus::divisiList(),
            'periode' => $periode,
            'periodes' => Periode::orderBy('tahun', 'desc')->get()
        ]);
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'periode_id' => 'required|exists:periodes,id',
        'nama' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'divisi' => 'required|string|in:' . implode(',', array_keys(Pengurus::divisiList())),
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        'urutan' => 'nullable|integer|min:0',
    ]);

    if ($request->hasFile('foto')) {
        $validated['foto'] = $request->file('foto')->store('pengurus', 'public');
    }

    $divisi = $request->divisi;
    $count = Pengurus::where('divisi', $divisi)
                    ->where('periode_id', $request->periode_id)
                    ->count();

    $uniquePositions = [
        Pengurus::DIVISI_KETUA_UMUM,
        Pengurus::DIVISI_WAKIL_KETUA
    ];

    if (in_array($divisi, $uniquePositions) && $count >= 1) {
        return back()
            ->withInput()
            ->withErrors([
                'divisi' => 'Hanya boleh ada 1 ' . Pengurus::divisiList()[$divisi] . ' per periode'
            ]);
    }

    try {
        $pengurus = new Pengurus();
        $pengurus->periode_id = $validated['periode_id'];
        $pengurus->nama       = $validated['nama'];
        $pengurus->jabatan    = $validated['jabatan'];
        $pengurus->divisi     = $validated['divisi'];
        $pengurus->urutan     = $validated['urutan'] ?? 0;
        $pengurus->foto       = $validated['foto'] ?? null;
        $pengurus->save();

        return redirect()
            ->route('pengurus.index', ['periode' => $request->periode_id])
            ->with('success', 'Anggota kepengurusan berhasil ditambahkan');

    } catch (\Exception $e) {
        return back()
            ->withInput()
            ->with('error', 'Gagal menambahkan anggota: ' . $e->getMessage());
    }
}
    public function edit(Pengurus $penguru)
    {
        $divisiList = Pengurus::divisiList();
        return view('kepengurusan.pengurus.edit', [
            'penguru' => $penguru,
            'divisiList' => $divisiList,
            'periode' => $penguru->periode
        ]);
    }

    public function update(Request $request, Pengurus $penguru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'divisi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($penguru->foto) {
                Storage::disk('public')->delete($penguru->foto);
            }
            $path = $request->file('foto')->store('pengurus', 'public');
            $data['foto'] = $path;
        }

        $penguru->update($data);

        return redirect()->route('pengurus.index', ['periode' => $penguru->periode_id])
            ->with('success', 'Data anggota berhasil diperbarui');
    }

    public function destroy(Pengurus $penguru)
    {
        if ($penguru->foto) {
            Storage::disk('public')->delete($penguru->foto);
        }
        
        $penguru->delete();

        return redirect()->route('pengurus.index', ['periode' => $penguru->periode_id])
            ->with('success', 'Anggota berhasil dihapus');
    }
}