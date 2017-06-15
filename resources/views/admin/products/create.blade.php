@extends('admin.layouts.master')

@section('title', trans('admin/label.product_create'))

@section('heading', trans('admin/label.product_create'))

@section('content')
    {{ Form::open(['route' => 'admin.products.store']) }}
        <div class="row">
            <div class="col-md-10">
                @include('admin.products.components.form')
            </div>
        </div>
    {{ Form::close() }}
</section>
@endsection


