@extends('admin.layout.master')

@section('css')
{{ Html::style('assets/css/admin/category.min.css') }}
@endsection

@section('content')
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>List Category</h5>
				</div>
				<div class="ibox-content">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif (session('failure'))
                        <div class="alert alert-danger">
                            {{ session('failure') }}
                        </div>
                    @endif
					<section id="menu" style="margin-bottom: 10px;">
						<div id="function-icons">
							<button id="main-add" type="button" class="btn btn-primary">Add new category</button>
							<button id="save" type="button" class="btn btn-success">Save</button>
						</div>
					</section>
					<section class="gridster">
						<ul id="base-list">
						</ul>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
{{ Html::script('assets/js/admin/category.min.js') }}
@endpush
