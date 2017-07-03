<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\CategoryProperty;
use App\Models\Product;
use App\Models\ProductProperty;
use App\Models\Property;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->category == null) {
            $products = Product::all();

            return view('admin.products.index', compact('products'));
        } else {
            if ($request->brand_id == 0) {
                $categories = Category::getChildrenByParentId($request->category);
                $products = Product::whereIn('category_id', array_keys($categories))->get();

                $brands = $products->pluck('brand', 'brand_id')->filter()->pluck('name', 'id')->toArray();

                return response()->json([
                    'view' => view('admin.products.component.itemProduct', compact('products'))->render(),
                    'select' => view('admin.products.component.selectBrand', compact('brands'))->render(),
                ]);
            } else {
                $categories = Category::getChildrenByParentId($request->category);
                $products = Product::whereIn('category_id', array_keys($categories))->where('brand_id', $request->brand_id)->get();

                //$brands = $products->pluck('brand', 'brand_id')->filter()->pluck('name', 'id')->toArray();

                return response()->json([
                    'view' => view('admin.products.component.itemProduct', compact('products'))->render(),
                    //'select' => view('admin.products.component.selectBrand', compact('brands'))->render(),
                ]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::getLastChildByParentId(1);

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        DB::beginTransaction();

        try {
            $file = $request->file('image')->storePublicly('assets/images/products-images');
            $url = str_replace('assets/images/products-images/', '', $file);
            $data = $request->all();
            $data['image'] = $url;

            $product = Product::create($data);

            DB::commit();

            return redirect()->route('product.addProperties', ['id' => $product->id]);
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->route('property.create')
                ->with('failure', 'that bai!');
        }
    }

    public function saveProperties(Request $request)
    {
        DB::beginTransaction();

        try {
            $categoryProperty = CategoryProperty::where('category_id', $request->category_id)->pluck('property_id');
            $properties = Property::whereIn('id', $categoryProperty)->get();

            foreach ($properties as $property) {
                $propertyName = $property->name;
                if ($request->$propertyName != null) {
                    ProductProperty::create([
                        'product_id' => $request->product_id,
                        'property_id' => (Property::where('name', $propertyName)->first())->id,
                        'value' => $request->$propertyName,
                    ]);
                }
            }
            DB::commit();

            return redirect()->route('product.index');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()
                ->with('failure', 'that bai!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getBottomCategory($firstCategoryId)
    {
        $categories = Category::getLastChildByParentId($firstCategoryId);

        return response()->json([
            'select' => view(
                'admin.products.component.selectBottomCategories',
                compact('categories')
            )->render(),
        ]);
    }

    public function getProperty($categoryId)
    {
        $categoryProperty = CategoryProperty::where('category_id', $categoryId)->pluck('property_id');
        $properties = Property::whereIn('id', $categoryProperty)->get();

        return response()->json([
            'properties' => view(
                'admin.products.component.propertiesProduct',
                compact('properties')
            )->render(),
        ]);
    }

    public function addProperties($id)
    {
        $product = Product::findOrFail($id);
        $firstcategory = Category::getFirstCategory($product->category_id);
        $bottomCategories = Category::getLastChildByParentId($firstcategory->id);
        $categoryProperty = CategoryProperty::where('category_id', $product->category_id)->pluck('property_id');
        $properties = Property::whereIn('id', $categoryProperty)->get();

        return view('admin.products.add_property', compact(
            'firstcategory',
            'properties',
            'product',
            'bottomCategories'
        ));
    }

    public function search(Request $request)
    {
        if ($request->product_name != '' && $request->category == 0 && $request->brand_id == 0) {
            $productName = trim(addcslashes($request->product_name, '!, %, _'));

            $products = Product::where('name', 'LIKE', '%' . $productName . '%')->take(6)->get();
            $number = Product::where('name', 'LIKE', '%' . $productName . '%')->count();

            return response()->json([
                'view' => view('admin.products.item.searchResult', compact('products', 'number'))->render(),
            ]);
        } elseif ($request->product_name != '') {

        }
    }
}
