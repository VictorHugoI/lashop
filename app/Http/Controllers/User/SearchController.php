<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = addcslashes($request->search, '!, %, _');

        if($request->brandId == 0) {
            $result = Product::findName($search)->take(6)->get();
            $qty = count(Product::findName($search)->get());

            return response()->json([
                'itemSearch' => view('user.items.searchItem', ['result' => $result, 'qty' => $qty])->render(),
            ]);
        } else {
            $result = Product::findByBrand($request->brandId)->findName($search)->take(6)->get();
            $qty = count(Product::findByBrand($request->brandId)->findName($search)->get());

            return response()->json([
                'itemSearch' => view('user.items.searchItem', ['result' => $result, 'qty' => $qty])->render(),
            ]);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
