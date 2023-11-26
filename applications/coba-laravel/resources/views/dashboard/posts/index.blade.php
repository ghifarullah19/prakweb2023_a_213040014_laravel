{{-- Import file main dari folder dashboard/layouts --}}
@extends('dashboard.layouts.main')

{{-- Menyimpan section bernama container berisi content berikut --}}
@section('container')
  {{-- Judul Halaman --}}
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div>

  {{-- Menangani jika berhasil menambahkan/mengubah/menghapus post --}}
  @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
  @endif

  {{-- Tabel post --}}
  <div class="table-responsive col-lg-8">
    {{-- Button create new post --}}
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Post</a>
    {{-- Tabel --}}
    <table class="table table-striped table-sm">
      {{-- Kolom --}}
      <thead>
        {{-- Baris Kolom --}}
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      {{-- Isi --}}
      <tbody>
        {{-- Loop/Iterasi post yang ada --}}
        @foreach ($posts as $post)
          <tr>
            {{-- Nomor --}}
            <td>{{ $loop->iteration }}</td>

            {{-- Judul --}}
            <td>{{ $post->title }}</td>

            {{-- Category --}}
            <td>{{ $post->category->name }}</td>

            {{-- Action --}}
            <td>
              {{-- Lihat --}}
              <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info">
                {{-- Icon lihat --}}
                <i class="bi bi-eye"></i>
              </a>
              {{-- Edit --}}
              <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning">
                {{-- Icon edit --}}
                <i class="bi bi-pencil-square"></i>
              </a>

              {{-- Hapus --}}
              <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                {{-- Menangani penyerangan Cross-Site Request Forgery --}}
                @csrf
                {{-- Menangani method DELETE --}}
                @method('delete')
                {{-- Button hapus --}}
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                  {{-- Icon hapus --}}
                  <i class="bi bi-x-circle"></i>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection