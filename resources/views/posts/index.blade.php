@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-4">Latest Blog Posts</h2>

            <!-- Blog Post List -->
            @foreach($posts as $post)
            <div class="card mb-4">
                <img src="{{ asset('images/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ substr($post->content, 0, 200) }}...</p>
                    <a href="{{ route('blog.show', $post->id) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
            @endforeach

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
        <div class="col-md-4">
            <h2 class="mb-4">Categories</h2>
            <ul class="list-group">
                <li class="list-group-item">Technology</li>
                <li class="list-group-item">Travel</li>
                <li class="list-group-item">Food</li>
                <!-- Add more categories as needed -->
            </ul>
        </div>
    </div>
</div>
@endsection
