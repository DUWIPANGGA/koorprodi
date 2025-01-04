<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        return view('users.index', compact('users','user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:users,nim',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed:password_confirm',
        ]);

        User::create(
            [
                'nim' => $request->nim,
                'name' => $request->name,
            ]
        );

        return redirect()->route('users.index')->with('success', 'User berhasil dibuat.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'alamat' => 'required',
            'asal_sekolah' => 'string',
            'hobi' => 'string',
            'bakat' => 'string',
            'kelas' => 'string',
            'gender' => 'in:L,P',
            'phone' => 'numeric',
            'phone_wali' => 'numeric',
        ]);
        try {
            if ($request->hasFile('foto_profil')) {

                $request->validate(['foto_profil' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

                $imageName = Auth::user()->name . '-profil.' . $request->foto_profil->extension();

                $request->foto_profil->move(public_path('storage/profil'), $imageName);

                $user->foto_profil = 'storage/profil/' . $imageName;
            }

            if ($request->alamat) {
                $user->alamat = $request->alamat;
            }
            if ($request->phone) {
                $user->phone = $request->phone;
            }
            if ($request->asal_sekolah) {
                $user->asal_sekolah = $request->asal_sekolah;
            }
            if ($request->hobi) {
                $user->hobi = $request->hobi;
            }
            if ($request->bakat) {
                $user->bakat = $request->bakat;
            }
            if ($request->phone) {
                $user->phone_wali = $request->phone;
            }
            if ($request->email) {
                $user->email = $request->email;
            }

            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update user: ' . $e->getMessage());
        }

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
    public function import()
    {
        $user = Auth::user();
        return view('admin.import', compact('user'));
    }
    public function importCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);
        $file = $request->file('csv_file');

        $filePath = $file->getRealPath();
        $data = array_map('str_getcsv', file($filePath));

        $header = array_shift($data);

        foreach ($data as $row) {
            $userData = array_combine($header, $row);

            User::updateOrCreate(
                [
                    'nim' => $userData['NIM:'],
                    'email' => $userData['Email:']
                ],
                [
                    'name' => $userData['Nama:'],
                    'password' => bcrypt('FORMADIKSI'.$userData['NIM:']),
                    'prodi' => $userData['Prodi:'],
                    'hobi' => $userData['Hobi:'],
                    'bakat' => $userData['Bakat:'],
                    'gender' => $userData['Gender:'],
                    'phone' => $userData['Nomor WA (pribadi):'],
                    'phone_wali' => $userData['kontak WA orang tua atau wali:'],
                    'kelas' => $userData['Kelas (Contoh: RPL 1 C):'],
                    'asal_sekolah' => $userData['Asal sekolah:'],
                    'alamat' => $userData['Alamat(lengkap):'],
                ]
            );
            
        }
    }
}
