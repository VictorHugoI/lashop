@extends('admin.layouts.master')

@section('title', trans('admin/label.user_create'))

@section('heading', trans('admin/label.user_create'))

@section('content')
    {{ Form::open(['route' => 'admin.users.store']) }}
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('admin.users.components.form')
            </div>
        </div>
    {{ Form::close() }}
</section>
@endsection


