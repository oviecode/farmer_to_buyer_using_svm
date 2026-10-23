@extends('layed.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-3xl font-bold text-green-700 mb-6">User Dashboard</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Profile Card --}}
        <div class="bg-green-50 border border-green-200 p-5 rounded-lg">
            <h3 class="font-semibold text-lg mb-3">👤 Profile</h3>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <a href="{{ route('profile.edit') }}" class="text-green-700 underline mt-2 inline-block">Edit Profile</a>
        </div>

        {{-- Cart Summary --}}
        <div class="bg-yellow-50 border border-yellow-200 p-5 rounded-lg">
            <h3 class="font-semibold text-lg mb-3">🛒 Cart Summary</h3>
            @if(count($cart) > 0)
                <ul class="list-disc list-inside">
                    @foreach($cart as $item)
                        <li>{{ $item['name'] }} (₦{{ $item['price'] }} × {{ $item['quantity'] }})</li>
                    @endforeach
                </ul>
                <p class="mt-3 font-semibold">
                    Total: ₦{{ array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cart)) }}
                </p>
                <a href="{{ route('cart.show') }}" class="text-green-700 underline mt-2 inline-block">View Cart</a>
            @else
                <p>No items in your cart.</p>
            @endif
        </div>

        {{-- Orders Section --}}
        <div class="bg-blue-50 border border-blue-200 p-5 rounded-lg">
            <h3 class="font-semibold text-lg mb-3">📦 Recent Orders</h3>
            @if(count($orders) > 0)
                <ul class="list-disc list-inside">
                    @foreach($orders as $order)
                        <li>Order #{{ $order->id }} - ₦{{ $order->total }} ({{ $order->status }})</li>
                    @endforeach
                </ul>
            @else
                <p>You haven’t placed any orders yet.</p>
            @endif
        </div>

    </div>
</div>
@endsection
