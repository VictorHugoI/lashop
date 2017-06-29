<?php
namespace App\Support;

use Session;
use App\Models\Product;

class CartManager
{
    const KEY = 'cart';

    protected static function getCart()
    {
        return Session::get(self::KEY, []);
    }

    public function add($id, $name, $price, $image, $options = [])
    {
        $cart = self::getCart();
        if (!isset($cart[$id])) {
            $cart[$id] = [
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'qty' => 0,
                'options' => $options,
            ];
        }
        
        $cart[$id]['qty']++;
        Session::put(self::KEY, $cart);

        return $cart[$id];
    }

    public function destroy()
    {
        Session::forget(self::KEY);
    }

    public function remove($id)
    {
        $cart = self::getCart();
        unset($cart[$id]);
        Session::put(self::KEY, $cart);
    }
    
    public function update($id, $qty)
    {
        $cart = self::getCart();
        if (isset($cart[$id])) {
            $cart[$id]['qty'] = $qty;
            Session::put(self::KEY, $cart);

            return $cart[$id];
        }
    }

    public function subtotal()
    {
        $total = 0;
        $cart = self::getCart();
        foreach ($cart as $item) {
            $total += $item['qty'] * $item['price'];
        }

        return $total;
    }

    public function content()
    {
        return self::getCart();
    }
}
