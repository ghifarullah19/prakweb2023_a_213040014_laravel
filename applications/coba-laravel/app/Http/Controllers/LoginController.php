<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Controller LoginController digunakan untuk mengatur login dan logout
class LoginController extends Controller
{
    // Method index digunakan untuk menampilkan halaman login
    public function index()
    {
        // Jika user sudah login maka akan diarahkan ke halaman index
        return view('login.index', [
            'title' => "Login",
            'active' => "login"
        ]);
    }

    // Method authenticate digunakan untuk melakukan login
    public function authenticate(Request $request)
    {
        // Membuat validasi untuk email dan password
        $credentials = $request->validate([
            // 'email' => 'required|email:dns',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Jika email dan password benar maka akan diarahkan ke halaman index
        if (Auth::attempt($credentials)) {
            // Membuat session untuk menyimpan data user yang sedang login untuk mencegah fixation attack
            $request->session()->regenerate();

            // Jika user yang login adalah admin maka akan diarahkan ke halaman dashboard
            return redirect()->intended('/dashboard');
        }

        // Jika email dan/atau password salah maka akan diarahkan ke halaman login dengan pesan error
        return back()->with('loginError', 'Login failed!');
    }

    // Method logout digunakan untuk melakukan logout
    public function logout()
    {
        // Melakukan logout
        Auth::logout();

        // Menghapus session
        request()->session()->invalidate();

        // Membuat session baru
        request()->session()->regenerateToken();

        // Jika user berhasil logout maka akan diarahkan ke halaman index
        return redirect('/');
    }
}
