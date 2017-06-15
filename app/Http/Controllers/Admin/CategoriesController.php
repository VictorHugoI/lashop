<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Admin\CategoryRequest;
use DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        
        $renderData = compact('categories');

        return view('admin.categories.index', $renderData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::getRecursiveCategoriesOptions();

        $renderData = compact('categories');

        return view('admin.categories.create', $renderData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', trans('admin/message.create_success'));
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
        $category = Category::find($id);

        $categories = Category::getRecursiveCategoriesOptions();

        $renderData = compact('categories', 'category');

        return view('admin.categories.edit', $renderData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        Category::findOrFail($id)->update($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', trans('admin/message.update_success'));
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
            $category = Category::findOrFail($id);
            $category->products()->delete();
            $category->delete();

            DB::commit();

            return redirect()->route('admin.categories.index')
                ->with('success', trans('admin/message.delete_success'));
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('admin.categories.index')
                ->with('failure', trans('admin/message.delete_failure'));
        }
    }
}
