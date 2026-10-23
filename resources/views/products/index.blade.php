@extends('layed.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold text-green-700 mb-8 text-center">All Farm Products</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($products as $product)
            <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                {{-- <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="h-48 w-full object-cover"> --}}
                <img src="{{ asset('images/products/' . $product->image) }}" 
     alt="{{ $product->name }}" 
     class="w-full h-36 object-cover rounded-lg">

                <div class="p-4">
                    <h4 class="font-bold text-lg text-green-800">{{ $product->name }}</h4>
                    <p class="text-gray-600 text-sm mt-2">{{ Str::limit($product->description, 60) }}</p>
                    <p class="mt-2 font-semibold text-green-700">₦{{ number_format($product->price, 2) }}</p>
                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('products.show', $product->id) }}" class="text-green-700 hover:underline">View</a>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-yellow-300 text-green-900 px-3 py-1 rounded-lg hover:bg-yellow-400">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-10">
        {{ $products->links() }}
    </div>
</div>
@endsection
