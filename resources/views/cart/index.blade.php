@extends('layed.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold text-green-700 mb-8 text-center">Shopping Basket</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <table class="w-full bg-white rounded-lg shadow overflow-hidden">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="p-3 text-left">Product</th>
                    <th class="p-3 text-left">Price</th>
                    <th class="p-3 text-center">Quantity</th>
                    <th class="p-3 text-right">Total</th>
                    <th class="p-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cart as $id => $details)
                    @php $total += $details['price'] * $details['quantity']; @endphp
                    <tr class="border-b">
                        <td class="p-3 flex items-center gap-3">
                            <img src="{{ asset('images/products/' . $details['image']) }}" class="h-16 w-16 object-cover rounded">
                            <span>{{ $details['name'] }}</span>
                        </td>
                        <td class="p-3">₦{{ number_format($details['price'], 2) }}</td>
                        <td class="p-3 text-center">
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="inline">
                                @csrf
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1"
                                       class="w-16 text-center border rounded">
                                <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded ml-2">Update</button>
                            </form>
                        </td>
                        <td class="p-3 text-right font-bold">₦{{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                        <td class="p-3 text-center">
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button class="bg-red-500 text-white px-3 py-1 rounded">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-between items-center mt-6">
            <h2 class="text-xl font-bold">Grand Total: ₦{{ number_format($total, 2) }}</h2>
            <a href="{{ route('cart.checkout') }}"
               class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800">
                Proceed to Checkout
            </a>
        </div>
    @else
        <p class="text-center text-gray-600 mt-8">Your basket is empty.</p>
    @endif
</div>
@endsection
