<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'product_id',
        'customer_id',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeGetRateByCustomer($query, $product_id, $customer_id)
    {
        return $query->where(['product_id' => $product_id, 'customer_id' => $customer_id]);
    }

    public static function avgScore($product_id)
    {
        return self::where('product_id', $product_id)->avg('score');
    }

    public function scopeScoreByCustomer($query, $customer_id, $product_id)
    {
        return $query->getRateByCustomer($product_id, $customer_id)->get();
    }
}
