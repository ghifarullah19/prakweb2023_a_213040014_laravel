{{-- Import file main dari folder layouts --}}
@extends('layouts.main')

{{-- Menyimpan section bernama container berisi content berikut --}}
@section('container')

  {{-- Content Utama --}}
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-8">

          {{-- Judul post --}}
          <h2 class="mb-3">{{ $post->title }}</h2>
            
          {{-- Info post --}}
          <p>
            {{-- Author --}}
            By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> 
            {{-- Category --}}
            in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
          </p>

          {{-- Jika post memiliki gambar dari user --}}
          @if ($post->image)
            {{-- Tampilkan gambar tersebut --}}
            <div style="max-height: 350px; overflow: hidden">
              <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
            </div>
          {{-- Jika post tidak memiliki gambar dari user --}}
          @else
            {{-- Tampilkan gambar dari unsplash --}}
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
          @endif

          {{-- Body/Isi post --}}
          <article class="my-3 fs-5">
              {!! $post->body !!}  {{-- {!! !!} is used to prevent XSS attack --}}
          </article>

          {{-- Button back to posts --}}
          <a href="/posts" class="d-block mt-3">Back to Posts</a>
      </div>
    </div>
  </div>
    
@endsection