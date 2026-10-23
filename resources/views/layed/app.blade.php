<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer-to-Buyer Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    {{-- Navbar --}}
    <nav class="bg-green-700 text-white p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Farmer to Buyer Platform</h1>
       

            <div class="flex items-center space-x-6">
                <a href="{{ route('home') }}" class="hover:text-yellow-300">Home</a>
                <a href="{{ route('products.index') }}" class="hover:text-yellow-300">Products</a>
                <a href="{{ route('about') }}" class="hover:text-yellow-300">About</a>
                <a href="{{ route('contact') }}" class="hover:text-yellow-300">Contact</a>
                     @auth
                        <a href="{{ route('user.dashboard') }}" class="hover:text-yellow-300">Dashboard</a>
                     @endauth
                <a href="{{ route('cart.show') }}" class="relative hover:text-yellow-300">
                    🛒
                    @php $cartCount = count(session('cart', [])); @endphp
                    @if($cartCount > 0)
                        <span class="absolute -top-2 -right-2 bg-red-600 text-xs text-white px-1 rounded-full">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
            </div>
        </div>
    </nav>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="bg-green-500 text-white text-center p-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Main Content --}}
    <main class="min-h-screen p-6">
        @yield('content')
    </main>

    <footer class="bg-green-700 text-white text-center py-4 mt-12">
        <p>&copy; {{ date('Y') }} Farmer to Buyer Platform - Connecting Farmers & Buyers</p>
    </footer>

</body>
</html>
