@foreach ($products as $product)
    <div class="item">
        <div class="col-item">
            <div class="images-container">
                <a class="product-image" title="Sample Product" href="product_detail.html">{!! Html::image($product->image, null, ['class' => 'img-responsive'], null) !!}
                <div class="actions">
                    <div class="actions-inner">
                        <ul class="add-to-links">
                            <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                            <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="qv-button-container"> <a href="quick_view.html" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
            </div>
            <div class="info">
                <div class="info-inner">
                    <div class="item-title"> <a title=" Sample Product" href="product_detail.html">{{ $product->name }}</a> </div>
                                <!--item-title-->
                    <div class="item-content">
                        <div class="ratings">
                            <div class="rating-box">
                                <div style="width:60%" class="rating"></div>
                            </div>
                        </div>
                        <div class="price-box">
                            <p class="special-price"> <span class="price">{{ $product->price}}</span> </p>
                            <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{ $product->price }} </span> </p>
                        </div>
                    </div>
                                <!--item-content--> 
                </div>
                            <!--info-inner-->
                <div class="actions">

                    {!! Form::open(['action' => 'Customer\CartController@store', 'class' => 'form-add'])!!}
                        {!! Form::hidden('productId', $product->id) !!}
                    <button type="submit" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                    {!! Form::close()!!}
                </div>
                            <!--actions-->
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endforeach