@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8">
            <div class="mb-3">
                <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                @if(auth()->user()->id == $post->user_id)
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                @endif
            </div>

            <div>
                <div>
                    <span class="fs-1">{{ $post->title }}</span> <span class=" fs-4 fw-italic"> by {{ $post->author->name }}</span>
                </div>

                <p class="fs-5">
                    {!! $post->description !!}
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <h2 class="mb-4">Comments</h2>

            <form action="{{ route('comment.store', $post->id) }}" method="POST">
            @csrf
                <div class="mb-3">
                    <label class="form-label">Comment</label>
                    <textarea class="form-control" name="text" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <hr>

            @forelse($post->comments as $comment)
            <div class="card w-100 mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $comment->commenter->name }}</h5>
                    <p class="card-text">{{ $comment->text }}</p>
                </div>
            </div>
            @empty
                <p class="text-center">
                    No comment yet.
                </p>
            @endforelse

        </div>
    </div>
</div>
@endsection
