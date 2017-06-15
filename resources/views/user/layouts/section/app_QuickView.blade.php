<div id="overlay" style="display: none;"></div>
<div style="display: none;" class="popup1 popquickview">
    <div class="newsletter-sign-box">
        <div id="fancybox-outer">
            <div style="border-width: 10px; width: auto; height: auto;" id="fancybox-content">
                <div style="width:auto;height:auto;overflow: auto;position:relative;">
                    <div class="product-view">

                    </div>
                </div>
            </div>
            <a style="display: inline;" id="fancybox-close" class="nutxoa"></a> </div>
    </div>
</div>


<div id="compare_quickview">
    <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
        <img class="image_compare" src="{{ url('images/product/pic1.jpg') }}">
    </div>
    <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
        <img class="image_compare" src="{{ url('images/product/pic1.jpg') }}">
    </div>
    <div class="product-img-box col-lg-6 col-sm-6 col-xs-12 compare-detail">
        <a> Ten san pham 1</a>
        <div class="ratings"><div class="rating-box"><div class="rating" style="width: 160%;"></div></div></div>
        <div class="price-box"><p class="special-price"><span class="price"> $900.00 </span></p> <p class="old-price"><span class="price-sep">-</span> <span class="price"> $910.00 </span></p></div>
    </div>
    <div class="product-img-box col-lg-6 col-sm-6 col-xs-12 compare-detail">
        <a> Ten san pham 2</a>
    </div>

    <div class="product-img-box col-lg-12 col-sm-12 col-xs-12 compare-button">
        <div class="ajax-checkout compare-component">
            <form method="GET" action="http://127.0.0.1:8000/compare" accept-charset="UTF-8">
                <button title="Submit" type="submit" disabled="disabled" class="button button-compare">
                    <span>Compare</span>
                </button></form>
            <form method="POST" action="http://127.0.0.1:8000/compare" accept-charset="UTF-8" class="destroy_compare">
                <input name="_token" type="hidden" value="OapMtUS6TWQh6vD30xzXIHxnkNn2SbVkckXmBwju">
                <button type="button" class="button button-clear clear_compare">
                    <span>Clear</span>
                </button>
            </form>
        </div>
    </div>
</div>

{{--<div id="compare_quickview">
    <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
        <img class="image_compare" src="{{ url('images/product/pic1.jpg') }}">
    </div>
    <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
        <img class="image_compare" src="{{ url('images/product/pic1.jpg') }}">
    </div>
    <div class="product-img-box col-lg-6 col-sm-6 col-xs-12 compare-detail">
        <a> Ten san pham 1</a>
        <div class="ratings"><div class="rating-box"><div class="rating" style="width: 160%;"></div></div></div>
        <div class="price-box"><p class="special-price"><span class="price"> $900.00 </span></p> <p class="old-price"><span class="price-sep">-</span> <span class="price"> $910.00 </span></p></div>
    </div>

    <div class="product-img-box col-lg-6 col-sm-6 col-xs-12 compare-detail">
        <a> Ten san pham 2</a>
    </div>

    <div class="product-img-box col-lg-12 col-sm-12 col-xs-12 compare-button">
        <div class="ajax-checkout compare-component">
            <form method="GET" action="http://127.0.0.1:8000/compare" accept-charset="UTF-8">
                <button title="Submit" type="submit" disabled="disabled" class="button button-compare">
                    <span>Compare</span>
                </button></form>
            <form method="POST" action="http://127.0.0.1:8000/compare" accept-charset="UTF-8" class="destroy_compare">
                <input name="_token" type="hidden" value="OapMtUS6TWQh6vD30xzXIHxnkNn2SbVkckXmBwju">
                <button type="button" class="button button-clear clear_compare">
                    <span>Clear</span>
                </button>
            </form>
        </div>
    </div>
</div>--}}
