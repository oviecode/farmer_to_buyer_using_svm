@extends('layed.app')

@section('content')
<div class="container mt-4">
    <h3>Checkout</h3>
    <p>Welcome, {{ Auth::user()->name ?? 'Guest' }}</p>
    <p>This is where your checkout process will begin.</p>
</div>
@endsection
