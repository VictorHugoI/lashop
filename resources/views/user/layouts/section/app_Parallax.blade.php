<section class="featured-pro wow animated parallax parallax-2">
    <div class="container">
        <div class="std">
            <div class="slider-items-products">
                <div class="featured_title center">
                    <h2>{{ trans('user/label.high_rate_product') }}</h2>
                </div>
                <div id="featured-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4">
                        @foreach($high_product as $item)
                            <div class="item">
                                <div class="col-item">
                                    @if( $item->price_sale !== NULL )
                                        <div class="sale-label sale-top-right">{{ trans('user/label.sale') }}</div>
                                    @endif
                                    <div class="images-container">
                                        <a class="product-image" title="Sample Product" href="product_detail.html">
                                            <img src="{{ url($item->url) }}" class="img-responsive" alt="a"/>
                                        </a>
                                        <div class="actions">
                                            <div class="actions-inner">
                                                <button type="button" title="Add to Cart" class="button btn-cart">
                                                    <span>{{ trans('user/label.add_cart') }}</span></button>
                                                <ul class="add-to-links">
                                                    <li>
                                                        <a href="#" title="Add to Wishlist" class="link-wishlist">
                                                            <span>{{ trans('user/label.add_wishlist') }}</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Compare" class="link-compare ">
                                                            <span>{{ trans('user/label.add_compare') }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
                                                        <div style="width:{{ $item->score  }}%" class="rating"></div>
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
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
