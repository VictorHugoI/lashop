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

        $comments = $product->comments()->orderBy('created_at', 'desc')->paginate(5);
        
        $renderData = compact('product', 'comments');

        return view('customers.products.detail', $renderData);
    }

}
