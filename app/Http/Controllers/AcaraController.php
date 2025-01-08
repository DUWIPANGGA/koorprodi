<?php
namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcaraController extends Controller
{
    public function index()
    {
        $acara = Acara::with('user')->get();
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
            'lama_acara' => 'required|integer',
            'start' => 'required|boolean',
        ]);

        Acara::create([
            'nama_acara' => $request->nama_acara,
            'tanggal' => $request->tanggal,
            'lama_acara' => $request->lama_acara,
            'start' => $request->start,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('acara.index')->with('success', 'Acara berhasil dibuat!');
    }

    public function edit($id)
    {
        $acara = Acara::findOrFail($id);
        return view('acara.edit', compact('acara'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_acara' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lama_acara' => 'required|integer',
            'start' => 'required|boolean',
        ]);

        $acara = Acara::findOrFail($id);
        $acara->update($request->all());

        return redirect()->route('acara.index')->with('success', 'Acara berhasil diupdate!');
    }

    public function destroy($id)
    {
        $acara = Acara::findOrFail($id);
        $acara->delete();

        return redirect()->route('acara.index')->with('success', 'Acara berhasil dihapus!');
    }
}
