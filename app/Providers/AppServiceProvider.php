<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categoriesMenu = Category::createMenuCategory();
        View::share('categoriesMenu', $categoriesMenu);

        $categories = Category::getAllCategoriesOption();
        View::share('categories', $categories);

        $firstCategories = Category::where('parent_id', 0)->pluck('name', 'id');
        View::share('firstCategories', $firstCategories);

        $brands = Brand::pluck('name', 'id');
        View::share('brands', $brands);

        $measure = config('common.measure');
        View::share('measure', $measure);

        $dataType = config('common.data_type');
        View::share('dataType', $dataType);

        $categoriesMenu = Category::createMenuCategory();
        View::share('categoriesMenu', $categoriesMenu);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
