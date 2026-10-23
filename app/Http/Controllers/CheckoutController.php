<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function buy()
    {
        if (!Auth::check()) {
            return redirect()->route('register')
                ->with('error', 'Please register or login before proceeding to checkout.');
        }

       return view('cart.checkout');

    }
}
