@extends('layed.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <h2 class="text-4xl font-extrabold text-green-700 mb-8">👑 Admin Dashboard</h2>

    <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 mb-10">
        <div class="bg-gradient-to-r from-green-600 to-green-400 text-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-lg font-semibold">Users</h3>
            <p class="text-3xl font-bold mt-2">{{ $userCount }}</p>
        </div>
        <div class="bg-gradient-to-r from-blue-600 to-blue-400 text-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-lg font-semibold">Products</h3>
            <p class="text-3xl font-bold mt-2">{{ $productCount }}</p>
        </div>
        <div class="bg-gradient-to-r from-yellow-500 to-yellow-300 text-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-lg font-semibold">Orders</h3>
            <p class="text-3xl font-bold mt-2">{{ $orderCount }}</p>
        </div>
        <div class="bg-gradient-to-r from-purple-600 to-purple-400 text-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-lg font-semibold">Revenue</h3>
            <p class="text-3xl font-bold mt-2">₦{{ number_format($revenue) }}</p>
        </div>
    </div>

    <div class="text-center">
        <a href="/admin" class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg shadow-lg">
            Go to Voyager Admin Panel
        </a>
    </div>
</div>
@endsection
