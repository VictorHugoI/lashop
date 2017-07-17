@extends('admin.admins.layout.master')

@section('main')
    {{ Form::open(['route' => 'admins.store']) }}
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('admin.admins.components.form')
            </div>
        </div>
    {{ Form::close() }}
</section>
@endsection


