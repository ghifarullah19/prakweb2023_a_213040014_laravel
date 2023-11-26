{{-- Import file main dari folder layouts --}}
@extends('layouts.main')

{{-- Menyimpan section bernama container berisi content berikut --}}
@section('container')
<div class="row justify-content-center">
  <div class="col-md-4">
    {{-- Menangani jika login berhasil --}}
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>  
    @endif

    {{-- Menangani jika login gagal --}}
    @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>  
    @endif

    {{-- Content utama --}}
    <main class="form-signin">
      {{-- Judul halaman --}}
      <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
        
      {{-- Form login --}}
      <form action="/login" method="POST">
        {{-- Menangani penyerangan Cross-Site Request Forgery --}}
        @csrf
        {{-- Bagian email --}}
        <div class="form-floating">
          {{-- Input email --}}
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
          {{-- Label email --}}
          <label for="email">Email address</label>
          {{-- Menampilkan error jika email tidak valid --}}
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        {{-- Bagian password --}}
        <div class="form-floating">
          {{-- Input password --}}
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          {{-- Label password --}}
          <label for="password">Password</label>
        </div>
    
        {{-- Button login --}}
        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
      </form>

      {{-- Link register --}}
      <small class="d-block text-center mt-3">Not registered? 
        <a href="/register">Register Now!</a>
      </small>
      
    </main>
  </div>
</div>
@endsection