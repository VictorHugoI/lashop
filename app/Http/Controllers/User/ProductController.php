<?php

namespace App\Http\Controllers\User;

use App\Models\Comment;
use App\Models\Picture;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);
        $pictures = $product->pictures()->get();
        $sameBrand = Product::where('brand_id', $product->brand_id)->take(6)->get();
        $sameCategory = Product::where('category_id', $product->category_id)->take(6)->get();
        $comments = Comment::where('product_id', $id)->get();

        return view('user.detail_product', compact('product', 'pictures', 'sameBrand', 'sameCategory', 'comments'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('user.items.quickviewItem', compact('product'))->render();
    }
}
