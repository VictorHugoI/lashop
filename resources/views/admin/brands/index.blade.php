@extends('admin.layouts.master')

@section('title', trans('admin/label.brand_index'))

@section('heading', trans('admin/label.brand_index'))

@section('content')
<div class="table-toolbar">
	<div class="row">
	    <div class="col-md-6">
	        <div class="text-left">
                <a href="{{ route('admin.brands.create') }}"
                    title="{{ trans('admin/label.index_brand') }}"
                    class="btn btn-success btn-sm">
                    {{ trans('admin/label.new_brand') }}
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
                <th>{{ trans('admin/label.brand_name') }}</th>
                <th class="text-center">{{ trans('admin/label.url_brand') }}</th>
                <th width="100px" class="text-center">{{ trans('admin/label.action') }}</th>
            </tr>
        </thead>

        <tbody>
            @empty($brands->all())
                @include('admin._components.empty_rows', ['columns' => 4])
            @else
                @each('admin.brands.components.table', $brands, 'brand')
            @endempty
        </tbody>
    </table>
</div>
@endsection
