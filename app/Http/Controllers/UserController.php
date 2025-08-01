<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
    use App\Exports\UserExport;
class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        return view('users.index', compact('users', 'user'));
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
                'prodi' => $request->prodi,
                'password' => bcrypt($request->password),
                'alamat' => $request->alamat,
                'asal_sekolah' => $request->asal_sekolah,
                'hobi' => $request->hobi,
                'bakat' => $request->bakat,
                'kelas' => $request->kelas,
                'angkatan' => $request->angkatan,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'phone_wali' => $request->phone_wali,
                'email' => $request->email,
                'semester' => $request->semester,
            ]
        );

        return redirect()->route('users.index')->with('success', 'User berhasil dibuat.');
    }

    public function show(User $user)
    {
        $rekap = Rekap::where('user_id', $user->id)->get();
        return view('users.show', compact('user'));
    }

    public function user($id)
    {
        $user = User::find($id);
        return view('users.user', compact('user'));
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

                $imageName = $user->name . '-profil.' . $request->foto_profil->extension();

                $request->foto_profil->move(public_path('storage/profil'), $imageName);

                $user->foto_profil = 'storage/profil/' . $imageName;
            }
            if (Auth::user()->can('updateBasicInfo', $user)){
            if ($request->name) {
                $user->name = $request->name;
            }
            if ($request->kelas) {
                $user->kelas = $request->kelas;
            }
            if ($request->jenis_kelamin) {
                $user->gender = $request->jenis_kelamin;
            }
            if ($request->angkatan) {
                $user->angkatan = $request->angkatan;
            }}
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
            if (Auth::user()->role == 'admin' or Auth::user()->role == 'super_admin') {

                if ($request->role) {
                    $user->role = $request->role;
                }
                if ($request->nim) {
                    $user->nim = $request->nim;
                }
                if ($request->name) {
                    $user->name = $request->name;
                }
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

    public function destroy($id)
    {
        $user = User::findOrFail($id);
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
        set_time_limit(500);
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);
        $file = $request->file('csv_file');

        $filePath = $file->getRealPath();
        $data = array_map('str_getcsv', file($filePath));

        $header = array_shift($data);
        try {
            foreach ($data as $row) {
                $userData = array_combine($header, $row);

                $existingUser = User::where('nim', (string) $userData['NIM:'])
                    ->when(isset($userData['Email:']) && !empty($userData['Email:']), function ($query) use ($userData) {
                        $query->orWhere('email', (string) $userData['Email:']);
                    })
                    ->first();

                if (!$existingUser) {
                    User::create([
                        'nim' => (string) $userData['NIM:'],
                        'email' => !empty($userData['Email:']) ? $userData['Email:'] : 'default_' . $userData['NIM:'] . '@formadiksi.com',
                        'name' => (string) $userData['Nama:'],
                        'password' => bcrypt('FORMADIKSI' . (string) $userData['NIM:']),
                        'prodi' => (string) $userData['Prodi:'],
                        'hobi' => (string) $userData['Hobi:'],
                        'bakat' => (string) $userData['Bakat:'],
                        'gender' => (string) $userData['Gender:'],
                        'phone' => (string) $userData['Nomor WA (pribadi):'],
                        'phone_wali' => (string) $userData['kontak WA orang tua atau wali:'],
                        'kelas' => (string) $userData['Kelas (Contoh: RPL 1 C):'],
                        'asal_sekolah' => (string) $userData['Asal sekolah:'],
                        'alamat' => (string) $userData['Alamat(lengkap):'],
                        'angkatan' => (string) $userData['angkatan'],
                        'semester' => (string) $userData['semester'],
                    ]);
                }
            }
        } catch (\Exception $e) {
            Log::error('Error saat memasukkan data: ' . $e->getMessage());
        }
        return redirect()->route('users.index')->with('success', 'Data berhasil diimport.');
    }


public function exportUsers() 
{
    return Excel::download(new UserExport(), 'data_mahasiswa.xlsx');
}
}
