@extends('layouts.app')

@section('content')
<div class="container">

    <div class="mb-3">
        <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
    </div>

    <form method="POST" action="{{ route('post.update', $post->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3">{{ $post->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('post.destroy', $post->id) }}" class="btn btn-danger">Delete</a>
    </form>
</div>
@endsection
