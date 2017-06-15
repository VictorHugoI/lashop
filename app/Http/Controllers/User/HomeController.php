<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $best_seller = Product::bestSeller();

        $latest_product = Product::latestProduct();

        $old_product = Product::oldProduct();

        $product1 = Product::find(Session::get('compare1'));
        $product2 = Product::find(Session::get('compare2'));

        return view('user.index', compact('best_seller', 'latest_product', 'old_product', 'product1', 'product2'));
    }
}
