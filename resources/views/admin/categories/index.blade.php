@extends('admin.layouts.master')

@section('title', trans('admin/label.categories_index'))

@section('heading', trans('admin/label.categories_index'))

@section('content')
<div class="table-toolbar">
	<div class="row">
	    <div class="col-md-6">
	        <div class="text-left">
                <a href="{{ route('admin.categories.create') }}"
                    title="{{ trans('admin/label.new_category') }}"
                    class="btn btn-success btn-sm">
                    {{ trans('admin/label.new_category') }}
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
                <th>{{ trans('admin/label.category_name') }}</th>
                <th class="text-center">{{ trans('admin/label.url_category') }}</th>
                <th width="100px" class="text-center">{{ trans('admin/label.action') }}</th>
            </tr>
        </thead>

        <tbody>
            @empty($categories->all())
                @include('admin._components.empty_rows', ['columns' => 4])
            @else
                @each('admin.categories.components.table', $categories, 'category')
            @endempty
        </tbody>
    </table>
</div>
@endsection
