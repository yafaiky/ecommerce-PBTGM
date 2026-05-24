<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function dashboard(): View
    {
        $user         = auth()->user();
        $recentOrders = Order::where('user_id', $user->id)->latest()->take(5)->get();
        $cartCount    = Cart::where('user_id', $user->id)->count();
        $totalOrders  = Order::where('user_id', $user->id)->count();
        $totalSpent   = Order::where('user_id', $user->id)
                            ->whereIn('status', ['delivered', 'processing', 'shipped'])
                            ->sum('total_price');

        return view('users.users', compact('user', 'recentOrders', 'cartCount', 'totalOrders', 'totalSpent'));
    }

    public function orders(): View
    {
        $orders = Order::with('items.product')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }
}
