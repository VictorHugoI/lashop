@extends('user.layouts.applayout')
@section('content')
    @if((!$product1 && $product2) || ($product1 && !$product2))
        <section class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="cart wow">
                        <div class="page-title">
                            <h2>{{ trans('user/label.dont_compare') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif(!$product1 && !$product2)
        <section class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="cart wow">
                        <div class="page-title">
                            <h2>{{ trans('user/label.must_add_compare') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="cart wow">
                        <div class="page-title">
                            <h2>{{ trans('user/label.compare_product') }}</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped compare-table">
                                <colgroup>
                                    <col width="1">
                                    <col width="50%">
                                    <col width="50%">
                                </colgroup>
                                <tbody>
                                <tr class="product-shop-row first odd">
                                    <th>&nbsp;</th>
                                    <td>
                                        <a class="product-image" href="#" title="Azrouel Dress">
                                            <img src="{{ url($product1->url) }}" alt="Azrouel Dress" width="200">
                                        </a>
                                        <h2 class="product-name"><a href="#" title="Azrouel Dress">{{ $product1->name }}</a></h2>
                                        <div class="price-box">
                                            @if( $product1->price_sale !== NULL )
                                                <p class="special-price"> <span class="price"> {{ $product1->price_sale }} </span> </p>
                                                <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{ $product1->price }} </span> </p>
                                            @else
                                                <p class="special-price"> <span class="price"> {{ $product1->price }} </span> </p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <a class="product-image" href="#" title="Azrouel Dress">
                                            <img src="{{ url($product2->url) }}" alt="Azrouel Dress" width="200">
                                        </a>
                                        <h2 class="product-name"><a href="#" title="Azrouel Dress">{{ $product2->name }}</a></h2>
                                        <div class="price-box">
                                            @if( $product2->price_sale !== NULL )
                                                <p class="special-price"> <span class="price"> {{ $product2->price_sale }} </span> </p>
                                                <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{ $product2->price }} </span> </p>
                                            @else
                                                <p class="special-price"> <span class="price"> {{ $product2->price }} </span> </p>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                                <tbody>
                                <tr class="even">
                                    <th>{{ trans('user/label.brand') }}</th>
                                    <td><div> {{ $product1->brand->name }} </div></td>
                                    <td><div> {{ $product2->brand->name }} </div></td>
                                </tr>
                                <tr class="odd">
                                    <th>{{ trans('user/label.age') }}</th>
                                    <td><div> {{ $product1->age }} </div></td>
                                    <td><div> {{ $product2->age}} </div></td>
                                </tr>
                                <tr class="even">
                                    <th>{{ trans('user/label.vintage') }}</th>
                                    <td><div> {{ $product1->vintage }} </div></td>
                                    <td><div> {{ $product2->vintage}} </div></td>
                                </tr>
                                <tr class="odd">
                                    <th>{{ trans('user/label.country') }}</th>
                                    <td><div> {{ $product1->country }} </div></td>
                                    <td><div> {{ $product2->country}} </div></td>
                                </tr>
                                <tr class="even">
                                    <th>{{ trans('user/label.volume') }}</th>
                                    <td><div> {{ $product1->volume }} </div></td>
                                    <td><div> {{ $product2->volume}} </div></td>
                                </tr>
                                <tr class="odd">
                                    <th>{{ trans('user/label.material') }}</th>
                                    <td><div> {{ $product1->material }} </div></td>
                                    <td><div> {{ $product2->material}} </div></td>
                                </tr>
                                <tr class="even">
                                    <th>{{ trans('user/label.descriptions') }}</th>
                                    <td>{!! $product1->description !!}</td>
                                    <td>{!! $product2->description !!}</td>
                                </tr>
                                </tbody>
                                <tbody>
                                <tr class="add-to-row last odd text-center">
                                    <th></th>
                                    <td>
                                        <p>
                                            <button type="button" title="Add to Cart" class="button"><span><span>Add to Cart</span></span></button>
                                        </p>
                                        <a href="#" class="button wishlist">Add to Wishlist</a></td>
                                    <td>
                                        <p>
                                            <button type="button" title="Add to Cart" class="button"><span><span>Add to Cart</span></span></button>
                                        </p>
                                        <a href="#" class="button wishlist">Add to Wishlist</a></td>
                                </tr>
                                </tbody>
                            </table></div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
