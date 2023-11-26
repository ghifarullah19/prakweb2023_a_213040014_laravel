{{-- Import file main dari folder layouts --}}
@extends('layouts.main')

{{-- Menyimpan section bernama container berisi content berikut --}}
@section('container')

	{{-- Judul Halaman --}}
	<h1 class="mb-5">Post Categories</h1>
	
	{{-- Content Utama --}}
	<div class="container">
		<div class="row">
			{{-- Loop/Iterasi category yang ada --}}
			@foreach ($categories as $category)
				{{-- Menampilkan categories --}}
				<div class="col-md-4">
					{{-- Link categories --}}
					<a href="/posts?category={{ $category->slug }}">
						{{-- Card categories --}}
						<div class="card text-bg-dark">

							{{-- Image categories --}}
							<img src="https://source.unsplash.com/500x400?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
							
							{{-- Sub-card categories --}}
							<div class="card-img-overlay d-flex align-items-center p-0">
								{{-- Nama categories --}}
								<h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
							</div>

						</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
@endsection

