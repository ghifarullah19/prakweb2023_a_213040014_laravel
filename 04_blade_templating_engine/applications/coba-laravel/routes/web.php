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
    return view('home', [
        'title' => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => "About",
        'name' => "Muhammad Lutfi",
        'email' => "ghifarullah11@gmail.com",
        'image' => "nophoto.png"
    ]);
});



Route::get('/blog', function () {
    $blog_posts = [
        [
            'title' => "Judul Post Pertama",
            'slug' => "judul-post-pertama",
            'author' => "Muhammad Lutfi",
            'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur a illo ipsam commodi tenetur rerum cupiditate. Exercitationem, labore voluptatum ipsum cum excepturi dolor iure sint consequatur numquam libero ex laudantium sit ipsa esse nisi, dolorum expedita possimus beatae, maxime veniam a pariatur eos impedit. Incidunt mollitia laboriosam dolorum odio harum ratione, quo, quod quibusdam expedita asperiores fugit exercitationem voluptatum ex rerum neque, suscipit at eveniet corrupti repellat accusamus dicta! Sequi accusamus voluptatum voluptate, aut animi provident laboriosam molestias incidunt ullam."
        ],
        [
            'title' => "Judul Post Kedua",
            'slug' => "judul-post-kedua",
            'author' => "Fauzi Kirito",
            'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde provident aperiam ut vero odit voluptatibus quaerat amet velit, labore eos corporis dolor consequuntur est iusto omnis! Sequi sint impedit quis ullam pariatur, voluptatum officiis? In recusandae velit corrupti non dolore nesciunt sequi temporibus sed eveniet iste, commodi officiis quia, dolores ullam libero aliquam sint ipsum veritatis maxime aut necessitatibus? Obcaecati architecto saepe minima magnam, odio aliquid corrupti itaque aliquam dolorum fugit sunt natus enim sit asperiores ullam. Debitis dolor numquam reiciendis tenetur perspiciatis aliquam ab ipsum, placeat nemo modi error ipsa cumque molestiae quae nulla officia id maxime consequatur alias."
        ]
    ];

    return view('posts', [
        'title' => "Posts",
        'posts' => $blog_posts
    ]);
});


// Single Post
Route::get('posts/{slug}', function ($slug) {
    $blog_posts = [
        [
            'title' => "Judul Post Pertama",
            'slug' => "judul-post-pertama",
            'author' => "Muhammad Lutfi",
            'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur a illo ipsam commodi tenetur rerum cupiditate. Exercitationem, labore voluptatum ipsum cum excepturi dolor iure sint consequatur numquam libero ex laudantium sit ipsa esse nisi, dolorum expedita possimus beatae, maxime veniam a pariatur eos impedit. Incidunt mollitia laboriosam dolorum odio harum ratione, quo, quod quibusdam expedita asperiores fugit exercitationem voluptatum ex rerum neque, suscipit at eveniet corrupti repellat accusamus dicta! Sequi accusamus voluptatum voluptate, aut animi provident laboriosam molestias incidunt ullam."
        ],
        [
            'title' => "Judul Post Kedua",
            'slug' => "judul-post-kedua",
            'author' => "Fauzi Kirito",
            'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde provident aperiam ut vero odit voluptatibus quaerat amet velit, labore eos corporis dolor consequuntur est iusto omnis! Sequi sint impedit quis ullam pariatur, voluptatum officiis? In recusandae velit corrupti non dolore nesciunt sequi temporibus sed eveniet iste, commodi officiis quia, dolores ullam libero aliquam sint ipsum veritatis maxime aut necessitatibus? Obcaecati architecto saepe minima magnam, odio aliquid corrupti itaque aliquam dolorum fugit sunt natus enim sit asperiores ullam. Debitis dolor numquam reiciendis tenetur perspiciatis aliquam ab ipsum, placeat nemo modi error ipsa cumque molestiae quae nulla officia id maxime consequatur alias."
        ]
    ];

    $new_post = [];

    foreach ($blog_posts as $post) {
        if ($post['slug'] === $slug) {
            $new_post = $post;
        }
    }

    return view('post', [
        'title' => "Single Post",
        'post' => $new_post
    ]);
});
