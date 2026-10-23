<x-app-layout>
    <section class="bg-gray-50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Header --}}
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-10">
                <div>
                    <h1 class="text-4xl font-bold text-green-700">Welcome back, {{ $user->name }} 👋</h1>
                    <p class="text-gray-600 mt-2">Here’s what’s happening with your account today.</p>
                </div>
                <a href="{{ route('profile.edit') }}" 
                   class="mt-4 md:mt-0 inline-block bg-green-700 text-white px-6 py-2 rounded-lg shadow hover:bg-green-800 transition">
                    Edit Profile
                </a>
            </div>

            {{-- Overview Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-gray-500 text-sm font-semibold">Total Orders</h3>
                    <p class="text-3xl font-bold text-green-700 mt-2">{{ count($orders) }}</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-gray-500 text-sm font-semibold">Items in Cart</h3>
                    <p class="text-3xl font-bold text-yellow-600 mt-2">{{ count($cart) }}</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-gray-500 text-sm font-semibold">Account Type</h3>
                    <p class="text-3xl font-bold text-blue-600 mt-2">Buyer</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-gray-500 text-sm font-semibold">Member Since</h3>
                    <p class="text-lg font-semibold text-gray-700 mt-2">{{ $user->created_at->format('M Y') }}</p>
                </div>
            </div>

            {{-- Main Dashboard Sections --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                {{-- Profile Summary --}}
                <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-green-700">
                    <h2 class="text-2xl font-bold text-green-700 mb-4">👤 Profile</h2>
                    <div class="space-y-2">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                    </div>
                    <a href="{{ route('profile.edit') }}" 
                       class="block mt-4 text-center bg-green-700 text-white py-2 rounded-lg hover:bg-green-800 transition">
                       Manage Account
                    </a>
                </div>

                {{-- Cart Summary --}}
                <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-yellow-500">
                    <h2 class="text-2xl font-bold text-yellow-600 mb-4">🛒 Cart Summary</h2>

                    @if(count($cart) > 0)
                        <ul class="divide-y divide-gray-200">
                            @foreach($cart as $item)
                                <li class="py-2 flex justify-between">
                                    <span>{{ $item['name'] }}</span>
                                    <span class="font-semibold">₦{{ $item['price'] }} × {{ $item['quantity'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-4 font-semibold text-gray-700">
                            Total: ₦{{ array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cart)) }}
                        </div>
                        <a href="{{ route('cart.show') }}" 
                           class="block mt-3 text-center bg-yellow-500 text-white py-2 rounded-lg hover:bg-yellow-600 transition">
                           View Cart
                        </a>
                    @else
                        <p>No items in your cart.</p>
                    @endif
                </div>

                {{-- Orders --}}
                <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-blue-500">
                    <h2 class="text-2xl font-bold text-blue-600 mb-4">📦 Recent Orders</h2>

                    @if(count($orders) > 0)
                        <ul class="divide-y divide-gray-200">
                            @foreach($orders as $order)
                                <li class="py-2 flex justify-between">
                                    <span>Order #{{ $order->id }}</span>
                                    <span class="font-semibold text-gray-700">₦{{ $order->total }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>You haven’t placed any orders yet.</p>
                    @endif
                </div>
            </div>

        </div>
    </section>
</x-app-layout>
