<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\RatingRequest;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{

    /**
     * Hàm này để rate một sản phẩm:
     * - Nếu chưa đăng nhập không cho rate
     * - Nếu đăng nhập rồi và rate lần đầu thì lưu, nếu có rồi thì update
     * @param Request $request
     * @return string
     */
    public function store(RatingRequest $request)
    {
        Rating::updateOrCreate(['product_id' => $request->product_id, 'customer_id' => $request->customer_id],
            ['score' => $request->score]);

        $score = Rating::avgScore($request->product_id);

        Product::updateScore($request->product_id, $score);

        return trans('user/label.rate_success');
    }
}
