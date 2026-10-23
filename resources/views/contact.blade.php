@extends('layed.app')

@section('content')
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-3xl font-bold text-green-700 mb-6 text-center">Contact Us</h1>

        <p class="text-gray-600 text-center mb-8">
            Have a question, feedback, or partnership inquiry?  
            We'd love to hear from you. Reach out to us through the form below.
        </p>

        <form action="#" method="POST" class="bg-gray-100 p-8 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                <input type="text" id="name" name="name" required
                       class="w-full p-3 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                <input type="email" id="email" name="email" required
                       class="w-full p-3 border border-gray-300 rounded-md">
            </div>

            <div class="mb-6">
                <label for="message" class="block text-gray-700 font-semibold mb-2">Message</label>
                <textarea id="message" name="message" rows="5" required
                          class="w-full p-3 border border-gray-300 rounded-md"></textarea>
            </div>

            <button type="submit"
                    class="w-full bg-green-600 text-white py-3 rounded-md font-semibold hover:bg-green-700">
                Send Message
            </button>
        </form>
    </div>
</section>
@endsection
