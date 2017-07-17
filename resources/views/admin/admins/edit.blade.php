@extends('admin.admins.layout.master')

@section('main')
    {{ Form::model($admin, ['route' => ['admins.update', $admin->id], 'method' => 'put']) }}
    	{!! Form::hidden('id', $admin->id)!!}
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('admin.admins.components.form')
            </div>
        </div>
    {{ Form::close() }}
@endsection
