<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'parent_id',
        'position',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Recursive categories.
     */
    public static function recursive($categories, $parentId = 0, $indent = '', $options = [])
    {
        foreach ($categories as $key => $category) {
            if ($category->parent_id === $parentId) {
                $options[$category->position]['id'] = $indent . $category->id;
                $options[$category->position]['name'] = $indent . $category->name;
                $options[$category->position]['parent_id'] = $indent . $category->parent_id;

                $categories->pull($key);

                $options = static::recursive($categories, $category->id, $indent, $options);
            }
        }
        return $options;
    }

    /**
     * Get recursive all categories.
     */
    public static function getRecursiveCategoriesOptions()
    {
        $categories = Category::orderBy('position', 'ASC')->get();

        $options = static::recursive($categories);

        // $options = static::buildTree($options);

        return $options;
    }

    public static function buildTree($elements, $parentId = 0) 
    {
        $branch = [];

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = static::buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[$element['id']] = $element;

                unset($elements[$element['id']]);
            }
        }
        return $branch;
    }

    public static function saveData($categories, $parentId = 0, $options = []) 
    {
        foreach ($categories as $key => $val) {
            array_push($options, $val['id']);

            $category = new Category;
            if ($val['id'] != 0) {
                $category = Category::find($val['id']);
            }
            $category->name = $val['name'];
            $category->parent_id = $parentId;
            $category->position = count($options);

            $category->save();
            
            if (!empty($val['children'])) {
                $options = static::saveData($val['children'], $val['id'] != 0 ? $val['id'] : $category->id, $options);
            }
        }
        return $options;
    }
}
