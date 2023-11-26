{{-- Import file main dari folder layouts --}}
@extends('layouts.main')

{{-- Menyimpan section bernama container berisi content berikut --}}
@section('container')
    {{-- Judul Halaman --}}
    <h1>Halaman About</h1>
    
    {{-- Nama Developer --}}
    <h3>{{ $name }}</h3>
    
    {{-- Email Developer --}}
    <p>{{ $email }}</p>
    
    {{-- Image Developer --}}
    <img src="img/{{ $image }}" alt="{{ $name }}" width="
    200" class="img-thumbnail rounded-circle">    
@endsection