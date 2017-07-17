<div style="width:auto;height:auto;overflow: auto;position:relative;">
    <div class="product-view">
        <div class="product-essential">
            <form action="#" method="post" id="product_addtocart_form">
                <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
                    <img style="width: 100%" src="{{ url($product->image) }}">
                </div>

                <div class="product-shop col-lg-6 col-sm-6 col-xs-12">
                    <div class="product-name">
                        <h1>{{ $product->name }}</h1>
                    </div>
                    <div class="ratings">
                        <div class="rating-box">
                            <div style="width:60%" class="rating"></div>
                        </div>
                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>
                    </div>
                    <p class="availability in-stock"><span>In Stock</span></p>
                    <div class="price-block">
                        <div class="price-box">
                            <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $315.99 </span> </p>
                            <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $309.99 </span> </p>
                        </div>
                    </div>
                    <div class="short-description">
                        <h2>Quick Overview</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum... </p>
                    </div>
                    <div class="add-to-box">
                        <div class="add-to-cart">
                            <label for="qty">Quantity:</label>
                            <div class="pull-left">
                                <div class="custom pull-left">
                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                                    <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                                </div>
                            </div>
                            <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="button"><span><i class="icon-basket"></i> Add to Cart</span></button>
                        </div>
                        <div class="email-addto-box">
                            <ul class="add-to-links">
                                <li> <a class="link-wishlist" href="#"><span>Add to Wishlist</span></a></li>
                                <li><span class="separator">|</span> <a class="link-compare" href="#"><span>Add to Compare</span></a></li>
                            </ul>
                            <p class="email-friend"><a href="#" class=""><span>Email to Friend</span></a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--product-view-->

</div>
