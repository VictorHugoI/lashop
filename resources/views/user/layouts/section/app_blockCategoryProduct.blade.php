<ul class="products-grid">
    @foreach($products as $product)
        <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <div class="col-item">
                @if( $product->price_sale !== NULL )
                    <div class="sale-label sale-top-right">{{ trans('user/label.sale') }}</div>
                @endif
                <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img src="{{ url($product->url) }}" class="img-responsive" alt="a" /> </a>
                    <div class="actions">
                        <div class="actions-inner">
                            <button type="button" title="Add to Cart" class="button btn-cart"><span>{{ trans('user/label.add_cart') }}</span></button>
                            <ul class="add-to-links">
                                <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>{{ trans('user/label.add_wishlist') }}</span></a></li>
                                <li><a title="Add to Compare" class="link-compare abc" data-productid="{{ $product->id }}"><span>{{ trans('user/label.add_compare') }}</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="qv-button-container"> <a class="qv-e-button btn-quickview-1" href="quick_view.html"><span><span>{{ trans('user/label.quick_view') }}</span></span></a> </div>
                </div>
                <div class="info">
                    <div class="info-inner">
                        <div class="item-title"> <a title=" Sample Product" href="{{ action('User\ProductController@show', [$product->id]) }}"> {{ $product->name }} </a> </div>
                        <div class="item-content">
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:{{ $product->score }}%" class="rating"></div>
                                </div>
                            </div>
                            <div class="price-box">
                                @if( $product->price_sale !== NULL )
                                    <p class="special-price"> <span class="price"> {{ $product->price_sale }} </span> </p>
                                    <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{ $product->price }} </span> </p>
                                @else
                                    <p class="special-price"> <span class="price"> {{ $product->price }} </span> </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--info-inner-->

                    <!--actions-->

                    <div class="clearfix"> </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
