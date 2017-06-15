@extends('user.layouts.applayout')
@push('scripts')
    {{ Html::script('js/user/cartcontent.js') }}
@endpush
@section('content')
    {{--{{ dd((int)str_replace(',', '',$subTotal)) }}--}}
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
                <div class="cart wow">
                    <div class="page-title">
                        <h2>{{ trans('user/label.shopping_cart') }}</h2>
                    </div>
                    <div class="table-responsive">
                        {{--<form method="post" action="#updatePost/">--}}
                            <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
                            <fieldset>
                                <table class="data-table cart-table" id="shopping-cart-table">
                                    <colgroup>
                                        <col width="1">
                                        <col>
                                        <col width="1">
                                        <col width="1">
                                        <col width="1">
                                        <col width="1">
                                        <col width="1">
                                    </colgroup>
                                    <thead>
                                    <tr class="first last">
                                        <th rowspan="1">&nbsp;</th>
                                        <th rowspan="1"><span class="nobr">{{ trans('user/label.product_name') }}</span></th>
                                        <th rowspan="1"></th>
                                        <th colspan="1" class="a-center"><span class="nobr">{{ trans('user/label.unit_price') }}</span></th>
                                        <th class="a-center" rowspan="1">{{ trans('user/label.qty') }}</th>
                                        <th colspan="1" class="a-center">{{ trans('user/label.subtotal') }}</th>
                                        <th class="a-center" rowspan="1">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr class="first last">
                                        <td class="a-right last" colspan="50">
                                            <button onclick="setLocation('#')" class="button btn-continue" title="Continue Shopping" type="button">
                                                <span><span>{{ trans('user/label.continue_shopping') }}</span></span>
                                            </button>
                                            {{--<button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit">
                                                <span><span>{{ trans('user/label.update_cart') }}</span></span>
                                            </button>--}}
                                            {!! Form::open(['action' => 'User\CartController@destroy', 'method' => 'GET']) !!}
                                            <button id="empty_cart_button" class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="submit">
                                                <span><span>{{ trans('user/label.clear_cart') }}</span></span>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    </tfoot>
                                    <tbody id="cartContent">
                                    @foreach($cartItem as $item)
                                        <tr class="first odd cartItem">
                                            <td class="image"><a class="product-image" title="Sample Product" href="#/women-s-crepe-printed-black/">
                                                <img width="75" alt="Sample Product" src="{{ $item->options->url }}"></a>
                                            </td>
                                            <td><h2 class="product-name"> <a href="#/women-s-crepe-printed-black/">{{ $item->name }}</a> </h2></td>

                                            <td class="a-center">
                                                <a title="Edit item parameters" class="edit-bnt">
                                                </a>
                                            </td>
                                            <td class="a-right"><span class="cart-price"> <span class="price">${{ $item->price }}.00</span> </span></td>
                                            <td class="a-center movewishlist">
                                                {!! Form::open(['action' => ['User\CartController@update', $item->rowId], 'method' => 'PUT', 'class' => 'formEdit']) !!}
                                                    <input maxlength="12" class="input-text qty" title="Qty" size="4" value="{{ $item->qty }}" name="qty">
                                                {!! Form::close() !!}
                                            </td>
                                            <td class="a-right movewishlist"><span class="cart-price"> <span class="price total">${{ $item->price * $item->qty }}</span> </span></td>
                                            <td class="a-center last">
                                                <a class="button remove-item" title="Remove item" data-url="{{ action('User\CartController@edit', $item->rowId) }}">
                                                    <span><span>Remove item</span></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </fieldset>
                        {{--</form>--}}
                    </div>
                    <!-- BEGIN CART COLLATERALS -->
                    <div class="cart-collaterals row">
                        <div class="col-sm-4">
                            <div class="shipping">
                                <h3>Estimate Shipping and Tax</h3>
                                <div class="shipping-form">
                                    <form id="shipping-zip-form" method="post" action="#estimatePost/">
                                        <p>Enter your destination to get a shipping estimate.</p>
                                        <ul class="form-list">
                                            <li>
                                                <label class="required" for="country"><em>*</em>Provinces</label>
                                                <div class="input-box">
                                                    {!! Form::select('province', $provinces) !!}
                                                </div>
                                            </li>
                                            <li>
                                                <label for="region_id">Districts</label>
                                                <div class="input-box">
                                                    {!! Form::select('province', $districts) !!}
                                                    <input type="text" style="display:none;" class="input-text required-entry" title="State/Province" value="" name="region" id="region">
                                                </div>
                                            </li>
                                            <li>
                                                <label for="region_id">Wards</label>
                                                <div class="input-box">
                                                    {!! Form::select('province', $wards) !!}
                                                    <input type="text" style="display:none;" class="input-text required-entry" title="State/Province" value="" name="region" id="region">
                                                </div>
                                            </li>
                                            <li>
                                                <label for="postcode">Zip/Postal Code</label>
                                                <div class="input-box">
                                                    <input type="text" value="" name="estimate_postcode" id="postcode" class="input-text validate-postcode">
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="buttons-set11">
                                            <button class="button get-quote" onclick="coShippingMethodForm.submit()" title="Get a Quote" type="button"><span>Get a Quote</span></button>
                                        </div>
                                        <!--buttons-set11-->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="discount">
                                <h3>Discount Codes</h3>
                                <form method="post" action="#couponPost/" id="discount-coupon-form">
                                    <label for="coupon_code">Enter your coupon code if you have one.</label>
                                    <input type="hidden" value="0" id="remove-coupone" name="remove">
                                    <input type="text" value="" name="coupon_code" id="coupon_code" class="input-text fullwidth">
                                    <button value="Apply Coupon" onclick="discountForm.submit(false)" class="button coupon " title="Apply Coupon" type="button"><span>Apply Coupon</span></button>
                                </form>
                            </div>
                        </div>
                        <div class="totals col-sm-4">
                            <h3>Shopping Cart Total</h3>
                            <div class="inner">
                                <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                                    <colgroup>
                                        <col>
                                        <col width="1">
                                    </colgroup>
                                    <tfoot>
                                    <tr>
                                        <td colspan="1" class="a-left" style=""><strong>Grand Total</strong></td>
                                        <td class="a-right" style=""><strong><span class="price grandTotal">${{ $subTotal }}</span></strong></td>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                        <td colspan="1" class="a-left" style=""> Subtotal </td>
                                        <td class="a-right" style=""><span class="price subTotal">${{ $subTotal }}</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <ul class="checkout">
                                    <li>

                                            {{--{!! Form::open(['action' => ['User\PaymentController@store']]) !!}
                                            {!! Form::hidden('amount', (int)str_replace(',', '',$subTotal)) !!}--}}

                                            {!! Form::open(['action' => ['BillController@submit_payment']]) !!}
                                            <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="submit">
                                                <span>Proceed to Checkout</span>
                                            </button>
                                            {!! Form::close() !!}

                                    </li>
                                    <br>
                                    <li>
                                        <a title="Checkout with Multiple Addresses" href="multiple_addresses.html">Checkout with Multiple Addresses</a>
                                    </li>
                                    <br>
                                </ul>
                            </div>
                            <!--inner-->

                        </div>
                    </div>

                    <!--cart-collaterals-->

                </div>

            </div>
        </div>
    </section>
@endsection
