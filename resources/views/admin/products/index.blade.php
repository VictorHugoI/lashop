@extends('admin.layout.master')
@push('scripts')
    {{ Html::script('assets/admin/js/plugins/select2/select2.full.min.js') }}
<script>
    $(".selectCategory").select2();
    $('.brands').select2();
    $('.selectCategory').on('change', function (e) {
        var btn = $(e.currentTarget);
        var form = btn.closest('.selectCategoryForm');

        $.ajax({
            url: form.attr('action'),
            type: 'GET',
            data: form.serialize(),
            success: function (data) {
                $('.listProduct').html(data.view);
                $('.selectBrandForm').html(data.select);
                loadSelect2();
                searchProduct();
            },
        });
    });
    $('.btnInfo').on('click', function (e) {
        var url = $(this).data('url');
        $.get(url, function (data) {
            $('.modalDetailProduct').html(data.view);
        })
    })
</script>
@endpush
@push('styles')
{{ Html::style('assets/admin/css/plugins/select2/select2.min.css') }}
{{ Html::style('assets/admin/css/style.css') }}
@endpush
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>E-commerce grid</h2>
            <ol class="breadcrumb">
                <li>
                    <a>Home</a>
                </li>
                <li>
                    <a>E-commerce</a>
                </li>
                <li class="active">
                    <strong>Products grid</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox-content m-b-sm border-bottom">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="product_name">Product Name</label>
                        {!! Form::open(['route' => 'product.search', 'class' => 'searchForm', 'onsubmit' => 'return false;']) !!}
                        {!! Form::text('product_name', '', [
                            'class' => 'form-control',
                            'placeholder' => 'Product Name',
                            'id' => 'product_name',
                            'data-url' => url('admin/product/search'),
                        ]) !!}
                        {!! Form::close() !!}
                        <ul class="dropdown-menu dropdown-messages searchItem" style="width: 80%; margin-left: 15px;">

                        </ul>
                    </div>
                </div>
                {!! Form::open(['route' => ['product.index'], 'method' => 'GET', 'class' => 'selectCategoryForm']) !!}
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label" for="status">Category</label>

                        {!! Form::select('category', ['0' => ' All product... '] + $categories, null,
                             ['class' => 'form-control selectCategory', 'id' => 'category']) !!}
                    </div>
                </div>
                <div class="col-sm-3 selectBrandForm">
                    <div class="form-group">
                        <label class="control-label" for="price">Brand</label>
                        {!! Form::select('brand_id', ['0' => ' All brands... '] + $brands, null,
                            ['class' => 'form-control selectBrand', 'id' => 'brands']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row listProduct">
            @foreach($products as $product)
            <div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div class="product-imitation">
                                <img src="{{ url('assets/images/products-images/product6.jpg') }}"
                                     style="width: 287px; height: 200px">
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    ${{ $product->price }}
                                </span>
                                <small class="text-muted">Category: {{ $product->category->name }}</small> <br>
                                <small class="text-muted">Brand: {{ $product->brand['name'] }}</small>
                                <a class="product-name"> {{ $product->name }}</a>
                                <div class="m-t text-righ">
                                    @if($product->productProperties->count())
                                        <a class="btn btn-xs btn-outline btn-primary btnInfo" data-toggle="modal"
                                           data-target="#myModal2"
                                           data-url="{{ route('product.show', $product->id) }}" >Info
                                            <i class="fa fa-long-arrow-right"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-xs btn-outline btn-danger"
                                           href="{{ route('product.addProperties', $product->id) }}">None property </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="row wrapper border-bottom white-bg page-heading" style="text-align: center; padding: 0px">
        {{ $products->links() }}
    </div>
    <div id="small-chat">
        <li class="btnRotate">
            <a href="{{ route('product.create') }}" class="round green" style="color: white; font-weight: bold;">+
                <span class="round">Create new product.</span>
            </a>
        </li>
    </div>

    <div class="modal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modalDetailProduct" style="margin: 50px auto; width: 800px">

        </div>
    </div>
@endsection

