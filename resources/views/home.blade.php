@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Latest Blog Posts</h2>
                <a href="{{ route('post.create') }}" class="btn btn-primary">Create New Post</a>
            </div>
            <!-- Blog Post List -->
            @forelse($posts as $post)
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }} by {{ $post->author->name }}</h5>
                        <p class="card-text">{{ substr($post->description, 0, 200) }}...</p>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>


                <div>
                    {{ $posts->links() }}
                </div>
            @empty
                No post created yet!!
            @endforelse
        </div>
    </div>
</div>
@endsection
