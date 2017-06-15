<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
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
        $cartItem = Cart::content();
        $subTotal = Cart::subtotal();

        return view('user.cartContent', compact('cartItem', 'subTotal'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->productId);

        if ($product->price_sale != null) {
            $cartItem = Cart::add($product->id, $product->name, $request->qty, $product->getOriginal('price_sale'), ['url' => $product->url]);
        } else {
            $cartItem = Cart::add($product->id, $product->name, $request->qty, $product->getOriginal('price'), ['url' => $product->url]);
        }

        return response()->json([
            'itemCart' => view('user.items.cartItem', ['cartItem' => $cartItem])->render(),
            'cartTotal' => count(Cart::content()),
            'subTotal' => '$' . Cart::subtotal(),
            'rowId' => $cartItem->rowId,
            'qty' => $cartItem->qty,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Cart::remove($id);

        return response()->json([
            'subTotal' => Cart::subtotal(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Cart::update($id, $request->qty);

        return response()->json([
            'total' => $item->price * $item->qty,
            'subTotal' => Cart::subtotal(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Cart::destroy();

        return redirect()->route('home.index');
    }
}
