<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->where('is_active', true);

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('price')) {
            $query->where(function ($q) use ($request) {
                $prices = (array) $request->price;
                if (in_array('under_500k', $prices)) {
                    $q->orWhere('price', '<', 500000);
                }
                if (in_array('500k_1m', $prices)) {
                    $q->orWhereBetween('price', [500000, 1000000]);
                }
                if (in_array('1m_2m', $prices)) {
                    $q->orWhereBetween('price', [1000000, 2000000]);
                }
                if (in_array('over_2m', $prices)) {
                    $q->orWhere('price', '>', 2000000);
                }
            });
        }

        if ($request->filled('sort')) {
            match ($request->sort) {
                'price_asc'   => $query->orderBy('price', 'asc'),
                'price_desc'  => $query->orderBy('price', 'desc'),
                'newest'      => $query->latest(),
                default       => $query->latest(),
            };
        } else {
            $query->latest();
        }

        $products   = $query->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    public function show(string $slug)
    {
        $product  = Product::with('category')->where('slug', $slug)->where('is_active', true)->firstOrFail();
        $related  = Product::where('category_id', $product->category_id)
                        ->where('id', '!=', $product->id)
                        ->where('is_active', true)
                        ->take(4)
                        ->get();

        return view('products.show', compact('product', 'related'));
    }
}
