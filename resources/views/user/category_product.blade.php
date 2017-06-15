@extends('user.layouts.applayout')
@push('scripts')
    {{ Html::script('js/user/compare.js') }}
    {{ Html::script('dist/sweetalert.min.js') }}
@endpush
@push('styles')
{{ Html::script('dist/sweetalert.css') }}
@endpush
@section('content')
    @include('user.layouts.section.app_Slide')
    @include('user.layouts.section.app_Service')
    @include('user.layouts.section.app_BannerOffer')

    <section class="main-container col2-left-layout">
        <div class="main container">
            <div class="row">
                <section class="col-main col-sm-9 col-sm-push-3 wow">
                    <div class="category-title">
                        <h1>{{ $category->name }}</h1>
                    </div>
                    <!-- category banner -->
                    <div class="category-description std">
                        <div class="slider-items-products">
                            <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col1">

                                    <!-- Item -->
                                    <div class="item"> <a href="#"><img alt="category-banner" src="{{ url($category->url) }}"></a>
                                        <div class="cat-img-title cat-bg cat-box">
                                            <h2 class="cat-heading">Choose your wines</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu.</p>
                                        </div>
                                    </div>
                                    <!-- End Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- category banner -->
                    <div class="category-products">
                        <div class="toolbar">
                            <div class="col-md-3 col-md-offset-5">
                                {{ $products->links() }}
                            </div>
                        </div>
                        @include('user.layouts.section.app_blockCategoryProduct')
                    </div>
                </section>
                <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow">
                    <div class="side-nav-categories">
                        <div class="block-title"> {{ trans('user/label.categories') }} </div>
                        <!--block-title-->
                        <!-- BEGIN BOX-CATEGORY -->
                        @include('user.layouts.section.app_blockCategories')
                        <!--box-content box-category-->
                    </div>
                    @if($category->parent_id == Null)
                        @include('user.layouts.section.app_shopby')
                    @endif
                    {{--@include('user.layouts.section.app_CartBlock')--}}
                    <div class="block block-cart">
                        <div class="block-title "><span>{{ trans('user/label.compare_product') }}</span></div>
                        <div class="block-content">
                            <div>
                            <ul class="compare_product">
                            @if($product1)
                                <li class="item compare-item1"> <a class="product-image" title="Fisher-Price Bubble Mower" href="#"><img width="80" alt="Fisher-Price Bubble Mower" src="{{ url($product1->url) }}"></a>
                                    <div class="product-details">
                                        <div class="access"> <a class="btn-remove1" title="Remove This Item" href="#"> <span class="icon"></span> Remove </a> </div>
                                        <p class="product-name"> <a href="#">{{ $product1->name }}</a> </p>
                                        <strong>1</strong> x <span class="price">{{ $product1->price }}</span> </div>
                                </li>
                            @endif
                            @if($product2)
                                <li class="item compare-item2"> <a class="product-image" title="Fisher-Price Bubble Mower" href="#"><img width="80" alt="Fisher-Price Bubble Mower" src="{{ url($product2->url) }}"></a>
                                    <div class="product-details">
                                        <div class="access"> <a class="btn-remove1" title="Remove This Item" href="#"> <span class="icon"></span> Remove </a> </div>
                                        <p class="product-name"> <a href="#">{{ $product2->name }}</a> </p>
                                        <strong>1</strong> x <span class="price">{{ $product2->price }}</span> </div>
                                </li>
                            </ul>
                            @endif
                            </div>
                            <div class="ajax-checkout">
                                {!! Form::open(['action' => 'User\CompareController@index', 'method' => 'get']) !!}
                                @if($product1 && $product2)
                                    <button class="button button-compare" title="Submit" type="submit">
                                        <span>{{ trans('user/label.compare') }}</span>
                                    </button>
                                @else
                                    <button class="button button-compare" title="Submit" type="submit" disabled>
                                        <span>{{ trans('user/label.compare') }}</span>
                                    </button>
                                @endif
                                {!! Form::close() !!}

                                {!! Form::open(['route' => 'compare.store', 'class' => 'destroy_compare']) !!}
                                    <button class="button button-clear clear_compare" type="button"><span>{{ trans('user/label.clear') }}</span></button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        </div>
                </aside>
            </div>
        </div>
    </section>

    @include('user.layouts.section.app_Parallax')
@endsection
