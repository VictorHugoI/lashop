@extends('admin.layout.master')
@push('scripts')
    {{ Html::script('assets/admin/js/datatables.min.js') }}
    {{ Html::script('assets/admin/js/page/property.js') }}
@endpush
@push('styles')
    {{ Html::style('assets/admin/css/datatables.min.css') }}
@endpush
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Basic Data Tables example with responsive plugin</h5>
                    </div>
                    <div class="ibox-content">
                        <button class="btn btn-primary btnCreateProperty" type="button" style="margin-bottom: 15px">
                            <i class="fa fa-plus"></i>&nbsp;&nbsp;
                            <span class="bold">New property</span>
                        </button>
                        <div class="table-responsive">
                            @include('admin.properties.table_property')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="favoritesModal" tabindex="-1" role="dialog"
         aria-labelledby="favoritesModalLabel" style="top: 30%;">
        <div class="modal-dialog" role="document">

        </div>
    </div>
    @include('admin.properties.modal_create_property')
@endsection
