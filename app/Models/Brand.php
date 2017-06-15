<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'founded_year',
        'description',
        'url',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getUrlAttribute($value)
    {
        return config('common.storage.brand') . $value;
    }

    public function getUrlFooterAttribute($value)
    {
        return config('common.storage.brand') . $value;
    }
}
