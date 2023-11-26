{{-- Import file main dari folder layouts --}}
@extends('layouts.main')

{{-- Menyimpan section bernama container berisi content berikut --}}
@section('container')

{{-- Content Utama --}}
<div class="row justify-content-center">
  <div class="col-lg-5">
    <main class="form-registration">

      {{-- Judul Halaman --}}
      <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
        
      {{-- Form register --}}
      <form action="/register" method="POST">
        {{-- Menangani penyerangan Cross-Site Request Forgery --}}
        @csrf

        {{-- Bagian nama --}}
        <div class="form-floating">
          {{-- Input nama --}}
          <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
          {{-- Label nama --}}
          <label for="name">Name</label>
          {{-- Menampilkan error jika nama tidak valid --}}
          @error('name')
            <div class="invalid-feedback">
              {{ $message  }}
            </div>
          @enderror
        </div>

        {{-- Bagian username --}}
        <div class="form-floating">
          {{-- Input username --}}
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
          {{-- Label username --}}
          <label for="username">Username</label>
          {{-- Menampilkan error jika username tidak valid --}}
          @error('username')
            <div class="invalid-feedback">
              {{ $message  }}
            </div>
          @enderror
        </div>

        {{-- Bagian email --}}
        <div class="form-floating">
          {{-- Input email --}}
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
          {{-- Label email --}}
          <label for="email">Email address</label>
          {{-- Menampilkan error jika email tidak valid --}}
          @error('email')
            <div class="invalid-feedback">
              {{ $message  }}
            </div>
          @enderror
        </div>

        {{-- Bagian password --}}
        <div class="form-floating">
          {{-- Input password --}}
          <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
          {{-- Label password --}}
          <label for="password">Password</label>
          {{-- Menampilkan error jika password tidak valid --}}
          @error('password')
            <div class="invalid-feedback">
              {{ $message  }}
            </div>
          @enderror
        </div>
    
        {{-- Button register --}}
        <button class="btn btn-primary w-100 mt-3" type="submit">Register</button>
      </form>
        
      {{-- Link login --}}
      <small class="d-block text-center mt-3">Already registered? 
        <a href="/login">Login</a>
      </small>
    </main>
  </div>
</div>
@endsection