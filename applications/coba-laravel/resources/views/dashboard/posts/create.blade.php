{{-- Import file main dari folder layouts --}}
@extends('dashboard.layouts.main')

{{-- Menyimpan section bernama container berisi content berikut --}}
@section('container')
  {{-- Button create new post --}}
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
  </div>

  <div class="col-lg-8">

    {{-- Form input --}}
    <form method="POST" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
      {{-- Menangani penyerangan Cross-Site Request Forgery --}}
      @csrf
      {{-- Bagian judul --}}
      <div class="mb-3">
        {{-- Label judul --}}
        <label for="title" class="form-label">Title</label>
        {{-- Input judul --}}
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
        {{-- Menampilkan error jika judul tidak valid --}}
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror  
      </div>

      {{-- Bagian slug --}}
      <div class="mb-3">
        {{-- Label slug --}}
        <label for="slug" class="form-label">Slug</label>
        {{-- Input slug --}}
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
        {{-- Menampilkan error jika slug tidak valid --}}
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      {{-- Category --}}
      <div class="mb-3">
        {{-- Label caetgory --}}
        <label for="category" class="form-label">Category</label>
        {{-- Dropdown category --}}
        <select class="form-select" name="category_id">
          {{-- Loop/Iterasi category yang ada --}}
          @foreach ($categories as $category)
            {{-- Jika category yang dipilih sama dengan category yang ada --}}
            @if (old('category_id') == $category->id)
              {{-- Tampilkan category yang dipilih --}}
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            {{-- Jika tidak --}}
            @else
              {{-- Tampilkan category yang ada --}}
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
      </div>

      {{-- Bagian image --}}
      <div class="mb-3">
        {{-- Label image --}}
        <label for="image" class="form-label">Post Image</label>
        {{-- Input image --}}
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
        {{-- Menampilkan error jika image tidak valid --}}
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      {{-- Bagian body --}}
      <div class="mb-3">
        {{-- Label body --}}
        <label for="body" class="form-label">Body</label>
        {{-- Menampilkan error jika body tidak valid --}}
        @error('body')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        {{-- Input/Text area/Text editor body --}}
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        {{-- Trix Editor --}}
        <trix-editor input="body"></trix-editor>
      </div>

      {{-- Button create post --}}
      <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
  </div>

  {{-- Script untuk slug dan trix editor --}}
  <script>
    // Mengambil element title dan slug
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    // Menangani event ketika title diubah
    title.addEventListener('change', function() {
      // Mengambil value dari title
      fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json()) // Mengubah response menjadi json
        .then(data => slug.value = data.slug) // Mengubah value dari slug menjadi data.slug
    });

    // Menangani event ketika trix-editor diubah
    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    })
  </script>
@endsection