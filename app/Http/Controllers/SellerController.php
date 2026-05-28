<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class SellerController extends Controller
{
    public function dashboard()
    {
        $productsCount = Product::where('user_id', auth()->id())->count();
        
        $ordersCount = Order::whereHas('items.product', function ($query) {
            $query->where('user_id', auth()->id());
        })->count();

        $recentOrders = Order::whereHas('items.product', function ($query) {
            $query->where('user_id', auth()->id());
        })->with('user')->latest()->take(5)->get();

        return view('seller.dashboard', compact('productsCount', 'ordersCount', 'recentOrders'));
    }
}
