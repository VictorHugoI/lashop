<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductSearchController extends Controller
{

    /**
     * Display search result
     * @param Illuminate\Http\Request request
     */
    public function search(Request $request)
    {
        $keyword = strtolower($request->search);
        $keywords = array_diff(explode(' ', $keyword), ['']);

        $allCategories = array_map('strtolower', $this->allCategories);
        $brands = array_map('strtolower', $this->brands);

        if (in_array($keyword, $allCategories)) {
            $category = [$keyword];
        } else {
            $category = array_intersect($keywords, $allCategories);
        }

        $brand = array_intersect($keywords, $brands);

        $name = array_merge($category, $brand);
        if (count($brand) == 1 || count($category) == 1) {
            $categoryId = Category::whereIn('name', $name)->pluck('id')->toArray();
            $brandId = Brand::whereIn('name', $name)->pluck('id')->toArray();
            
            $products = new Product;

            if ($brandId != null) {
                $cates = Category::getAllLastChildCategories();
                $products = $products->whereIn('brand_id', $brandId);
            }
            if ($categoryId != null) {
                $id = array_shift($categoryId);
                $cates = Category::getAllParentCategoriesById($id);
                
                $products = $products->whereIn('category_id', array_keys($cates));
            }
            
            $products = $products->paginate(12);
        } else {
            $products = Product::where(function ($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $q->whereLike('name', $keyword);
                }
            })->paginate(12);
            $cates = Category::getAllLastChildCategories();
        }

        $products->appends(['search' => $keyword]);

        return view('customers.catalog', compact('id', 'cates', 'products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchList(Request $request)
    {
        if ($request->ajax()) {
            $keyword = $request->keyword;
            $categories = Category::whereLike('name', $keyword)->limit(5)->get();
            $brands = Brand::whereLike('name', $keyword)->limit(5)->get();
            $products = Product::whereLike('name', $keyword)->orderBy('created_at', 'DESC')->limit(5)->get();

            $html = view('customers.layout.sections.search-list', compact('products', 'categories', 'brands'));
            $html = (string) $html;

            return Response(['html' => $html]);
        }
    }
}
