{{-- Import file main dari folder layouts --}}
@extends('layouts.main')

{{-- Menyimpan section bernama container dengan content berikut --}}
@section('container')

	{{-- Judul Halaman --}}
	<h1 class="mb-3 text-center">{{ $title }}</h1>

	{{-- Content Utama --}}
	<div class="row justify-content-center mb-3">
		<div class="col-md-6">
			{{-- Form search --}}
			<form action="/posts" method="get">
				
				{{-- Menangani jika membuka posts berdasarkan category, maka akan mencari posts dengan parameter category --}}
				@if (request('category'))
				<input type="hidden" name="category" value="{{ request('category') }}">
				@endif
				
				{{-- Menangani jika membuka posts berdasarkan author, maka akan mencari posts dengan parameter author --}}
				@if (request('author'))
					<input type="hidden" name="author" value="{{ request('author') }}">
				@endif

				{{-- Input search --}}
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request("search") }}">
					<button class="btn btn-outline-danger" type="submit">Search</button>
				</div>
			</form>
		</div>
	</div>

	{{-- Menampilkan posts --}}
	@if ($posts->count() > 0)
		{{-- Menampilkan post terbaru --}}
		<div class="card mb-3">

			{{-- Jika post memiliki gambar dari user --}}
			@if ($posts[0]->image)
				{{-- Tampilkan gambar tersebut --}}
				<div style="max-height: 400px; overflow: hidden">
					<img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
				</div>

			{{-- Jika tidak ada gambar dari user --}}
			@else
				{{-- Tampilkan gambar dari unsplash --}}
				<img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
			@endif
			
			{{-- Body post --}}
			<div class="card-body text-center">
				{{-- Judul --}}
				<h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h5>
				
				{{-- Info post --}}
				<p>
					<small class="text-body-secondary">
							{{-- Author --}}
							By. <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> 
							{{-- Category --}}
							in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> 
							{{-- Created_at --}}
							{{ $posts[0]->created_at->diffForHumans() }}
					</small>
				</p>
				
				{{-- Excerpt --}}
				<p class="card-text">{{ $posts[0]->excerpt }}</p>

				{{-- Button read more --}}
				<a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
			</div>
		</div>

	{{-- Menampilkan post selain post terbaru --}}
	<div class="container">
		<div class="row">
			{{-- Loop/Iterasi semua post --}}
			@foreach ($posts->skip(1) as $post)
				<div class="col-md-4 mb-3">
					{{-- Card post --}}
					<div class="card">
						{{-- Category --}}
						<div class="position-absolute px-3 py-2 " style="background-color: rgba(0, 0, 0, 0.7)">
							{{-- Link category --}}
							<a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">
								{{-- Nama category --}}
								{{ $post->category->name }}
							</a>
						</div>
						
						{{-- Jika post memiliki gambar dari user --}}
						@if ($post->image)
							{{-- Tampilkan gambar tersebut --}}
							<img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">

						{{-- Jika tidak ada gambar dari user --}}
						@else
							{{-- Tampilkan gambar dari unsplash --}}
							<img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
						@endif
						
						{{-- Body post --}}
						<div class="card-body">
							{{-- Judul --}}
							<h5 class="card-title">{{ $post->title }}</h5>

							{{-- Info post --}}
							<p>
								<small class="text-body-secondary">
									{{-- Author --}}
									By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> 
									{{-- Created_at --}}
									{{ $post->created_at->diffForHumans() }}
								</small>
							</p>
							
							{{-- Excerpt --}}
							<p class="card-text">{{ $post->excerpt }}</p>
							
							{{-- Button read more --}}
							<a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

	{{-- Jika tidak ada post --}}
	@else
		{{-- Tampilkan tidak ada post --}}
		<p class="text-center fs-4">No post found.</p>
	@endif

	{{-- Pagination --}}
	<div class="d-flex justify-content-end">
		{{ $posts->links() }}
	</div>
@endsection

