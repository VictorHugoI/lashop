<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function show($id)
    {
        $cates = Category::getAllParentCategoriesById($id);


        $categoriesId = Category::getLastChildByParentId($id) ?
            array_keys(Category::getLastChildByParentId($id)) : [$id];
        $sumproduct = Product::whereIn('category_id', $categoriesId)->get();
        $products = Product::whereIn('category_id', $categoriesId)->paginate(12);

        $brands = Brand::whereIn('id', Product::whereIn('category_id', $categoriesId)
            ->pluck('brand_id')->unique())->get();

        return view('customers.category_product.index', compact('id', 'cates', 'products', 'brands', 'sumproduct'));
    }
}
