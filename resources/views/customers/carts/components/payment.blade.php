@if (!empty(Cart::content()))
<div class="cart-collaterals row">
    <div class="col-sm-4">
        <div class="shipping">
            <h3>Estimate Shipping and Tax</h3>
            <div class="shipping-form">
                {!! Form::open(['action' => 'Customer\BillingController@store', 'method' => 'POST', 'id' => 'shipping-zip-form']) !!}
{{--                 <form id="shipping-zip-form" method="post" action="#estimatePost/"> --}}
                    <p>Enter your destination to get a shipping estimate.</p>
                    <ul class="form-list">
                        <li>
                            <label class="required" for="country">Provinces</label>
                            <div class="input-box {{ $errors->has('provinces') ? ' has-error' : ''}}">
                                {{-- {!! Form::select('province', $provinces) !!} --}}
                                <select name="provinces" id="provinces">
                                    <option value="0" selected="selected" disabled="disabled">Choose Provinces</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('provinces'))
                                    <span class="help-block"><strong>{{ $errors->first('provinces') }}</strong></span>
                                @endif
                            </div>
                        </li>
                        <li>
                            <label for="region_id">Districts</label>
                            <div class="input-box {{ $errors->has('districts') ? ' has-error' : '' }}">
                                {{-- {!! Form::select('province', $districts) !!} --}}
                                <select id="districts" name="districts" >
                                    <option value="0" selected="selected" disabled="disabled">Choose Districs</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}" class="{{ $district->province_id}}" style="display: none">{{ $district->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('districts'))
                                    <span class="help-block"><strong>{{ $errors->first('districts') }}</strong>
                                    </span>
                                @endif
                                <input type="text" style="display:none;" class="input-text required-entry" title="State/Province" value="" name="region" id="region">
                            </div>
                        </li>
                        <li>
                            <label for="region_id">Wards</label>
                            <div class="input-box {{ $errors->has('wards') ? ' has-error' : ''}}" >
                                {{-- {!! Form::select('province', $wards) !!} --}}
                                <select name="wards" id="wards"}}>
                                    <option value="0" disabled="disabled" selected="selected">Choose Wards</option>
                                    @foreach ($wards as $ward)
                                        <option value="{{ $ward->id }}" class="{{ $ward->district_id}}" style="display: none">{{ $ward->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('wards'))
                                    <span class="help-block"><strong>{{ $errors->first('wards') }}</strong>
                                    </span>
                                @endif
                                <input type="text" style="display:none;" class="input-text required-entry" title="State/Province" value="" name="region" id="region">
                            </div>
                        </li>
                        <li>
                            <label for="postcode">Name</label>
                            <div class="input-box {{ $errors->has('name') ? ' has-error' : '' }}">
                                <input type="text" name="name" id="postcode" class="input-text validate-postcode" required="required" value="{{ Auth::check() ? Auth::user()->name : '' }}">
                            </div>

                            @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                            <label for="phone">Phone</label>
                            <div class="input-box" {{ $errors->has('phone') ? ' has-error' : '' }}>
                                <input type="text" name="phone" class="input-text validate-postcode" required="required" value="{{ Auth::check() ? Auth::user()->name : ''}}">
                            </div>

                            @if ($errors->has('phone'))
                                <span class="help-block">{{ $errors->first('phone') }}</span>
                            @endif
                        </li>
                        <li>
                            <label for="">Email</label>
                            <div class="input-box {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" name="email" class="input-text validate-postcode" required="required" value="{{ Auth::check() ? Auth::user()->name : '' }}">
                                
                            </div>

                            @if($errors->has('email'))
                                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </li>
                    </ul>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="discount {{ $errors->has('note') ? ' has-error' : '' }}">
            <h3>Discount Codes</h3>
                <label for="coupon_code">NOTES</label>
                <textarea name="note" style=" width: 400px;
  height: 100px;" placeholder="Enter text here.."></textarea>
                    @if ($errors->has('note'))
                        <span class="help-block">
                            <strong>{{ $errors->first('note') }}</strong>
                        </span>
                    @endif
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
                    <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="{{-- submit --}}">
                    <span>Proceed to Checkout</span>
                    </button>
                </li>
                <br>
                <br>
            </ul>
        </div>
                {!! Form::close() !!}
    </div>
</div>
@endif

@push('scripts')
    <script type="text/javascript">
    $(document).ready(function(){
        $("#provinces").change(function(){
            var provinceId = $(this).val();
            $("#wards").children().attr("style", "display : none");
            displayDistricts(provinceId);
        });
        $("#districts").change(function(){
            var districtId = $(this).val();
            displayWards(districtId);
        });
    });
    
    
    function displayDistricts(provinceId){
        $("#districts").children().attr("style", "display : none");
        $("#districts :first-child").attr("style","display:block");
        $("#districts ." + provinceId).attr("style","display:block");
        $("#districts").val("0");
        $("#wards").val("0");
    }
    
    function displayWards(districtId){
        $("#wards").children().attr("style", "display : block");
        $("#wards :first-child").attr("style","display:block");
        $("#wards").val("0");       
        $("#wards ." + districtId).attr("style","display:block");
    }
</script>
@endpush