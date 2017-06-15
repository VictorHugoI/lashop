<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
        'url',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parentcategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function getUrlAttribute($value)
    {
        return config('common.storage.category') . $value;
    }

    /**
     * Recursive categories.
     *
     */
    public static function recursive($categories, $parentId = 0, $indent = '', $options = [])
    {
        foreach ($categories as $key => $category) {
            if ($category->parent_id === $parentId) {
                $options[$category->id] = $indent . $category->name;
                $categories->pull($key);
                $options = static::recursive($categories, $category->id, $indent . '--', $options);
            }
        }
        return $options;
    }
    /**
     * Get recursive all categories.
     *
     */
    public static function getRecursiveCategoriesOptions()
    {
        $categories = Category::all(['id', 'parent_id', 'name']);
        $options = static::recursive($categories);
        return $options;
    }
}
