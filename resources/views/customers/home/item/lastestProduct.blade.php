<div class="item" data-id="{{ $product->id }}">
    <div class="col-item">
        @if($product->sale_price != 0)
            <div class="sale-label sale-top-right">Sale</div>
        @endif
        @if($product->is_new != 0)
            <div class="new-label new-top-right" style="left: 10px">New</div>
        @endif
        <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html">
            <img src="{{ $product->image }}" class="img-responsive" alt="a" /> </a>
            <div class="actions">
                <div class="actions-inner">
                    <ul class="add-to-links">
                        <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                        <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="qv-button-container"> <a class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
        </div>
        <div class="info">
            <div class="info-inner">
                <div class="item-title"> <a title=" Sample Product" href="{{ route('products.show', $product->id) }}"> {{ $product->name }} </a> </div>
                <!--item-title-->
                <div class="item-content">
                    <div class="ratings">
                        <div class="rating-box">
                            <div style="width:{{ $product->score * 20 }}%" class="rating"></div>
                        </div>
                    </div>
                    <div class="price-box">
                        @if($product->sale_price != 0)
                            <p class="special-price"> <span class="price"> ${{ $product->sale_price }}00.00 </span> </p>
                            <p class="old-price"> <span class="price-sep">-</span> <span class="price"> ${{ $product->price }}.00 </span> </p>
                        @else
                            <p class="special-price"> <span class="price"> ${{ $product->price }}00.00 </span> </p>
                        @endif
                    </div>
                </div>
                <!--item-content-->
            </div>
            <!--info-inner-->
            <div class="actions">
                {!! Form::open(['action' => 'Customer\CartController@store', 'class' => 'form-add'])!!}
                    {!! Form::hidden('productId', $product->id) !!}
                    <button class="button btn-cart" title="Add to Cart" type="submit"><span>Add to Cart</span></button>
                {!! Form::close() !!}
            </div>
            <!--actions-->
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- End Item -->
