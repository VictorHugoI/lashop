@extends('admin.layouts.master')

@section('title', trans('admin/label.brand_edit'))

@section('heading', trans('admin/label.brand_edit'))

@section('content')
    {{ Form::model($brand, ['route' => ['admin.brands.update', $brand->id], 'method' => 'put']) }}
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('admin.brands.components.form')
            </div>
        </div>
    {{ Form::close() }}
@endsection
