<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customers.carts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->productId);
        $itemCart = Cart::add($request->productId, $product->name, $product->price, $product->image);
        return response()->json([
            'cartContent' => view('customers.carts.components.itemCart', ['cartContent' => Cart::content()])->render(),
            'total' => Cart::count(),
            'subTotal' => number_format(Cart::subTotal()),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //remove
    public function edit($id)
    {
        $cartItem = Cart::remove($id);
        return response()->json([
            'subTotal' => number_format(Cart::subtotal()),
            'cartContent' => view('customers.carts.components.itemCart', ['cartContent' => Cart::content()])->render(),
            'total' => Cart::count(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $item = Cart::update($id, $request->qty);
            return response()->json([
                'subTotal' => number_format(Cart::subtotal()),
                'cartContent' => view('customers.carts.components.itemCart', ['cartContent' => Cart::content()])->render(),
                'totalItem' => Cart::count(),
                'priceTotal' => number_format($item['price'] * $item['qty']),
            ]);
        }
        // return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Cart::destroy();
    }
}
