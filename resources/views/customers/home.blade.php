@extends('customers.layout.master')
@section('title')
<title>Home</title>
@endsection
@section('content')
@include('customers.layout.sections.slideshow')
<div class="offer-banner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xs-12 col-md-4 col-sm-4 wow"><a href="#"><img alt="offer banner1" src="{{ asset('assets/images/promo-banner1.jpg') }}"></a></div>
            <div class="col-lg-4 col-xs-12 col-md-4 col-sm-4 wow"><a href="#"><img alt="offer banner1" src="{{ asset('assets/images/promo-banner2.jpg') }}"></a></div>
            <div class="col-lg-4 col-xs-12 col-md-4 col-sm-4 wow"><a href="#"><img alt="offer banner1" src="{{ asset('assets/images/promo-banner3.jpg') }}"></a></div>
        </div>
    </div>
</div>
<section class="main-container col1-layout home-content-container">
</section>
<section class="recommend container">
<div class="new-pro-slider small-pr-slider" style="overflow:visible">
    <div class="slider-items-products">
        <div class="new_title center">
            <h2>FEATURED PRODUCTS</h2>
        </div>
        <div id="recommend-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col3">
                <!-- Item -->
                @include('customers.components.main-product')
                <!-- End Item --> 
            </div>
        </div>
    </div>
</div>
<!-- End middle slider --> 
<!-- promo banner section -->
</div>
<!-- Featured Slider -->
@include('customers.components.feature-slider')

<!-- End Featured Slider --> 
@endsection