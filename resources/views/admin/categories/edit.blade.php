@extends('admin.layouts.master')

@section('title', trans('admin/label.categories_edit'))

@section('heading', trans('admin/label.categories_edit'))

@section('content')
    {{ Form::model($category, ['route' => ['admin.categories.update', $category->id], 'method' => 'put']) }}
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('admin.categories.components.form')
            </div>
        </div>
    {{ Form::close() }}
@endsection
