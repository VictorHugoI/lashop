<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\CategoryProperty;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::getAllCategoriesOption();

        return view('admin.categoryProperty.add_property_category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $properties = Property::all();
        $chosenProperties = Category::find($id)->categoryProperties;
        $filterProperties = $chosenProperties->where('is_filter', 1);

        return response()->json([
            'view' => view(
                'admin.categoryProperty.component.table_property',
                compact('properties', 'chosenProperties', 'id', 'filterProperties')
            )->render(),
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function isProperty(Request $request)
    {
        Category::find($request->category_id)
            ->properties()->toggle(Property::find($request->property_id));

        $cateProperty = CategoryProperty::where('category_id', $request->category_id)
            ->where('property_id', $request->property_id);

        if ($cateProperty->count() != 0) {
            $cateProperty->update(['unit' => $request->measure_unit]);
        }
    }

    public function isFilter(Request $request)
    {
        $cateProperty = CategoryProperty::where('category_id', $request->category_id)
            ->where('property_id', $request->property_id);

        if($cateProperty->first()->is_filter) {
            $cateProperty->update(['is_filter' => null]);
        } else {
            $cateProperty->update(['is_filter' => 1]);
        }

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
}
