<?php
namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcaraController extends Controller
{
    public function index()
    {
        // Untuk tampilan kalender
        if(request()->ajax()) {
            $start = request('start');
            $end = request('end');
            
            $acara = Acara::whereBetween('tanggal', [$start, $end])
                ->with('user')
                ->get();
                
            return response()->json($acara);
        }
        
        // Untuk tampilan list
        $acara = Acara::with('user')->latest()->get();
        return view('acara.index', compact('acara'));
    }

    public function create()
    {
        return view('acara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_acara' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lama_acara' => 'required|integer|min:1',
            'start' => 'required|boolean',
            'deskripsi' => 'nullable|string',
            'warna' => 'nullable|string',
            'lokasi' => 'nullable|string'
        ]);

        Acara::create([
            'nama_acara' => $request->nama_acara,
            'tanggal' => $request->tanggal,
            'lama_acara' => $request->lama_acara,
            'start' => $request->start,
            'deskripsi' => $request->deskripsi,
            'warna' => $request->warna,
            'lokasi' => $request->lokasi,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('acara.index')
            ->with('success', 'Acara berhasil dibuat!');
    }

    public function show(Acara $acara)
    {
        return view('acara.show', compact('acara'));
    }

    public function edit(Acara $acara)
    {
        return view('acara.edit', compact('acara'));
    }

    public function update(Request $request, Acara $acara)
    {
        $request->validate([
            'nama_acara' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lama_acara' => 'required|integer|min:1',
            'start' => 'required|boolean',
            'deskripsi' => 'nullable|string',
            'warna' => 'nullable|string',
            'lokasi' => 'nullable|string'
        ]);

        $acara->update($request->all());

        return redirect()->route('acara.index')
            ->with('success', 'Acara berhasil diupdate!');
    }

    public function destroy(Acara $acara)
    {
        $acara->delete();

        return redirect()->route('acara.index')
            ->with('success', 'Acara berhasil dihapus!');
    }
}