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
                                {{-- {!! Form::select('province', $provinces) !!} --}}
                            </div>
                        </li>
                        <li>
                            <label for="region_id">Districts</label>
                            <div class="input-box">
                                {{-- {!! Form::select('province', $districts) !!} --}}
                                <input type="text" style="display:none;" class="input-text required-entry" title="State/Province" value="" name="region" id="region">
                            </div>
                        </li>
                        <li>
                            <label for="region_id">Wards</label>
                            <div class="input-box">
                                {{-- {!! Form::select('province', $wards) !!} --}}
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
                </tfoot>
                <tbody>
                    <tr>
                        <td colspan="1" class="a-left" style=""> Subtotal </td>
                        <td class="a-right" style=""><span class="price subTotal">{{ '$'. number_format(Cart::subtotal()) }}</span></td>
                    </tr>
                </tbody>
            </table>
            <ul class="checkout">
                <li>
                    {{--{!! Form::open(['action' => ['Customer\PaymentController@store']]) !!}
                    {!! Form::hidden('amount', (int)str_replace(',', '',$subTotal)) !!}--}}
                    {{--    {!! Form::open(['action' => ['BillController@submit_payment']]) !!} --}}
                    <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="submit">
                    <span>Proceed to Checkout</span>
                    </button>
                    {{-- {!! Form::close() !!} --}}
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