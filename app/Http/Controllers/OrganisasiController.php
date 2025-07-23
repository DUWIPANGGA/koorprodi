<?php
// app/Http/Controllers/OrganisasiController.php
namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function index()
    {
        $organisasis = Organisasi::latest()->paginate(10);
        return view('organisasi.index', compact('organisasis'));
    }

    public function create()
    {
        return view('organisasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'pembina' => 'nullable|string|max:255',
        ]);

        Organisasi::create($request->all());

        return redirect()->route('organisasi.index')
            ->with('success', 'Organisasi berhasil ditambahkan');
    }

    public function show(Organisasi $organisasi)
    {
        return view('organisasi.show', compact('organisasi'));
    }

    public function edit(Organisasi $organisasi)
    {
        return view('organisasi.edit', compact('organisasi'));
    }

    public function update(Request $request, Organisasi $organisasi)
    {
        $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'pembina' => 'nullable|string|max:255',
        ]);

        $organisasi->update($request->all());

        return redirect()->route('organisasi.index')
            ->with('success', 'Organisasi berhasil diperbarui');
    }

    public function destroy(Organisasi $organisasi)
    {
        $organisasi->delete();

        return redirect()->route('organisasi.index')
            ->with('success', 'Organisasi berhasil dihapus');
    }
}