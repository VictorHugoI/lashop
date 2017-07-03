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
        'price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class)->withPivot(['value']);
    }

    public function getProperty($name)
    {
        return $this->properties->first(function ($property) use ($name) {
            return $property->name === $name;
        });
    }

    public function getPropertyValue($name)
    {
        // return $this->getProperty($name)->pivot->value;
        // TODO check exist property before get value
    }

    public function getPropertyUnit($name)
    {
        // return $this->getProperty($name)->pivot->unit;
        // TODO: get unit from category_property => config
    }

    public function getAttribute($key)
    {
        $prefix = 'prop_';
        if (substr($key, 0, strlen($prefix)) === $prefix) {
            return $this->getPropertyValue(substr($key, strlen($prefix)));
        }

        $prefix = 'unit_';
        if (substr($key, 0, strlen($prefix)) === $prefix) {
            return $this->getPropertyUnit(substr($key, strlen($prefix)));
        }

        return parent::getAttribute($key);
    }

    public function getImageAttribute($image)
    {
        return config('common.path.product-image') . $image;
    }
}
