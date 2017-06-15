<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::find($id);
        $product1 = Product::find(Session::get('compare1'));
        $product2 = Product::find(Session::get('compare2'));

        if ($category->parent_id == Null) {
            $subCategories = $category->subcategories()->get()->pluck('id');

            $products = Product::getByParentCate($subCategories)
                ->paginate(config('common.number.paginate_category'));
        } else {
            $products = Product::getByChildCate($id)
                ->paginate(config('common.number.paginate_category'));
        }

        return view('user.category_product', compact('products', 'category', 'product1', 'product2'));
    }
}
