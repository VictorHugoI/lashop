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

    public function categoryProperties()
    {
        return $this->hasMany(CategoryProperty::class);
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'category_property', 'category_id', 'property_id');
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

    public static function getAllCategories($categories, $parentId = 0, $indent = '', $options = [])
    {
        foreach ($categories as $key => $category) {
            if ($category->parent_id === $parentId) {
                $options[$category->id] = $indent . $category->name;
                $categories->pull($key);
                $options = static::getAllCategories($categories, $category->id, $indent . '--', $options);
            }
        }
        return $options;
    }

    /**
     * Get recursive all categories.
     *
     */
    public static function getAllCategoriesOption()
    {
        $categories = Category::all(['id', 'parent_id', 'name']);
        $options = static::getAllCategories($categories);
        return $options;
    }

    public static function getFirstCategory($childId)
    {
        $parentId = self::find($childId);

        if ($parentId->parent_id != 0) {
            $parentId = static::getFirstCategory($parentId->parent_id);
        }

        return $parentId;
    }


    public static function recursiveCategoriesKeyId($categories, $parentId = 0, $level = 0, $options = [])
    {
        foreach ($categories as $key => $category) {
            if ($category->parent_id === $parentId) {
                $options[$category->id]['id'] = $category->id;
                $options[$category->id]['name'] = $category->name;
                $options[$category->id]['parent_id'] = $category->parent_id;
                $options[$category->id]['level'] = $level;
                $categories->pull($key);
                $options = static::recursiveCategoriesKeyId($categories, $category->id, $level + 1, $options);
            }
        }
        return $options;
    }


    ///////////////////////////////// Hai hàm này lấy ra tất cả cha theo con hiện tại //////////////////////////////////
    public static function recursiveParentCategoriesById($categories, $id, $options = [])
    {
        foreach ($categories as $key => $category) {
            if ($category['id'] == $id) {
                $options[$category['id']] = $category['name'];
                $options = static::recursiveParentCategoriesById($categories, $category['parent_id'], $options);

                unset($categories[$id]);
            }
        }
        return $options;
    }

    public static function getAllParentCategoriesById($id)
    {
        $categories = Category::orderBy('position', 'ASC')->get();

        $options = static::recursiveCategoriesKeyId($categories);

        return static::recursiveParentCategoriesById($options, $id);
    }

    //////////////////////////////// Lấy ra tất cả con theo cha hiện tại ////////////////////////////////////////////
    public static function recursiveChildCategoriesByParentId($categories, $currentId, $parentId = false, $options = [])
    {
        foreach ($categories as $category) {
            if ((!$parentId && $category['id'] == $currentId) || $category['parent_id'] == $currentId) {
                $options[$category['id']]['id'] = $category['id'];
                $options[$category['id']]['name'] = $category['name'];
                $options[$category['id']]['parent_id'] = $category['parent_id'];

                unset($categories[$category['id']]);

                if ($category['parent_id'] == $currentId) {
                    $options = static::recursiveChildCategoriesByParentId($categories, $category['id'], true, $options);
                }
            }
        }
        return $options;
    }

    public static function getChildrenByParentId($parentId)
    {
        $categories = Category::orderBy('position', 'ASC')->get();

        $options = static::recursiveCategoriesKeyId($categories);

        return static::recursiveChildCategoriesByParentId($options, $parentId);
    }

    //////////////////////////////// Lấy ra tất cả con cấp thấp nhất /////////////////////////
    public static function recursiveLastChildCategories($categories, $options = [])
    {
        foreach ($categories as $key => $category) {
            if (!empty($category['children'])) {
                $options = static::recursiveLastChildCategories($category['children'], $options);
            } else {
                $options[$category['id']] = $category['name'];
            }
        }
        return $options;
    }

    public static function getAllLastChildCategories()
    {
        $categories = Category::all();
        $options = static::recursiveCategoriesKeyId($categories);
        $options = static::buildTree($options);

        return static::recursiveLastChildCategories($options);
    }

    /////////////////////////////// Lấy ra tất cả con cấp thấp nhất tại một category hiện tại /////////////////////////
    public static function getLastChildByParentId($parentId)
    {
        $options = static::getChildrenByParentId($parentId);

        $options = static::buildTree($options, $parentId);

        return static::recursiveLastChildCategories($options);
    }

    public static function createMenuCategory()
    {
        $categories = Category::orderBy('position', 'ASC')->get();

        $options = static::recursiveCategoriesKeyId($categories);

        return static::buildTree($options);
    }
}
