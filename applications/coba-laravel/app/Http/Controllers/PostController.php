<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

// Controller PostController digunakan untuk mengatur data post
class PostController extends Controller
{
    // Method index digunakan untuk menampilkan semua data post yang ada di database   
    public function index()
    {
        // Membuat variabel untuk menyimpan data category dan author
        $title = "";
        
        // Jika ada request category maka akan mencari data category berdasarkan slug yang dikirim dari request category
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        // Jika ada request author maka akan mencari data user berdasarkan username yang dikirim dari request author
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        // Membuat query untuk mengambil data post yang sudah di filter
        return view('posts', [
            'title' => "All Posts" . $title,
            'active' => 'posts',
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    // Method show digunakan untuk menampilkan data post berdasarkan slug yang dikirim dari request
    public function show(Post $post)
    {
        // Membuat query untuk mengambil data post berdasarkan slug yang dikirim dari request
        return view('post', [
            'title' => "Single Post",
            'active' => 'posts',
            'post' => $post
        ]);
    }
}
