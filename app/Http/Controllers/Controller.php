<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $categoriesMenu = Category::createMenuCategory();
        View::share('categoriesMenu', $categoriesMenu);

        $categories = Category::getAllCategoriesOption();
        View::share('categories', $categories);

        $firstCategories = Category::where('parent_id', 0)->pluck('name', 'id');
        View::share('firstCategories', $firstCategories);

        $brands = Brand::pluck('name', 'id')->toArray();
        View::share('brands', $brands);

        $measure = config('common.measure');
        View::share('measure', $measure);

        $dataType = config('common.data_type');
        View::share('dataType', $dataType);
    }
}
