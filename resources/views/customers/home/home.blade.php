@extends('customers.layout.master')
@section('title')
<title>Home</title>
@endsection
@push('nav')
    @include('customers.layout.sections.navbar')
@endpush
@push('scripts')
    {!! Html::script('assets/plugins/sweetalert/sweetalert.min.js') !!}
    <script>
        $('.qv-button-container').click(function () {
            $.get('/' + $(this).closest('.item').data('id'), function (data) {
                $('#fancybox-content').html(data.view);
                $('#fancybox-overlay').fadeToggle(1500);
                $('#fancybox-wrap').fadeToggle(800);
            });
        });

        $('#fancybox-close').click(function () {
            $('#fancybox-overlay').fadeToggle(50);
            $('#fancybox-wrap').fadeToggle(200);
        })
    </script>
@endpush
@push('styles')
    {!! Html::style('assets/plugins/toastr/toastr.min.css') !!}

@endpush
@section('content')
    @include('customers.layout.sections.slideshow')
    @include('customers.layout.sections.header-service')
    @include('customers.layout.sections.offer-banner-section')
    <section class="main-container col1-layout home-content-container">
        <div class="container">
            <div class="row">
                <div class="std">
                    <div class="col-lg-8 col-xs-12 col-sm-8 best-seller-pro wow">
                        <div class="slider-items-products">
                            <div class="new_title center">
                                <h2>Best Seller</h2>
                            </div>
                            <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col4">
                                    @each('customers.home.item.bestSeller', $lastestProducts, 'product')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-12 col-sm-4 wow latest-pro small-pr-slider">
                        <div class="slider-items-products">
                            <div class="new_title center">
                                <h2>Latest Products</h2>
                            </div>
                            <div id="latest-deals-slider" class="product-flexslider hidden-buttons latest-item">
                                <div class="slider-items slider-width-col4">
                                    @each('customers.home.item.lastestProduct', $lastestProducts, 'product')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="recommend container">
    <div class="new-pro-slider small-pr-slider" style="overflow:visible">
        <div class="slider-items-products">
            <div class="new_title center">
                <h2>FEATURED PRODUCTS</h2>
            </div>
            <div id="recommend-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col3">
                    @each('customers.home.item.lastestProduct', $lastestProducts, 'product')
                </div>
            </div>
        </div>
    </div>
    </section>
    <div class="top-offer-banner wow">
        <div class="container">
            <div class="row">
                <div class="offer-inner col-lg-12">
                    <!--newsletter-wrap-->
                    <div class="left">
                        <div class="col-1">
                            <div class="block-subscribe">
                                <div class="newsletter">
                                    <form>
                                        <h4><span>Subscribe Newsletter</span></h4>
                                        <h5> Get the latest news & updates from Inspire</h5>
                                        <input type="text" placeholder="Enter your email address" class="input-text required-entry validate-email" title="Sign up for our newsletter" id="newsletter1" name="email">
                                        <button class="subscribe" title="Subscribe" type="submit"><span>Subscribe</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col mid">
                            <div class="inner-text">
                                <h3>Headphones</h3>
                            </div>
                            <a href="#"><img src="{{ url('assets/images/offer-banner2.jpg') }}" alt="offer banner2"></a></div>
                        <div class="col last">
                            <div class="inner-text">
                                <h3>Camera</h3>
                            </div>
                            <a href="#"><img src="{{ url('assets/images/offer-banner3.jpg') }}" alt="offer banner2"></a></div>
                    </div>
                    <div class="right">
                        <div class="col">
                            <div class="inner-text">
                                <h4>Top COLLECTION</h4>
                                <h3>Mobile</h3>
                                <a href="#" class="shop-now1">Shop now</a> </div>
                            <a href="#" title=""><img src="{{ url('assets/images/offer-banner4.jpg') }}" alt=""></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="latest-blog container wow">
        <div class="blog-title">
            <h2><span>Latest Blog</span></h2>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="blog-img"> <img src="{{ url('assets/images/blog-img1.jpg') }}" alt="Image">

                </div>
                <h3><a href="blog-detail.html">Pellentesque habitant morbi</a> </h3>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce sit  ... </p>
                <div class="post-date"><i class="icon-calendar"></i> Apr 10, 2014</div>
            </div>
            <div class="col-xs-12 col-sm-4 wow">
                <div class="blog-img"> <img src="{{ url('assets/images/blog-img2.jpg') }}" alt="Image">
                    <!--<div class="mask"> <a class="info" href="blog-detail.html">Read More</a> </div>-->
                </div>
                <h3><a href="blog-detail.html">Pellentesque habitant morbi</a> </h3>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce sit  ... </p>
                <div class="post-date"><i class="icon-calendar"></i> Apr 10, 2014</div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="blog-img"> <img src="{{ url('assets/images/blog-img3.jpg') }}" alt="Image">
                    <!--<div class="mask"> <a class="info" href="blog-detail.html">Read More</a> </div>-->
                </div>
                <h3><a href="blog-detail.html">Pellentesque habitant morbi</a> </h3>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce sit  ... </p>
                <div class="post-date"><i class="icon-calendar"></i> Apr 10, 2014</div>
            </div>
        </div>
    </section>
    <section class="featured-pro wow animated parallax parallax-2">
        <div class="container">
            <div class="std">
                <div class="slider-items-products">
                    <div class="featured_title center">
                        <h2>High rate product</h2>
                    </div>
                    <div id="featured-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4">
                            @each('customers.home.item.bestSeller', $lastestProducts, 'product')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- End Featured Slider -->
@endsection
@push('scripts')
{!! Html::script('assets/plugins/toastr/toastr.min.js') !!}
    <script type="text/javascript">
        $('.form-add').submit(function (e){
            e.preventDefault();
            console.log($(this).attr('action'));
            $.ajax({
                url : $(this).attr('action'),
                data : $(this).serialize(),
                type : "POST",
                success : function(data){

                    $('#cart-sidebar').html(data.cartContent);
                    $('#cart-total').html(data.total);
                    $('.top-subtotal .price').html('$' + data.subTotal);

                    toastr["success"]("Complete bought product !")
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    /*toastr.success('You Bought Product');*/

                }
            });
        });
        $('.glyphicon-remove"').click(function(e) {
            e.preventDefault();
            // $.ajax({
            //     url: $(this).attr('href');
            //     type: "GET",
            //     success : function(data){
            //         console.log(data);
            //     }
            // });
            alert($(this).attr('href'));
        })
    </script>
@endpush
