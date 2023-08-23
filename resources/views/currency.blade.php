@extends('layouts.app')

@section('content')
<div class="container mt-5">
<h2>Currency Exchange</h2>
    <form action="{{ route('currency.fetch') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="from">From Currency</label>
            <select name="from" class="form-control" required>
                <option value="USD">USD</option>
                <!-- Add more currency options here -->
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="to">To Currency</label>
            <select name="to" class="form-control" required>
                <option value="EUR">EUR</option>
                <!-- Add more currency options here -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Convert</button>
    </form>
</div>
@endsection
