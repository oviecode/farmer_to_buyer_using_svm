<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmerDashboardController extends Controller
{
    public function index()
    {
        $farmer = Auth::user(); // or Auth::guard('farmer')->user();
        $products = $farmer->products ?? []; // Farmer’s products
        $ordersData = $farmer->orders ?? []; // Could be JSON or relationship

        // ✅ Decode JSON if needed
        if (is_string($ordersData)) {
            $ordersData = json_decode($ordersData, true) ?? [];
        }

        // ✅ Convert to collection
        $orders = collect($ordersData);

        // Total sales
        $totalSales = $orders->sum('total');

        return view('farmer.dashboard', compact('farmer', 'products', 'orders', 'totalSales'));
    }
}
