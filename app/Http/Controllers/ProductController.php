<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 🧱 Show all products (Product listing page)
    public function index()
    {
        $products = Product::paginate(12);
        return view('products.index', compact('products'));
    }

    // 👁 Show a single product (Product details page)
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function buy($id)
        {
            if (!auth()->check()) {
                return redirect()->route('register')->with('message', 'Please register to continue.');
            }

            if (auth()->user()->role === 'admin') {
                return redirect('/admin');
            }

            return redirect()->route('checkout', ['product' => $id]);
        }

}
