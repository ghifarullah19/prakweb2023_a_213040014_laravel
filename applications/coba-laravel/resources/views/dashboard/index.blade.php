{{-- Import file main dari folder dashboard/layouts --}}
@extends('dashboard.layouts.main')

{{-- Menyimpan section bernama container berisi content berikut --}}
@section('container')
  {{-- Content Utama --}}
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    {{-- Title welcome --}}
    <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
  </div>
@endsection