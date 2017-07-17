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

        if (Category::getLastChildByParentId($id)) {
            $products = Product::whereIn('category_id', array_keys(Category::getLastChildByParentId($id)))->paginate(12);
        } else {
            $products = Product::where('category_id', $id)->paginate(12);
        }
        return view('customers.category_product.index', compact('id', 'cates', 'products'));
    }
}
