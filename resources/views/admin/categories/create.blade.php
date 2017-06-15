@extends('admin.layouts.master')

@section('title', trans('admin/label.categories_create'))

@section('heading', trans('admin/label.categories_create'))

@section('content')
    {{ Form::open(['route' => 'admin.categories.store']) }}
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('admin.categories.components.form')
            </div>
        </div>
    {{ Form::close() }}
</section>
@endsection


