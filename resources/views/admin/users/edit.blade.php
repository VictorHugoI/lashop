@extends('admin.layouts.master')

@section('title', trans('admin/label.user_edit'))

@section('heading', trans('admin/label.user_edit'))

@section('content')
    {{ Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'put']) }}
    	{!! Form::hidden('id', $user->id)!!}
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('admin.users.components.form')
            </div>
        </div>
    {{ Form::close() }}
@endsection
