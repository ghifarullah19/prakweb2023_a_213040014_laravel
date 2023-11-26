<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

// Controller DashboardPostController digunakan untuk mengatur data post di dashboard
class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Method index digunakan untuk menampilkan semua data post yang ada di database
    public function index()
    {
        // Membuat query untuk mengambil data post yang sudah di filter
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // Method create digunakan untuk menampilkan halaman create post
    public function create()
    {
        // Membuat query untuk mengambil data category
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // Method store digunakan untuk menyimpan data post yang baru saja dibuat
    public function store(Request $request)
    {
        // Membuat validasi untuk title, slug, category_id, image, dan body
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        // Jika ada file image yang dikirim dari form create post maka akan disimpan di storage
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // Menambahkan user_id dan excerpt ke dalam array $validatedData
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 200));

        // Membuat post baru
        Post::create($validatedData);

        // Jika post berhasil dibuat maka akan diarahkan ke halaman dashboard posts dengan pesan success
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    // Method show digunakan untuk menampilkan data post berdasarkan slug yang dikirim dari request
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Method edit digunakan untuk menampilkan halaman edit post
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // Method update digunakan untuk menyimpan data post yang baru saja diupdate
    public function update(Request $request, Post $post)
    {
        // Membuat validasi untuk title, slug, category_id, dan body
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];

        // Jika tidak ada slug yang dikirim dari form edit post maka akan ditambahkan validasi untuk slug
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        // Membuat validasi untuk title, slug, category_id, dan body
        $validatedData = $request->validate($rules);

        // Menambahkan user_id dan excerpt ke dalam array $validatedData
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 200));

        // Mengupdate post yang sudah ada di database berdasarkan id dengan data yang baru diupdate dari form edit post
        Post::where('id', $post->id)->update($validatedData);

        // Jika post berhasil diupdate maka akan diarahkan ke halaman dashboard posts dengan pesan success
        return redirect('/dashboard/posts')->with('success', 'New post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Method destroy digunakan untuk menghapus data post
    public function destroy(Post $post)
    {
        // Menghapus post yang sudah ada di database berdasarkan id
        Post::destroy($post->id);

        // Jika post berhasil dihapus maka akan diarahkan ke halaman dashboard posts dengan pesan success
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    /**
     * Check slug.
     */
    // Method checkSlug digunakan untuk mengecek slug yang dikirim dari form create post
    public function checkSlug(Request $request)
    {
        // Membuat slug otomatis berdasarkan title yang dikirim dari form create post
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        // Mengembalikan response berupa json
        return response()->json(['slug' => $slug]);
    }
}
