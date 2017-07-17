<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Cart;
use App\Models\Order;
use Auth;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Http\Requests\OrderRequest;
use Carbon\Carbon;
use App\Jobs\SendMail;

class BillingController extends Controller
{
    /**
     * @param OrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderRequest $request)
    {
        $province = Province::find($request->provinces)->name;
        $district = District::find($request->districts)->name;
        $ward = Ward::find($request->wards)->name;
        $address = $province . ',' . $district . ',' . $ward;
        Order::create([
            'user_id' => Auth::id(),
            'address' => $address,
            'phone' => $request->phone,
            'note' => $request->note,
        ]);
        Cart::destroy();
//         $job = (new SendMail($request->email))->delay(Carbon::now()->addSeconds(5));
//         dispatch($job);
        //     $info = Cart::content();
        //     Mail::send('welcome', [], function ($message) {
        //     $message->from('lashop1221@gmail.com')->subject('Orders');
        //     $message->to('andrantran@gmail.com');
        // });
        // Mail::to('andrantran@gmail.com')->send(new SendMail);
        // $when = Carbon::now()->addMinutes(5);
        // Mail::to('andrantran@gmail.com')->later($when, new SendMail);
        return redirect()->route('home');
    }
}
