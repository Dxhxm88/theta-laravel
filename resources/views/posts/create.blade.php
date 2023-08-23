@extends('layouts.app')

@section('content')
<div class="container">

    <div class="mb-3">
        <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
    </div>

    <form method="POST" action="{{ route('post.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
