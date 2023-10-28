<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Jika ada rute yang metode requestnya get yang alamatnya adalah '/' 
Route::get('/', function () {
    // return view('welcome'); // tampilkan sebuah view bernama "welcome"
    return view('home');
});

Route::get('/about', function () {
    return view('about', [
        'name' => "Muhammad Lutfi",
        'email' => "ghifarullah11@gmail.com",
        'image' => "nophoto.png"
    ]);
});

Route::get('/blog', function () {
    return view('posts');
});
