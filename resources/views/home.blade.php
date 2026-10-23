<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer-to-Buyer | Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- 🌾 Navbar -->
    <nav class="bg-green-700 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Farmer<span class="text-yellow-300">Buy</span></h1>
            <ul class="hidden md:flex space-x-6">
                <li><a href="/" class="hover:text-yellow-300">Home</a></li>
                <li><a href="/about" class="hover:text-yellow-300">About</a></li>
                <li><a href="/products" class="hover:text-yellow-300">Products</a></li>
                <li><a href="/contact" class="hover:text-yellow-300">Contact</a></li>
            </ul>
            <div class="hidden md:flex space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-yellow-300 text-green-800 px-4 py-2 rounded-lg font-semibold hover:bg-yellow-400">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="border border-yellow-300 px-4 py-2 rounded-lg hover:bg-yellow-300 hover:text-green-800">Login</a>
                    <a href="{{ route('register') }}" class="bg-yellow-300 text-green-800 px-4 py-2 rounded-lg font-semibold hover:bg-yellow-400">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- 🌿 Hero Section -->
    <section class="bg-green-100 py-20 text-center">
        <h2 class="text-4xl font-extrabold text-green-700">Connecting Farmers and Buyers Seamlessly</h2>
        <p class="text-gray-700 mt-4 text-lg">Get fresh farm produce directly from trusted local farmers.</p>
        <a href="/products" class="mt-6 inline-block bg-green-700 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-green-800">Shop Now</a>
    </section>

    <!-- 🥕 Product Section -->
    <section class="py-16 max-w-7xl mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-10 text-green-700">Featured Products</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($products as $product)
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                    {{-- <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="h-48 w-full object-cover"> --}}
                    <img src="{{ asset('images/products/' . $product->image) }}" 
                                        alt="{{ $product->name }}" 
                     class="w-full h-48 object-cover rounded-lg">

                    <div class="p-4">
                        <h4 class="font-bold text-lg text-green-800">{{ $product->name }}</h4>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($product->description, 60) }}</p>
                        <p class="mt-2 font-semibold text-green-700">₦{{ number_format($product->price, 2) }}</p>
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('products.show', $product->id) }}" class="text-green-700 hover:underline">View</a>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <a href="{{ route('buy', $product->id) }}" 
                                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                    Buy Now </a>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- 🌾 Footer -->
    <footer class="bg-green-800 text-white text-center py-6 mt-12">
        <p>&copy; {{ date('Y') }} Farmer-to-Buyer. All rights reserved.</p>
    </footer>

</body>
</html>
