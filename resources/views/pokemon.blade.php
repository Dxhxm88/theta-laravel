@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pokemon Search</h2>
    <form action="{{ route('pokemon.index') }}" method="get">
        <div class="input-group mb-3">
            <input type="text" name="query" id="query" value="{{ $previousQuery ?? null }}" class="form-control" placeholder="Enter Pokemon name or ID" required>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    @if(isset($error))
        <p>There are error occur, please try again later.</p>
    @endif

    @if(isset($pokemon))
    <div class="row">
        <div class="col-md-4">
            <img src="{{ $pokemon['sprites']['front_default'] }}" class="card-img-top" alt="Pokémon Image">
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <h1 class="card-title fs-1 fw-bolder">{{ ucfirst($pokemon['name']) }}</h1>
                    <p class="card-text fs-4">Height: <span class="badge rounded-pill text-bg-warning">{{ $pokemon['height'] }}</span></p>
                    <p class="card-text fs-4">Weight: <span class="badge rounded-pill text-bg-warning">{{ $pokemon['weight'] }}</span></p>

                    <h3 class="fs-4">Stats:</h3>
                    <ul>
                        @foreach ($pokemon['stats'] as $stat)
                        {{ $stat['stat']['name'] }}
                            <div class="progress" role="progressbar" aria-label="{{$stat['stat']['name']}}" aria-valuenow="{{$stat['base_stat']}}" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar progress-bar-striped" style="width: {{$stat['base_stat']}}%">{{$stat['base_stat']}}%</div>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @elseif(isset($notFound))
        <p>There is no pokemon found.</p>
    @endif
</div>
@endsection
