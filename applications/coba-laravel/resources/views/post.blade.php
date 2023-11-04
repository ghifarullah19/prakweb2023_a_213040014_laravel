@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post->title }}</h2>

        <p>By. Muhammad Lutfi in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

        {!! $post->body !!}  {{-- {!! !!} is used to prevent XSS attack --}}
    </article>
    
    <a href="/posts">Back to Posts</a>
@endsection