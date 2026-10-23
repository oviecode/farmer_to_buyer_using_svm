@extends('layed.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-10">
    <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col md:flex-row gap-6">
        {{-- <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full md:w-1/2 h-80 object-cover rounded-lg"> --}}
        <img src="{{ asset('images/products/' . $product->image) }}" 
     alt="{{ $product->name }}" 
     class="w-full md:w-1/2 h-80 object-cover rounded-lg">

        
        <div class="flex-1">
            <h2 class="text-3xl font-bold text-green-700">{{ $product->name }}</h2>
            <p class="mt-3 text-gray-700 text-lg">{{ $product->description }}</p>
            <p class="mt-4 text-xl font-semibold text-green-800">₦{{ number_format($product->price, 2) }}</p>
            <p class="mt-2 text-gray-600">Available Quantity: <span class="font-semibold">{{ $product->quantity }}</span> {{ $product->unit }}</p>
            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="bg-yellow-300 text-green-900 px-5 py-2 rounded-lg font-semibold hover:bg-yellow-400">Add to Cart</button>
            </form>
            <a href="/products" class="mt-4 inline-block text-green-700 hover:underline">← Back to Products</a>
        </div>
    </div>
</div>
@endsection
