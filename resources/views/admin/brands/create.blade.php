@extends('admin.layouts.master')

@section('title', trans('admin/label.brand_create'))

@section('heading', trans('admin/label.brand_create'))

@section('content')
    {{ Form::open(['route' => 'admin.brands.store']) }}
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('admin.brands.components.form')
            </div>
        </div>
    {{ Form::close() }}
</section>
@endsection


