<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product; 
use App\Models\Comment; 

class ProductsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        // $pictures = $product->pictures()->get();
        // $sameBrand = Product::where('brand_id', $product->brand_id)->take(6)->get();
        // $sameCategory = Product::where('category_id', $product->category_id)->take(6)->get();
        $comments = Comment::where('product_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        // dd($product->getAttribute('prop_weight'));
        // dd($product->category->categoryProperties);
        
        // dd($product->getPropertyUnit(2));
        
        $renderData = compact('product', 'comments');

        return view('customers.products.detail', $renderData);
    }

}
