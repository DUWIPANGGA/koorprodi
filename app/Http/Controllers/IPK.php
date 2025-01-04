<?php
namespace App\Http\Controllers;

use App\Models\Rekap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IPK extends Controller
{
    public function main()
    {
        $user = Auth::user();
        $ipks = Rekap::all();
        return view('ipk.main', compact('ipks','user'));
    }
    public function index()
    {
        $user = Auth::user();
        $ipks = Rekap::all();
        return view('ipk.index', compact('ipks','user'));
    }

    public function create()
    {
        return view('ipk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'IPS' => 'required',
            'IPK' => 'required',
            'dokumen' => 'required',
            'semester' => 'required',
            'user_id' => 'required',
        ]);

        Rekap::create($request->all());
        return redirect()->route('ipk.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ipk = Rekap::find($id);
        return view('ipk.show', compact('ipk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ipk = Rekap::find($id);
        return view('ipk.edit', compact('ipk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'IPS' => 'required',
            'IPK' => 'required',
            'dokumen' => 'required',
            'semester' => 'required',
            'user_id' => 'required',
        ]);

        Rekap::find($id)->update($request->all());
        return redirect()->route('ipk.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rekap::find($id)->delete();
        return redirect()->route('ipk.index')->with('success', 'Data berhasil dihapus');
    }
}