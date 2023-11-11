<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => "Muhammad Lutfi",
        //     'email' => "ghifarullah@gmail.com",
        //     'password' => bcrypt('password')
        // ]);

        // User::create([
        //     'name' => "Fauzi Ilyas",
        //     'email' => "fauzi@gmail.com",
        //     'password' => bcrypt('password')
        // ]);

        // User::create([
        //     'name' => "Gilman Arief",
        //     'email' => "gilman@gmail.com",
        //     'password' => bcrypt('password')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => "Web Programming",
            'slug' => "web-programming"
        ]);

        Category::create([
            'name' => "Web Design",
            'slug' => "web-design"
        ]);

        Category::create([
            'name' => "Personal",
            'slug' => "personal"
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => "Judul Pertama",
        //     'slug' => "judul-pertama",
        //     'excerpt' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.",
        //     'body' => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus cumque quo nemo unde tempore, veniam consequatur ullam ab, dicta adipisci dolores quas rerum cupiditate et quos reiciendis sapiente officiis dolorum aspernatur corrupti!</p><p>Animi, reiciendis recusandae odit eius minus quasi dolor dignissimos? Quasi quas facere fugiat odit amet, cumque officia commodi saepe accusamus mollitia quod omnis. Suscipit quae minima sint aut nam odit dolor natus, asperiores et, sunt harum provident sed dicta excepturi quia nesciunt expedita pariatur neque commodi sapiente.</p><p>Magni iure expedita similique velit nisi, illo in aliquid ipsa ad fuga adipisci tempora quidem, ullam nemo porro quibusdam rem excepturi a illum placeat error? Nam maxime ipsam veritatis iste exercitationem, magni perspiciatis explicabo consectetur unde assumenda, adipisci odit eius beatae, impedit numquam natus excepturi sit fugit facere? Tempora aut voluptatibus magni rem laudantium dolorum dolor veniam officiis hic optio eaque veritatis, nemo quod, neque rerum pariatur, vitae necessitatibus quos. Eos!</p>",
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => "Judul Kedua",
        //     'slug' => "judul-kedua",
        //     'excerpt' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.",
        //     'body' => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus cumque quo nemo unde tempore, veniam consequatur ullam ab, dicta adipisci dolores quas rerum cupiditate et quos reiciendis sapiente officiis dolorum aspernatur corrupti!</p><p>Animi, reiciendis recusandae odit eius minus quasi dolor dignissimos? Quasi quas facere fugiat odit amet, cumque officia commodi saepe accusamus mollitia quod omnis. Suscipit quae minima sint aut nam odit dolor natus, asperiores et, sunt harum provident sed dicta excepturi quia nesciunt expedita pariatur neque commodi sapiente.</p><p>Magni iure expedita similique velit nisi, illo in aliquid ipsa ad fuga adipisci tempora quidem, ullam nemo porro quibusdam rem excepturi a illum placeat error? Nam maxime ipsam veritatis iste exercitationem, magni perspiciatis explicabo consectetur unde assumenda, adipisci odit eius beatae, impedit numquam natus excepturi sit fugit facere? Tempora aut voluptatibus magni rem laudantium dolorum dolor veniam officiis hic optio eaque veritatis, nemo quod, neque rerum pariatur, vitae necessitatibus quos. Eos!</p>",
        //     'category_id' => 1,
        //     'user_id' => 3
        // ]);

        // Post::create([
        //     'title' => "Judul Ketiga",
        //     'slug' => "judul-ketiga",
        //     'excerpt' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.",
        //     'body' => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus cumque quo nemo unde tempore, veniam consequatur ullam ab, dicta adipisci dolores quas rerum cupiditate et quos reiciendis sapiente officiis dolorum aspernatur corrupti!</p><p>Animi, reiciendis recusandae odit eius minus quasi dolor dignissimos? Quasi quas facere fugiat odit amet, cumque officia commodi saepe accusamus mollitia quod omnis. Suscipit quae minima sint aut nam odit dolor natus, asperiores et, sunt harum provident sed dicta excepturi quia nesciunt expedita pariatur neque commodi sapiente.</p><p>Magni iure expedita similique velit nisi, illo in aliquid ipsa ad fuga adipisci tempora quidem, ullam nemo porro quibusdam rem excepturi a illum placeat error? Nam maxime ipsam veritatis iste exercitationem, magni perspiciatis explicabo consectetur unde assumenda, adipisci odit eius beatae, impedit numquam natus excepturi sit fugit facere? Tempora aut voluptatibus magni rem laudantium dolorum dolor veniam officiis hic optio eaque veritatis, nemo quod, neque rerum pariatur, vitae necessitatibus quos. Eos!</p>",
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => "Judul Keempat",
        //     'slug' => "judul-keempat",
        //     'excerpt' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.",
        //     'body' => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus cumque quo nemo unde tempore, veniam consequatur ullam ab, dicta adipisci dolores quas rerum cupiditate et quos reiciendis sapiente officiis dolorum aspernatur corrupti!</p><p>Animi, reiciendis recusandae odit eius minus quasi dolor dignissimos? Quasi quas facere fugiat odit amet, cumque officia commodi saepe accusamus mollitia quod omnis. Suscipit quae minima sint aut nam odit dolor natus, asperiores et, sunt harum provident sed dicta excepturi quia nesciunt expedita pariatur neque commodi sapiente.</p><p>Magni iure expedita similique velit nisi, illo in aliquid ipsa ad fuga adipisci tempora quidem, ullam nemo porro quibusdam rem excepturi a illum placeat error? Nam maxime ipsam veritatis iste exercitationem, magni perspiciatis explicabo consectetur unde assumenda, adipisci odit eius beatae, impedit numquam natus excepturi sit fugit facere? Tempora aut voluptatibus magni rem laudantium dolorum dolor veniam officiis hic optio eaque veritatis, nemo quod, neque rerum pariatur, vitae necessitatibus quos. Eos!</p>",
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
