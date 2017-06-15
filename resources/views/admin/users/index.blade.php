@extends('admin.layouts.master')

@section('title', trans('admin/label.user_index'))

@section('heading', trans('admin/label.user_index'))

@section('content')
<div class="table-toolbar">
	<div class="row">
	    <div class="col-md-6">
	        <div class="text-left">
                <a href="{{ route('admin.users.create') }}"
                    title="{{ trans('admin/label.index_user') }}"
                    class="btn btn-success btn-sm">
                    {{ trans('admin/label.new_user') }}
                </a>
            </div>
	    </div>
	    <div class="col-md-6">
	        
	    </div>
	</div>
</div>
<div class="table-responsive table-content">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="active">
                <th class="text-center">#</th>
                <th class="text-center">{{ trans('admin/label.user_name') }}</th>
                <th class="text-center">{{ trans('admin/label.email') }}</th>
                <th class="text-center">{{ trans('admin/label.role') }}</th>
                <th width="100px" class="text-center">{{ trans('admin/label.action') }}</th>
            </tr>
        </thead>

        <tbody>
            @empty($users->all())
                @include('admin._components.empty_rows', ['columns' => 5])
            @else
                @each('admin.users.components.table', $users, 'user')
            @endempty
        </tbody>
    </table>
</div>
@endsection
