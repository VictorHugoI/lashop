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
            success: function(data) {
               $('.listProduct').html(data.view);
            },
        });
    });
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
                        <input type="text" id="product_name" name="product_name" value=""
                               placeholder="Product Name" class="form-control">

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label" for="status">Category</label>
                        {!! Form::open(['route' => ['product.index'], 'method' => 'GET', 'class' => 'selectCategoryForm']) !!}
                            {!! Form::select('category', ['0' => ' All product... '] + $categories, null,
                                 ['class' => 'form-control selectCategory', 'id' => 'category']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label" for="price">Brand</label>
                        {!! Form::select('brand_id', $brands, null,
                                            ['class' => 'form-control brands', 'id' => 'brands']) !!}
                    </div>
                </div>
                {{--<div class="col-sm-2">
                    <div class="form-group">
                        <a class="btn btn-primary btnSaveProduct" href="{{ route('product.create') }}">
                            Create product
                        </a>
                    </div>
                </div>--}}
            </div>
        </div>

        <div class="row listProduct">
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="ibox">
                    <div class="ibox-content product-box">
                        <div class="product-imitation">

                            <img src="{{ url($product->image) }}" style="width: 287px; height: 200px">

                        </div>
                        <div class="product-desc">
                                <span class="product-price">
                                    ${{ $product->price }}
                                </span>
                            <small class="text-muted">Category</small>
                            <a class="product-name"> {{ $product->name }}</a>
                            <div class="m-t text-righ">
                                @if($product->productProperties->count())
                                    <a class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                @else
                                    <a class="btn btn-xs btn-outline btn-danger">None property  </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div id="small-chat">
        <li class="btnRotate">
            <a href="{{ route('product.create') }}" class="round green" style="color: white; font-weight: 800;">+
                <span class="round">Create new product.</span>
            </a>
        </li>
    </div>
@endsection

