<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyHelpers\nganluong;

class NganLuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $receiver='demo@nganluong.vn';
        //Mã đơn hàng
        $order_code='NL_'.time().uniqid();
        //Khai báo url trả về
        $return_url= action('BillController@success_nl');
        //Thông tin giao dịch
        $transaction_info="Thong tin giao dich";
        $price = Cart::subtotal(2, '.', '');
        //Khai báo đối tượng của lớp NL_Checkout
        $nl = new nganluong();
        $nl->nganluong_url = NGANLUONG_URL;
        $nl->merchant_site_code = MERCHANT_ID;
        $nl->secure_pass = MERCHANT_PASS;
        $url= $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $price);
        return redirect($url);
    }

    public function submit_payment(Request $request)
    {
            $receiver='demo@nganluong.vn';
            //Mã đơn hàng
            $order_code='NL_'.time().uniqid();
            //Khai báo url trả về
            $return_url= action('BillController@success_nl');
            //Thông tin giao dịch
            $transaction_info="Thong tin giao dich";
            $price = Cart::subtotal(2, '.', '');
            //Khai báo đối tượng của lớp NL_Checkout
            $nl = new nganluong();
            $nl->nganluong_url = NGANLUONG_URL;
            $nl->merchant_site_code = MERCHANT_ID;
            $nl->secure_pass = MERCHANT_PASS;
            $url= $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $price);
            return redirect($url);
    }

    public function success_nl(Request $request, nganluong $nl)
    {
        if (isset($request->payment_id)) {
            // Lấy các tham số để chuyển sang Ngânlượng thanh toán:
            $transaction_info = $request->transaction_info;
            $order_code = $request->order_code;
            $price = $request->price;
            $payment_id = $request->payment_id;
            $payment_type = $request->payment_type;
            $error_text = $request->error_text;
            $secure_code = $request->secure_code;
            //Khai báo đối tượng của lớp NL_Checkout
            $nl->merchant_site_code = MERCHANT_ID;
            $nl->secure_pass = MERCHANT_PASS;
            //Tạo link thanh toán đến nganluong.vn
            $checkpay = $nl->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code);

            if ($checkpay) {
                return redirect()->action('BillController@store_bill', ['nganluong', $order_code, 1]);
            } else {
                return redirect()->action('BillController@index')->with('status_error', 'Có lỗi khi đặt hàng, bạn vui lòng đặt hàng lại');
            }
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
