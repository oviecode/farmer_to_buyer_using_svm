@extends('layed.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4 text-green-700">Checkout Page</h2>

    @guest
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-6">
            You need to 
            <a href="{{ route('register') }}" class="text-green-700 underline">register</a> 
            or 
            <a href="{{ route('login') }}" class="text-green-700 underline">login</a> 
            before you can complete a purchase.
        </div>
    @else
        <p class="mb-4">Hello, <strong>{{ Auth::user()->name }}</strong> 👋</p>

        <div class="border p-4 rounded-lg">
            <h5 class="font-bold mb-3">Your Cart Summary</h5>
            <ul class="list-disc list-inside">
                @if(session('cart'))
                    @foreach(session('cart') as $id => $item)
                        <li>{{ $item['name'] }} - ₦{{ $item['price'] }} (x{{ $item['quantity'] }})</li>
                    @endforeach
                @else
                    <li>No items in your cart.</li>
                @endif
            </ul>

            <hr class="my-4">

            <p><strong>Total:</strong> ₦
                @if(session('cart'))
                    {{ array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], session('cart'))) }}
                @else
                    0
                @endif
            </p>

            <button class="mt-4 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Proceed to Payment</button>
        </div>
    @endguest
</div>
@endsection
