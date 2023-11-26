<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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
    return view('home', [
        'title' => "Home",
        'active' => 'home',
    ]);
});

// Jika ada rute yang metode requestnya get yang alamatnya adalah '/about'
Route::get('/about', function () {
    // Mengirimkan data ke view about dan kemudian menampilkan view about
    return view('about', [
        'title' => "About",
        'active' => 'about',
        'name' => "Muhammad Lutfi",
        'email' => "ghifarullah11@gmail.com",
        'image' => "nophoto.png"
    ]);
});

// Jika ada rute yang metode requestnya get yang alamatnya adalah '/posts', maka jalankan method index dari 'PostController'
Route::get('/posts', [PostController::class, 'index']);

// Jika ada rute yang metode requestnya get yang alamatnya adalah '/posts/{post:slug}', maka jalankan method show dari 'PostController'
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Jika ada rute yang metode requestnya get yang alamatnya adalah '/categories'
Route::get('/categories', function () {
    // Mengirimkan data ke view categories dan kemudian menampilkan view categories
    return view('categories', [
        'title' => "Post Categories",
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// Jika ada rute yang metode requestnya get yang alamatnya adalah '/login', maka jalankan method index dari 'LoginController' dengan middleware guest (hanya untuk user yang belum login)
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

// Jika ada rute yang metode requestnya post yang alamatnya adalah '/login', maka jalankan method authenticate dari 'LoginController'
Route::post('/login', [LoginController::class, 'authenticate']);

// Jika ada rute yang metode requestnya post yang alamatnya adalah '/logout', maka jalankan method logout dari 'LoginController'
Route::post('/logout', [LoginController::class, 'logout']);

// Jika ada rute yang metode requestnya get yang alamatnya adalah '/register', maka jalankan method index dari 'RegisterController' dengan middleware guest (hanya untuk user yang belum login)
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// Jika ada rute yang metode requestnya post yang alamatnya adalah '/register', maka jalankan method store dari 'RegisterController'
Route::post('/register', [RegisterController::class, 'store']);

// Jika ada rute yang metode requestnya get yang alamatnya adalah '/dashboard', maka jalankan method index dari 'DashboardPostController' dengan middleware auth (hanya untuk user yang sudah login)
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

// Jika ada rute yang metode requestnya get yang alamatnya adalah '/dashboard/posts/checkslug', maka jalankan method index dari 'DashboardPostController' dengan middleware auth (hanya untuk user yang sudah login)
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

// Jika ada rute yang metode requestnya get yang alamatnya adalah '/dashboard/posts', maka jalankan method index dari 'DashboardPostController' dengan middleware auth (hanya untuk user yang sudah login)
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');