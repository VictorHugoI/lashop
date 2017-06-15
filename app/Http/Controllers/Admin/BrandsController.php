<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\Admin\BrandRequest;
use DB;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        $renderData = compact('brands');

        return view('admin.brands.index', $renderData);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $brand = new Brand;

        $brand::create($request->all());

        return redirect()->route('admin.brands.index')
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
        $brand = Brand::findOrFail($id);

        $renderData = compact('brand');

        return view('admin.brands.edit', $renderData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        Brand::findOrFail($id)->update($request->all());

        return redirect()->route('admin.brands.index')
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
            $brand = Brand::findOrFail($id);
            $brand->products()->delete();
            $brand->delete();

            DB::commit();

            return redirect()->route('admin.brands.index')
                ->with('success', trans('admin/message.delete_success'));
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('admin.brands.index')
                ->with('failure', trans('admin/message.delete_failure'));
        }
    }
}
