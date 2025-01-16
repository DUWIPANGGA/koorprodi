<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $role = Auth::user()->role;
// dd($role);
            switch ($role) {
                case 'super_admin':
                    return redirect()->route('admin.dashboard'); // Admin
                case 'user':
                    return redirect()->route('dashboard'); 
                case 'reviewer':
                    return redirect()->route('reviewer.dashboard'); // Reviewer
                case 'KOMINFO':
                    return redirect()->route('dashboard'); // Kominfo
                default:
                    // Jika role tidak valid, logout dan kembali ke halaman login
                    Auth::logout();
                    return redirect()->route('login')->withErrors(['email' => 'ada yang salah dengan akun anda, silahkan hubungi administrator']);
            }
        }

        // Jika login gagal, tampilkan pesan error
        return back()->withErrors(['email' => 'Email atau password yang dimasukkan tidak sesuai']);
    }
}
