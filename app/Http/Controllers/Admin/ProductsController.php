<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Picture;
use App\Http\Requests\Admin\ProductRequest;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(config('setup.default_pagination_limit'));

        $renderData = compact('products');

        return view('admin.products.index', $renderData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::getRecursiveCategoriesOptions();
        $brands = Brand::pluck('name', 'id');
        
        $renderData = compact('categories', 'brands');

        return view('admin.products.create', $renderData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $product = Product::create($request->all());

            foreach ($request->input('images', []) as $image) {
                if (empty($image)) {
                    continue;
                }
                $picture = new Picture;

                $picture->url = $image;

                $product->pictures()->save($picture);
            }

            DB::commit();

            return redirect()->route('admin.products.index')
                ->with('success', trans('admin/message.create_success'));
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('admin.products.index')
                ->with('failure', trans('admin/message.create_failure'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $pictures = $product->pictures;
        $categories = Category::getRecursiveCategoriesOptions();
        $brands = Brand::pluck('name', 'id');
        // $product = $product->getOriginal();

        $renderData = compact('product', 'pictures', 'categories', 'brands');

        return view('admin.products.edit', $renderData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            Product::findOrFail($id)->update($request->all());

            $product = Product::findOrFail($id);

            $idPicturesOld = $product->pictures()->pluck('id');

            $count = 0;
            foreach ($request->input('images', []) as $image) {
                if (empty($image)) {
                    continue;
                }
                if ($count < count($idPicturesOld)) {
                    $picture = Picture::findOrFail($idPicturesOld[$count]);

                    $picture->url = $image;

                    $product->pictures()->save($picture);
                } else {
                    $picture = new Picture;

                    $picture->url = $image;

                    $product->pictures()->save($picture);
                }
                $count ++;
            }

            for ($i = $count; $i < count($idPicturesOld); $i++) {
                $pictureDelete = Picture::findOrFail($idPicturesOld[$count]);
                $pictureDelete->delete();
                $count ++;
            }

            DB::commit();

            return redirect()->route('admin.products.index')
                ->with('success', trans('admin/message.create_success'));
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('admin.products.index')
                ->with('failure', trans('admin/message.create_failure'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            $product->pictures()->delete();
            $product->delete();

            DB::commit();

            return redirect()->route('admin.products.index')
                ->with('success', trans('admin/message.delete_success'));
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('admin.products.index')
                ->with('failure', trans('admin/message.delete_failure'));
        }
    }
}
