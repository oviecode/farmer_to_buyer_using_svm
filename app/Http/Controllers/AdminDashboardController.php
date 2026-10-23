<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get counts
        $userCount = User::count();
        $productCount = Product::count();
        $orderCount = Order::count();

        // Safely calculate revenue
        // Make sure the 'total' column exists in your orders table
        $revenue = Order::sum('total') ?? 0; // returns 0 if no orders

        // Pass data to the view
        return view('admin.dashboard', [
            'userCount' => $userCount,
            'productCount' => $productCount,
            'orderCount' => $orderCount,
            'revenue' => $revenue
        ]);
    }
}
