@extends('user.layouts.applayout')
@push('scripts')
{{ Html::script('js/user/cart.js') }}
{{ Html::script('dist/sweetalert.min.js') }}
{{ Html::script('js/user/quickview.js') }}
{{ Html::script('js/user/cloudzoom.js') }}
@endpush
@section('content')
    @include('user.layouts.section.app_Slide')
    @include('user.layouts.section.app_Service')
    @include('user.layouts.section.app_BannerOffer')
    <section class="main-container col1-layout home-content-container">
        <div class="container">
            <div class="row">
                <div class="std">

                    <!-- Best Seller Products -->
                    <div class="col-lg-8 col-xs-12 col-sm-8 best-seller-pro wow">
                        <div class="slider-items-products">
                            <div class="new_title center">
                                <h2>{{ trans('user/label.best_seller') }}</h2>
                            </div>
                            <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col4">
                                    <!-- Item -->
                                    @foreach($best_seller as $item)
                                        <div class="item">
                                            <div class="col-item">
                                                @if( $item->price_sale !== NULL )
                                                    <div class="sale-label sale-top-right">{{ trans('user/label.sale') }}</div>
                                                @endif
                                                <div class="images-container">
                                                    <a class="product-image" title="Sample Product" href="product_detail.html">
                                                        <img src="{{ url($item->url) }}" class="img-responsive" alt="product-image"/>
                                                    </a>
                                                    <div class="actions">
                                                        <div class="actions-inner">
                                                            {!! Form::open(['action' => ['User\CartController@store'], 'class' => 'addCart']) !!}
                                                            {!! Form::hidden('qty', 1) !!}
                                                            {!! Form::hidden('productId', $item->id) !!}
                                                            <button type="button" title="Add to Cart"
                                                                    class="button btn-cart">
                                                                <span>{{ trans('user/label.add_cart') }}</span>
                                                            </button>
                                                            {!! Form::close() !!}
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a href="javascript:void(0)"
                                                                       data-product-id="{{ $item->id }}"
                                                                       data-user-id="{{ Auth::id() }}"
                                                                       data-route-store="{{ route('wishlists.store') }}"
                                                                       data-route-destroy="{{ route('wishlists.destroy', $item->id ) }}"
                                                                       title="Add to Wishlist"
                                                                       class="{{ count($item->checkWishList(Auth::id()))?" wishlist":"" }} link-wishlist add-wishlist">
                                                                       <span>{{ trans('user/label.add_wishlist') }}</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a title="Add to Compare"
                                                                       class="link-compare" data-productid="{{ $item->id }}">
                                                                        <span>{{ trans('user/label.add_compare') }}</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="qv-button-container">
                                                        {!! Form::open(['action' => ['User\ProductController@edit', $item->id], 'class' => 'showQuickView']) !!}
                                                        <a class="qv-e-button btn-quickview-1">
                                                            <span><span>{{ trans('user/label.quick_view') }}</span></span>
                                                        </a>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a title=" Sample Product"
                                                               href="{{ action('User\ProductController@show', [$item->id]) }}"> {{ $item->name }} </a>
                                                        </div>
                                                        <div class="item-content">
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <div style="width:{{ $item->score }}%"
                                                                         class="rating">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="price-box">
                                                                @if( $item->price_sale !== NULL )
                                                                    <p class="special-price">
                                                                        <span class="price"> {{ $item->price_sale }} </span>
                                                                    </p>
                                                                    <p class="old-price">
                                                                        <span class="price-sep">-</span>
                                                                        <span class="price"> {{ $item->price }} </span>
                                                                    </p>
                                                                @else
                                                                    <p class="special-price">
                                                                        <span class="price"> {{ $item->price }} </span>
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--info-inner-->
                                                    <!--actions-->
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                                <!-- End Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Best Seller Products -->

                    <!-- Latest Products -->
                    <div class="col-lg-4 col-xs-12 col-sm-4 wow latest-pro small-pr-slider">
                        <div class="slider-items-products">
                            <div class="new_title center">
                                <h2>{{ trans('user/label.latest_product') }}</h2>
                            </div>
                            <div id="latest-deals-slider" class="product-flexslider hidden-buttons latest-item">
                                <div class="slider-items slider-width-col4">
                                    <!-- Item -->
                                    @foreach($latest_product as $item)
                                        <div class="item">
                                            <div class="col-item">
                                                <div class="images-container"><a class="product-image"
                                                                                 title="Sample Product"
                                                                                 href="product_detail.html">
                                                        <img
                                                                src="{{ url($item->url) }}" class="img-responsive"
                                                                alt="product-image"/> </a>
                                                    <div class="actions">
                                                        <div class="actions-inner">
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a href="javascript:void(0)"
                                                                       data-product-id="{{ $item->id }}"
                                                                       data-user-id="{{ Auth::id() }}"
                                                                       data-route-store="{{ route('wishlists.store') }}"
                                                                       data-route-destroy="{{ route('wishlists.destroy', $item->id ) }}"
                                                                       title="Add to Wishlist"
                                                                       class="{{ count($item->checkWishList(Auth::id()))?" wishlist":"" }} link-wishlist add-wishlist">
                                                                        <span>{{ trans('user/label.add_wishlist') }}</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="compare.html" title="Add to Compare"
                                                                       class="link-compare ">
                                                                        <span>{{ trans('user/label.add_compare') }}</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="qv-button-container">
                                                        <a href="quick_view.html" class="qv-e-button btn-quickview-1">
                                                            <span>
                                                                <span>{{ trans('user/label.quick_view') }}</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a title=" Sample Product"
                                                               href="{{ action('User\ProductController@show', [$item->id]) }}"> {{ $item->name }}
                                                            </a>
                                                        </div>
                                                        <div class="item-content">
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <div style="width:{{ $item->score }}%"
                                                                         class="rating"></div>
                                                                </div>
                                                            </div>
                                                            <div class="price-box">
                                                                @if( $item->price_sale !== NULL )
                                                                    <p class="special-price">
                                                                        <span class="price"> {{ $item->price_sale }} </span>
                                                                    </p>
                                                                    <p class="old-price">
                                                                        <span class="price-sep">-</span>
                                                                        <span class="price"> {{ $item->price }} </span>
                                                                    </p>
                                                                @else
                                                                    <p class="special-price">
                                                                        <span class="price"> {{ $item->price }} </span>
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--info-inner-->
                                                    <div class="actions">
                                                        {!! Form::open(['action' => ['User\CartController@store'], 'class' => 'addCart']) !!}
                                                        {!! Form::hidden('qty', 1) !!}
                                                        {!! Form::hidden('productId', $item->id) !!}
                                                        <button type="button" title="Add to Cart" class="button btn-cart">
                                                            <span>{{ trans('user/label.add_cart') }}</span>
                                                        </button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                    <!--actions-->
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                                <!-- End Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Latest Products -->
                </div>
            </div>
        </div>
    </section>
    <!-- Older Products -->
    <section class="recommend container">
        <div class="new-pro-slider small-pr-slider" style="overflow:visible">
            <div class="slider-items-products">
                <div class="new_title center">
                    <h2>{{ trans('user/label.older_product') }}</h2>
                </div>
                <div id="recommend-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col3">
                        <!-- Item -->
                        @foreach($old_product as $item)
                            <div class="item">
                                <div class="col-item">
                                    @if( $item->price_sale !== NULL )
                                        <div class="sale-label sale-top-right">{{ trans('user/label.sale') }}</div>
                                    @endif
                                    <div class="images-container"><a class="product-image" title="Sample Product"
                                                                     href="product_detail.html"> <img
                                                    src="{{ url($item->url) }}" class="img-responsive" alt="a"/> </a>
                                        <div class="qv-button-container">
                                            <a href="quick_view.html" class="qv-e-button btn-quickview-1">
                                                <span><span>{{ trans('user/label.quick_view') }}</span></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a title=" Sample Product"
                                                   href="{{ action('User\ProductController@show', [$item->id]) }}">
                                                    {{ $item->name }}
                                                </a>
                                            </div>
                                            <div class="item-content">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:{{ $item->score }}%" class="rating"></div>
                                                    </div>
                                                </div>
                                                <div class="price-box">
                                                    @if( $item->price_sale !== NULL )
                                                        <p class="special-price">
                                                            <span class="price"> {{ $item->price_sale }} </span>
                                                        </p>
                                                        <p class="old-price">
                                                            <span class="price-sep">-</span>
                                                            <span class="price"> {{ $item->price }} </span>
                                                        </p>
                                                    @else
                                                        <p class="special-price">
                                                            <span class="price"> {{ $item->price }} </span>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!--info-inner-->
                                        <div class="actions">
                                            {!! Form::open(['action' => ['User\CartController@store'], 'class' => 'addCart']) !!}
                                            {!! Form::hidden('qty', 1) !!}
                                            {!! Form::hidden('productId', $item->id) !!}
                                            <button type="button" title="Add to Cart" class="button btn-cart">
                                                <span>{{ trans('user/label.add_cart') }}</span>
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                        <!--actions-->
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!-- End Item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Older Products -->
    @include('user.layouts.section.app_LatestBlog')
    @include('user.layouts.section.app_Parallax')
@endsection
