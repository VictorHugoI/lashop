<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $lastestProducts = Product::orderBy('created_at', 'desc')->take(8)->get();
        $bestSellers = Product::take(8)->get();
        $highProducts = Product::where('score', '>', 3)->take(8)->get();

        $samsung = Product::where('brand_id', 1)->take(8)->get();

        return view('customers.home.home', compact(
            'lastestProducts',
            'bestSellers',
            'highProducts'
        ));
    }

    public function show($id)
    {
        $product = Product::find($id);

        return response()->json([
            'view' => view('customers.sections.components.detail_product', compact('product'))->render(),
        ]);
    }
}
