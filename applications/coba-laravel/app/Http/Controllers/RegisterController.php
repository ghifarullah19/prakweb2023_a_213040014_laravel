<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Controller RegisterController digunakan untuk mengatur registrasi user
class RegisterController extends Controller
{
    // Method index digunakan untuk menampilkan halaman register
    public function index()
    {
        // Jika user sudah login maka akan diarahkan ke halaman index
        return view('register.index', [
            'title' => "Register",
            'active' => "register"
        ]);
    }

    // Method store digunakan untuk menyimpan data user yang baru saja melakukan registrasi
    public function store(Request $request)
    {
        // Membuat validasi untuk name, username, email, dan password
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // Membuat password menjadi hash
        // $validatedData['password'] = bcrypt($validatedData['password']); <- Cara lama
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Membuat user baru
        User::create($validatedData);

        // Jika user berhasil melakukan registrasi maka akan diarahkan ke halaman login dengan pesan success
        return redirect('/login')->with('success', 'Registration successfull! Please login.');
    }
}
