{{-- Import file main dari folder dashboard/layouts --}}
@extends('dashboard.layouts.main')

{{-- Menyimpan section bernama container berisi content berikut --}}
@section('container')
  {{-- Content utama --}}
  <div class="container">
    <div class="row my-3">
      <div class="col-lg-8">
        {{-- Judul post --}}
        <h2 class="mb-3">{{ $post->title }}</h2>

        {{-- Button back to all my posts --}}
        <a href="/dashboard/posts" class="btn btn-success">
          {{-- Icon back --}}
          <i class="bi bi-arrow-left"></i> Back to all my posts
        </a>
        {{-- Button edit --}}
        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning">
          {{-- Icon edit --}}
          <i class="bi bi-pencil-square"></i> Edit
        </a>

        {{-- Button delete --}}
        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
          {{-- Menangani penyerangan Cross-Site Request Forgery --}}
          @csrf
          {{-- Menangani method DELETE --}}
          @method('delete')
          {{-- Button delete --}}
          <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
            {{-- Icon delete --}}
            <i class="bi bi-x-circle"></i>
            Delete
          </button>
        </form>

        {{-- Jika post memiliki gambar dari user --}}
        @if ($post->image)
          {{-- Tampilkan gambar tersebut --}}
          <div style="max-height: 350px; overflow: hidden">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
          </div>
        {{-- Jika post tidak memiliki gambar dari user --}}
        @else
          {{-- Tampilkan gambar dari unsplash --}}
          <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
        @endif

        {{-- Body/Isi post --}}
        <article class="my-3 fs-5">
            {!! $post->body !!}  {{-- {!! !!} is used to prevent XSS attack --}}
        </article>

      </div>
    </div>
  </div>
@endsection