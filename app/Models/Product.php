<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'brand_id',
        'category_id',
        'description',
        'volume',
        'price',
        'price_sale',
        'sale_detail',
        'vintage',
        'age',
        'country',
        'alcohol',
        'material',
        'url',
        'score',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')
            ->withPivot('product_name', 'qty', 'total', 'detail_pro');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function getUrlAttribute($value)
    {
        return config('common.storage.product') . $value;
    }

    public function getScoreAttribute($value)
    {
        return $value * 20;
    }

    public function getPriceAttribute($value)
    {
        return '$' . $value . '.00';
    }

    public function getPriceSaleAttribute($value)
    {
        if($value !== NULL)
        {
            return '$' . $value . '.00';
        }

        return $value;
    }

    public function getVolumeAttribute($value)
    {
        return $value . ' ml';
    }

    public function scopeBestSeller($query)
    {
        return $query->take(config('common.number.bestseller'))->get();
    }

    public function scopeLatestProduct($query)
    {
        return $query->orderBy('created_at')->take(config('common.number.latest_product'))->get();
    }

    public function scopeOldProduct($query)
    {
        return $query->where('age', '>', config('common.number.age_old_product'))
            ->take(config('common.number.old_product'))->get();
    }

    public function scopeGetByParentCate($query, $subCategories)
    {
        return $query->whereIn('category_id', $subCategories);
    }

    public function scopeGetByChildCate($query, $id)
    {
        return $query->where('category_id', $id);
    }

    public function scopeUpdateScore($query, $product_id, $score)
    {
        return $query->find($product_id)->update(['score' => $score]);
    }

    public function scopeFindName($query, $productName)
    {
        return $query->where('name', "LIKE", "%" . $productName . "%");
    }

    public function scopeFindByBrand($query, $brandId)
    {
        return $query->where('brand_id', $brandId);
    }

    public function checkWishList($user_id)
    {
        return $this->wishlists()->where('user_id', '=', $user_id)->get();
    }
}
