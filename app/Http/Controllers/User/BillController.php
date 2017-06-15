<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Bill;
use App\Models\BillDetail;
use App\MyHelpers\nganluong;
use App\MyHelpers\BaoKimPayment;
use App\Jobs\SendOrderEmail;
use Auth;
use Cart;
use DB;
use Carbon\Carbon;
use Mail;
use App\Mail\OrderCustomer;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.web.shopingCart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request)
    {
        $id = $request->id;
        $quality = $request->sl;
        $item = Item::find($id);
        Cart::add($id, $item->name, $quality, $item->price, ['image' => $item->avatar]);

        return response()->json([$item->name, Cart::content()->count()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

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
        $sl = abs($request->sl);
        Cart::update($id, $sl);
        $item = Cart::get($id);
        return response()->json([number_format($item->qty * $item->price), Cart::Subtotal(0)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return Cart::Subtotal();
    }

    public function submit_payment(Request $request)
    {
            $receiver='demo@nganluong.vn';
            //Mã đơn hàng
            $order_code='NL_'.time().uniqid();
            //Khai báo url trả về
            $return_url= action('User\BillController@success_nl');
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

    public function store_bill($payment_name, $order_code, $status_payment)
    {
        $bill = Bill::create([
            'user_id' => Auth::id(),
            'payment' =>  $payment_name,
            'total' => Cart::subtotal(2, '.', ''),
            'status_payment' => $status_payment,
            'code_bill' => $order_code,
            'status_ship' => 0
        ]);
        foreach (Cart::content() as $item) {
            BillDetail::create([
                'bill_id' => $bill->id,
                'item_id' => $item->id,
                'quality' => $item->qty,
                'price' => $item->price,
                'total' => number_format($item->qty*$item->price, 2, '.', ''),
            ]);
        }
        Cart::destroy();
        /* Mail::to(Auth::user()->email)->send(new OrderCustomer($bill));*/
        /*$job = (new SendOrderEmail($bill, Auth::user()->email))
                    ->delay(Carbon::now()->addSeconds(3));
        dispatch($job);*/
        return redirect()->action('BillController@index')->with('status', 'Đặt hàng thành công');
    }
}
