@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post->title }}</h2>
        {!! $post->body !!}  {{-- {!! !!} is used to prevent XSS attack --}}
    </article>
    
    <a href="/posts">Back to Posts</a>
@endsection