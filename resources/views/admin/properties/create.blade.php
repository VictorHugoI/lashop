@extends('admin.layout.master')

@push('scripts')
    {{ Html::script('assets/admin/js/plugins/dataTables/datatables.min.js') }}
    <script>
        $('.btnEdit').on('click', function (e) {
            var btn = $(e.currentTarget);
            var id = btn.data('property-id');

            var label = btn.closest('.gradeU').find('.proper_label');
            var name = btn.closest('.gradeU').find('.proper_name')
            $.get('property/' + id+ '/edit', function (data) {
                console.log(data.view);
                $('.modal-dialog').html(data.view);

                $('.btnUpdate').click(function (e) {
                    var btnUpdate = $(e.currentTarget);
                    var form =btnUpdate.closest('.updateProper');
                    $.ajax({
                        url: form.attr('action'),
                        type: 'PUT',
                        data: form.serialize(),
                        success: function(data) {
                            label.html(data.label);
                            name.html(data.name);

                            $('#favoritesModal').hide();
                        }
                    });
                });
            });
        });

        $('.btnCreateProperty').on('click', function (e) {
            $('#overlay').fadeIn(200);
            $('.modalCreateProperty').fadeToggle(300);

            $('.btnSave').on('click', function (e) {
                var btn = $(e.currentTarget);
                var form = btn.closest('.createForm');
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(data) {
                        $('.table-responsive').html(data.table);
                        $('#overlay').hide();
                        $('.modalCreateProperty').hide();
                        loadDataTable();
                    }
                });
            });
        });

        $('.btnDelete').on('click', function(e) {

        });

        function loadDataTable() {
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                ]
            });
        }
        
        $(document).ready(function() {
            loadDataTable();
        });

    </script>
@endpush

@push('styles')
    {{ Html::style('assets/admin/css/plugins/dataTables/datatables.min.css') }}
@endpush

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Helper css classes</h2>
            <ol class="breadcrumb">
                <li>
                    <a>Home</a>
                </li>
                <li>
                    <a>Forms</a>
                </li>
                <li class="active">
                    <strong>Helper css classes</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

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
                            @include('admin.properties.component.table_property')
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
    @include('admin.properties.component.modal_create_property')
@endsection
