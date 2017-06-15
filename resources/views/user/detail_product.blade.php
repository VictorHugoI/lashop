@extends('user.layouts.applayout')
@push('scripts')
{{ Html::script('dist/sweetalert.min.js') }}
{{ Html::script('js/user/cloudzoom.js') }}
{{ Html::script('js/user/cart.js') }}
@endpush
@section('content')
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
                <div class="row">
                    <div class="product-view wow">
                        <div class="product-essential">

                            <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
                                <ul class="moreview" id="moreview">
                                    <li class="moreview_thumb thumb_1 moreview_thumb_active">
                                        <img class="moreview_thumb_image" src="{{ url($product->url) }}">
                                        <img class="moreview_source_image" src="{{ url($product->url) }}" alt="">
                                        <span class="roll-over">Roll over image to zoom in</span>
                                        <img style="position: absolute;" class="zoomImg" src="{{ url($product->url) }}">
                                    </li>
                                    @for($i = 0; $i < 5; $i++)
                                        <li class="moreview_thumb thumb_{{ $i + 2 }} moreview_thumb_active">
                                            <img class="moreview_thumb_image" src="{{ url($pictures[$i]->url) }}">
                                            <img class="moreview_source_image" src="{{ url($pictures[$i]->url) }}" alt="">
                                            <span class="roll-over">Roll over image to zoom in</span>
                                            <img style="position: absolute;" class="zoomImg" src="{{ url($pictures[$i]->url) }}}">
                                        </li>
                                    @endfor
                                </ul>
                                <div class="moreview-control">
                                    <a style="right: 42px;" href="javascript:void(0)" class="moreview-prev"></a>
                                    <a style="right: 42px;" href="javascript:void(0)" class="moreview-next"></a>
                                </div>
                            </div>

                            <!-- end: more-images -->

                            <div class="product-shop col-lg-6 col-sm-6 col-xs-12">
                                <div class="product-name">
                                    <h1>{{ $product->name }}</h1>
                                </div>
                                <div class="ratings">
                                    <div class="rating-box">
                                        <div style="width:{{ $product->score }}%" class="rating"></div>
                                    </div>
                                    <p class="rating-links">
                                        <a href="#">{{ $product->ratings()->count() }} Rating(s)</a>
                                        <span class="separator">|</span> <a href="#">Add Your Review</a>
                                    </p>
                                </div>
                                <p class="availability in-stock"><span>In Stock</span></p>
                                <div class="price-block">
                                    <div class="price-box">
                                        @if($product->price_sale != Null)
                                            <p class="old-price">
                                                <span class="price-label">Regular Price:</span>
                                                <span class="price"> {{ $product->price }} </span>
                                            </p>
                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                                <span class="price"> {{ $product->price_sale }} </span>
                                            </p>
                                        @else
                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                                <span class="price"> {{ $product->price }} </span>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="short-description" style="padding-bottom: 15px; border-bottom: 1px #ddd dashed; margin-bottom: 15px;">
                                    <table class="table-data-sheet col" style="width: 100%;">
                                        <tbody>
                                        <tr class="odd">
                                            <td style="width: 40%"><span style="font-size: 15px; font-weight: bold; color: #777" >From country</span></td>
                                            <td style="font-size: 15px">{{ $product->country }}</td>
                                        </tr>
                                        <tr class="odd">
                                            <td style="width: 40%"><span style="font-size: 15px; font-weight: bold; color: #777" >Volume</span></td>
                                            <td style="font-size: 15px">{{ $product->volume }}</td>
                                        </tr>
                                        <tr class="odd">
                                            <td style="width: 40%"><span style="font-size: 15px; font-weight: bold; color: #777" >Vintage</span></td>
                                            <td style="font-size: 15px">{{ $product->vintage }}</td>
                                        </tr>
                                        <tr class="odd">
                                            <td style="width: 40%"><span style="font-size: 15px; font-weight: bold; color: #777" >Age of wine</span></td>
                                            <td style="font-size: 15px">{{ $product->age }}</td>
                                        </tr>
                                        <tr class="odd">
                                            <td style="width: 40%"><span style="font-size: 15px; font-weight: bold; color: #777" >Alcohol</span></td>
                                            <td style="font-size: 15px">{{ $product->alcohol }}</td>
                                        </tr>
                                        <tr class="odd">
                                            <td style="width: 40%"><span style="font-size: 15px; font-weight: bold; color: #777" >Material</span></td>
                                            <td style="font-size: 15px">{{ $product->material }}</td>
                                        </tr>
                                        @if($product->sale_detail != Null)
                                            <tr class="odd">
                                                <td style="width: 40%"><span style="font-size: 15px; font-weight: bold; color: #777" >Sale content</span></td>
                                                <td style="font-size: 15px">{{ $product->sale_detail }}</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="add-to-box">
                                    {!! Form::open(['action' => ['User\CartController@store'], 'class' => 'addCart']) !!}
                                    {!! Form::hidden('productId', $product->id) !!}
                                    <div class="add-to-cart">
                                        <label for="qty">Quantity:</label>
                                        <div class="pull-left">
                                            <div class="custom pull-left">
                                                <button onClick="var result = document.getElementById('qty');
                                                        var qty = result.value; if( !isNaN( qty )) result.value++;
                                                        return false;" class="increase items-count" type="button">
                                                    <i class="icon-plus">&nbsp;</i>
                                                </button>
                                                <input type="number" required min="1" max="10"
                                                       class="input-text qty" title="Qty"
                                                       value="1" maxlength="12" id="qty" name="qty">
                                                <button onClick="var result = document.getElementById('qty');
                                                        var qty = result.value;
                                                        if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;
                                                        return false;" class="reduced items-count" type="button">
                                                    <i class="icon-minus">&nbsp;</i>
                                                </button>
                                            </div>
                                        </div>
                                        <button type="button" title="Add to Cart" class="button btn-cart">
                                            <span><i class="icon-basket"></i>{{ trans('user/label.add_cart') }}</span>
                                        </button>
                                    </div>
                                    {!! Form::close() !!}
                                    <div class="email-addto-box">
                                        <ul class="add-to-links">
                                            <li> <a class="link-wishlist" href="#"><span>{{ trans('user/label.add_wishlist') }}</span></a></li>
                                            <li><span class="separator">|</span> <a class="link-compare" href="#"><span>{{ trans('user/label.add_compare') }}</span></a></li>
                                        </ul>
                                        <p class="email-friend"><a href="#" class=""><span>{{ trans('user/label.email_to_friend') }}</span></a></p>
                                    </div>
                                </div>
                                <div class="custom-box"><img alt="banner" src="{{ url($product->brand->url) }}.jpg"></div>
                            </div>

                        </div>
                        <div class="product-collateral">
                            <div class="col-sm-12 wow">
                                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                    <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> {{ trans('user/label.product_description') }} </a></li>
                                    @if(auth::check())
                                        <li><a href="#product_tabs_tags" data-toggle="tab">{{ trans('user/label.comments') }}</a></li>
                                        <li><a href="#reviews_tabs" data-toggle="tab">{{ trans('user/label.reviews') }}</a></li>
                                    @endif
                                </ul>
                                <div id="productTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="product_tabs_description">
                                        {!!  $product->description !!}
                                    </div>
                                    @if(auth::check())
                                        <div class="tab-pane fade" id="product_tabs_tags">
                                            <div class="box-collateral box-reviews" id="customer-reviews">
                                                <div class="box-reviews2">
                                                    <h3>{{ trans('user/label.customer_reviews') }}</h3>
                                                    <div class="box visible">
                                                        <ul>
                                                            @foreach($comments as $item)
                                                                <li>
                                                                    <table class="ratings-table">
                                                                        <colgroup>
                                                                            <col width="1">
                                                                            <col>
                                                                        </colgroup>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="profile_pic">
                                                                                    <img src="{{ url('images/user/user.png') }}" alt="..." class="img-circle" style="width: 40%; margin-left: 30%">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="review">
                                                                        <h6><a href="#/catalog/product/view/id/61/">Excellent</a></h6>
                                                                        <small>Review by <span>Leslie Prichard </span>on 1/3/2014 </small>
                                                                        <div class="review-txt"> I have purchased shirts from Minimalism a few times and am never disappointed. The quality is excellent and the shipping is amazing. It seems like it's at your front door the minute you get off your pc. I have received my purchases within two days - amazing.</div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>

                                                    {!! Form::open(['action' => ['User\CommentController@store']]) !!}
                                                    {!! Form::hidden('product_id', $product->id) !!}
                                                    {!! Form::hidden('user_id', Auth::id()) !!}
                                                    <ul>
                                                        <li>
                                                            <label class="required label-wide" for="review_field">Review<em>*</em></label>
                                                            <div class="input-box">
                                                                <textarea class="required-entry" rows="3" cols="5" id="review_field" name="conten"></textarea>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="buttons-set">
                                                        <button class="button submit" title="Submit Review" type="submit"><span>{{ trans('user/label.submit_comment') }}</span></button>
                                                    </div>
                                                    {!! Form::close() !!}

                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="reviews_tabs">
                                            <div class="box-collateral box-reviews" id="customer-reviews">
                                                <div class="box-reviews1">
                                                    <div class="form-add">

                                                        {!! Form::open(['action' => ['User\RatingController@store'], 'id' => 'review-form']) !!}
                                                        @if(\App\Models\Rating::scoreByCustomer(auth::id(), $product->id)->isEmpty() != true)
                                                            <h3>{{ trans('user/label.rated_point') }} {{ \App\Models\Rating::scoreByCustomer(auth::id(), $product->id)->first()->score }}</h3>
                                                        @else
                                                            <h3>{{ trans('user/label.get_rate') }}</h3>
                                                        @endif
                                                        {!! Form::hidden('product_id', $product->id) !!}
                                                        {!! Form::hidden('customer_id', Auth::id()) !!}
                                                        <fieldset>
                                                            <h4>{{ trans('user/label.question_rate') }}<em class="required">*</em></h4>
                                                            <span id="input-message-box"></span>
                                                            @if(\App\Models\Rating::scoreByCustomer(auth::id(), $product->id)->isEmpty() != true)
                                                                <table id="product-review-table" class="data-table">
                                                                    <colgroup>
                                                                        <col>
                                                                        @for($i = 1; $i <= 5; $i++)
                                                                            <col width="1">
                                                                        @endfor
                                                                    </colgroup>
                                                                    <thead>
                                                                    <tr class="first last">
                                                                        <th>&nbsp;</th>
                                                                        @for($i = 1; $i <= 5; $i++)
                                                                            <th><span class="nobr">{{ $i }} *</span></th>
                                                                        @endfor
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr class="first odd">
                                                                        <th>Score</th>
                                                                        @for($i = 1; $i <= 5; $i++)
                                                                            @if($i == \App\Models\Rating::scoreByCustomer(auth::id(), $product->id)->first()->score)
                                                                                <td class="value"><input type="radio" class="radio" value="{{ $i }}" id="Price_{{ $i }}" name="score" checked></td>
                                                                            @else
                                                                                <td class="value"><input type="radio" class="radio" value="{{ $i }}" id="Price_{{ $i }}" name="score"></td>
                                                                            @endif
                                                                        @endfor
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            @else
                                                                <table id="product-review-table" class="data-table">
                                                                    <colgroup>
                                                                        <col>
                                                                        @for($i = 1; $i <= 5; $i++)
                                                                            <col width="1">
                                                                        @endfor
                                                                    </colgroup>
                                                                    <thead>
                                                                    <tr class="first last">
                                                                        <th>&nbsp;</th>
                                                                        @for($i = 1; $i <= 5; $i++)
                                                                            <th><span class="nobr">{{ $i }} *</span></th>
                                                                        @endfor
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr class="first odd">
                                                                        <th>Score</th>
                                                                        @for($i = 1; $i <= 5; $i++)
                                                                            <td class="value"><input type="radio" class="radio" value="{{ $i }}" id="Price_{{ $i }}" name="score"></td>
                                                                        @endfor
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            @endif
                                                            <input type="hidden" value="" class="validate-rating" name="validate_rating">
                                                            <div class="review2">
                                                                <div class="buttons-set">
                                                                    <button class="button submit" title="Submit Review" type="submit"><span>{{ trans('user/label.submit_review') }}</span></button>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="box-additional">
                                    <div class="related-pro wow">
                                        <div class="slider-items-products">
                                            <div class="new_title center">
                                                <h2>{{ trans('user/label.sameCategory') }}</h2>
                                            </div>
                                            <div id="related-products-slider" class="product-flexslider hidden-buttons">
                                                <div class="slider-items slider-width-col4">
                                                @foreach($sameCategory as $item)
                                                    <!-- Item -->
                                                        <div class="item" style="padding-bottom: 10px">
                                                            <div class="col-item">
                                                                @if( $item->price_sale !== NULL )
                                                                    <div class="sale-label sale-top-right">{{ trans('user/label.sale') }}</div>
                                                                @endif
                                                                <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img src="{{ url($item->url) }}" class="img-responsive" alt="a" /> </a>
                                                                    <div class="actions">
                                                                        <div class="actions-inner">
                                                                            {!! Form::open(['action' => ['User\CartController@store'], 'class' => 'addCart']) !!}
                                                                            {!! Form::hidden('productId', $item->id) !!}
                                                                            {!! Form::hidden('qty', 1) !!}
                                                                            <button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                                                                            {!! Form::close() !!}
                                                                            <ul class="add-to-links">
                                                                                <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>{{ trans('user/label.add_wishlist') }}</span></a></li>
                                                                                <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>{{ trans('user/label.add_compare') }}</span></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qv-button-container"> <a href="quick_view.html" class="qv-e-button btn-quickview-1"><span><span>{{ trans('user/label.quick_view') }}</span></span></a> </div>
                                                                </div>
                                                                <div class="info">
                                                                    <div class="info-inner">
                                                                        <div class="item-title"> <a title=" Sample Product" href="product_detail.html"> {{ $item->name }} </a> </div>
                                                                        <div class="item-content">
                                                                            <div class="ratings">
                                                                                <div class="rating-box">
                                                                                    <div style="width:{{ $item->score }}%" class="rating"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="price-box">
                                                                                @if( $item->price_sale !== NULL )
                                                                                    <p class="special-price"> <span class="price"> {{ $item->price_sale }} </span> </p>
                                                                                    <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{ $item->price }} </span> </p>
                                                                                @else
                                                                                    <p class="special-price"> <span class="price"> {{ $item->price }} </span> </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--info-inner-->
                                                                    {{--<div class="actions">
                                                                        <button type="button" title="Add to Cart" class="button btn-cart"><span>{{ trans('user/label.add_cart') }}</span></button>
                                                                    </div>--}}
                                                                    <!--actions-->
                                                                    <div class="clearfix"> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Item -->
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="upsell-pro wow">
                                        <div class="slider-items-products">
                                            <div class="new_title center">
                                                <h2>{{ trans('user/label.sameBrand') }}</h2>
                                            </div>
                                            <div id="upsell-products-slider" class="product-flexslider hidden-buttons">
                                                <div class="slider-items slider-width-col4">
                                                @foreach($sameBrand as $item)
                                                    <!-- Item -->
                                                        <div class="item">
                                                            <div class="col-item">
                                                                @if( $item->price_sale !== NULL )
                                                                    <div class="sale-label sale-top-right">{{ trans('user/label.sale') }}</div>
                                                                @endif
                                                                <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img src="{{ url($item->url) }}" class="img-responsive" alt="a" /> </a>
                                                                    <div class="actions">
                                                                        <div class="actions-inner">
                                                                            {!! Form::open(['action' => ['User\CartController@store'], 'class' => 'addCart']) !!}
                                                                            {!! Form::hidden('productId', $item->id) !!}
                                                                            {!! Form::hidden('qty', 1) !!}
                                                                            <button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                                                                            {!! Form::close() !!}
                                                                            <ul class="add-to-links">
                                                                                <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>{{ trans('user/label.add_wishlist') }}</span></a></li>
                                                                                <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>{{ trans('user/label.add_compare') }}</span></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qv-button-container"> <a href="quick_view.html" class="qv-e-button btn-quickview-1"><span><span>{{ trans('user/label.quick_view') }}</span></span></a> </div>
                                                                </div>
                                                                <div class="info">
                                                                    <div class="info-inner">
                                                                        <div class="item-title"> <a title=" Sample Product" href="product_detail.html"> {{ $item->name }} </a> </div>
                                                                        <div class="item-content">
                                                                            <div class="ratings">
                                                                                <div class="rating-box">
                                                                                    <div style="width:{{ $item->score }}%" class="rating"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="price-box">
                                                                                @if( $item->price_sale !== NULL )
                                                                                    <p class="special-price"> <span class="price"> {{ $item->price_sale }} </span> </p>
                                                                                    <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{ $item->price }} </span> </p>
                                                                                @else
                                                                                    <p class="special-price"> <span class="price"> {{ $item->price }} </span> </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--info-inner-->
                                                                    {{--<div class="actions">
                                                                        <button type="button" title="Add to Cart" class="button btn-cart"><span>{{ trans('user/label.add_cart') }}</span></button>
                                                                    </div>--}}
                                                                    <!--actions-->
                                                                    <div class="clearfix"> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Item -->
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
