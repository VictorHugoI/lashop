@extends('admin.layouts.master')

@section('title', trans('admin/label.products_index'))

@section('heading', trans('admin/label.products_index'))

@section('content')
<div class="table-toolbar">
	<div class="row">
	    <div class="col-md-6">
	        <div class="text-left">
                <a href="{{ route('admin.products.create') }}"
                    title="{{ trans('admin/label.new_product') }}"
                    class="btn btn-success btn-sm">
                    {{ trans('admin/label.new_product') }}
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
                <th class="text-center">{{ trans('admin/label.product_name') }}</th>
                <th class="text-center">{{ trans('admin/label.url_product') }}</th>
                <th class="text-center">{{ trans('admin/label.product_price') }}</th>
                <th class="text-center">{{ trans('admin/label.product_price_sale') }}</th>
                <th width="100px" class="text-center">{{ trans('admin/label.action') }}</th>
            </tr>
        </thead>

        <tbody>
            @empty($products->all())
                @include('admin._components.empty_rows', ['columns' => 6])
            @else
                @each('admin.products.components.table', $products, 'product')
            @endempty
        </tbody>
    </table>
</div>
<div class="text-right">
    {{ $products->appends(request()->all())->links() }}
</div>
@endsection
