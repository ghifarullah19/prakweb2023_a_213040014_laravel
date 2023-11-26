<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Menggunakan trait HasFactory untuk membuat factory model Category
    use HasFactory;

    // Guarded digunakan untuk menentukan field mana saja yang tidak boleh diisi
    protected $guarded = ['id'];

    // Membuat relasi dengan model Post
    public function posts()
    {
        // HasMany digunakan karena relasi antara Category dengan Post adalah one to many
        return $this->hasMany(Post::class);
    }
}
