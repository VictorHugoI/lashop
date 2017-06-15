<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'subtotal',
        'address',
        'phone',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
            ->withPivot('product_name', 'qty', 'total', 'detail_pro');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
