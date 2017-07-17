<div class="item" data-id="{{ $product->id }}">
    <div class="col-item">
        <div class="sale-label sale-top-right">Sale</div>
        <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html">
            <img src="{{ $product->image }}" class="img-responsive" alt="a" /> </a>
            <div class="actions">
                <div class="actions-inner">
                    <button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                    <ul class="add-to-links">
                        <li><a title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                        <li><a title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="qv-button-container"> <a class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
        </div>
        <div class="info">
            <div class="info-inner">
                <div class="item-title"> <a title=" Sample Product"> {{ $product->name }} </a> </div>
                <!--item-title-->
                <div class="item-content">
                    <div class="ratings">
                        <div class="rating-box">
                            <div style="width:60%" class="rating"></div>
                        </div>
                    </div>
                    <div class="price-box">
                        <p class="special-price"> <span class="price"> $45.00 </span> </p>
                        <p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
                    </div>
                </div>
                <!--item-content-->
            </div>
            <!--info-inner-->
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
