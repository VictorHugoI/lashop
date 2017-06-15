@extends('admin.layouts.master')

@section('title', trans('admin/label.product_edit'))

@section('heading', trans('admin/label.product_edit'))

@section('content')
    {{ Form::model($product, ['route' => ['admin.products.update', $product->id], 'method' => 'put']) }}
        <div class="row">
            <div class="col-md-10">
                @include('admin.products.components.form')
            </div>
        </div>
    {{ Form::close() }}
@endsection
