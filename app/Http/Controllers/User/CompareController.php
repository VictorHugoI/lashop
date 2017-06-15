<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use function Sodium\compare;

class CompareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product1 = Product::find(Session::get('compare1'));
        $product2 = Product::find(Session::get('compare2'));

        return view('user.compare', compact('product1', 'product2'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::forget('compare1');
        Session::forget('compare2');

        return trans('user/label.destroy_compare');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $i
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Session::get('compare1')) {
            Session::put('compare1', $id);

            return response()->json(['mess' => trans('user/label.need_add'),
                'status' => '1',
                'name' => Product::find($id)->name,
                'view' => view('user.items.compareItem1', ['product1' => Product::find(Session::get('compare1'))])->render(),
            ]);
        }
        if (Session::get('compare1') && !Session::get('compare2')) {
            if (Session::get('compare1') == $id) {
                return response()->json(['mess' => trans('user/label.chose_dif_product')]);
            } else {
                Session::put('compare2', $id);

                return response()->json(['mess' => trans('user/label.can_compare'),
                    'status' => '2',
                    'name' => Product::find($id)->name,
                    'view' => view('user.items.compareItem2', ['product2' => Product::find(Session::get('compare2'))])->render(),
                ]);
            }
        }
        if (Session::has('compare1') && Session::has('compare2')) {
            return response()->json(['mess' => trans('user/label.have_two_product'), 'status' => '3']);
        }
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
    public function destroy()
    {

    }
}
