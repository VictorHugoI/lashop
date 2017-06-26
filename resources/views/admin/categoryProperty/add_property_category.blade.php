@extends('admin.layout.master')

@push('scripts')
    {{ Html::script('assets/admin/js/plugins/dataTables/datatables.min.js') }}
    <script>
        $('#categories').on('change', function (e) {
            var id = $(e.currentTarget).val();

            $.get('categoryProperty/' + id, function (data) {
                $('.table-responsive').html(data.view);
                loadDataTable();
                changechosenBox();
            })
        });
        function loadDataTable() {
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: []
            });
        }
        $(document).ready(function() {
            loadDataTable();
        });
        $('.btnCreateProperty').on('click', function (e) {
            $('#overlay').fadeIn(200);
            $('.createForm').fadeToggle(300);

            $('.inputCateId').html('<input name="catetegoryId" style="display: none" value="' + $('#categories').val() + '">');

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
                        changechosenBox();
                    },

                });
            });
        });
        $('.closeModal').on('click', function (e) {
            $('#overlay').hide();
            $('.createForm').hide();
        });

        function changechosenBox() {
          $('.chosenBox').on('change', function (e) {
              var cbox = $(e.currentTarget);
              var form = cbox.closest('.tableProperty');

              $.ajax({
                  url: form.attr('action'),
                  type: 'GET',
                  data: form.serialize(),
                  success: function(data) {
                      $('.table-responsive').html(data.view);
                  }
              });
          });
        };
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
                        <div class="col-sm-4">
                            {!! Form::select('categories', ['0' => ' Pick a parent category... '] + $categories, null,
                            ['class' => 'form-control', 'id' => 'categories']) !!}
                        </div>
                        <br><br>
                        <div class="hr-line-dashed"></div>
                        <div class="table-responsive">

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

    <div id="small-chat">
        <a class="add-property-button btnCreateProperty">
            <i class="fa fa-plus"></i>
        </a>
    </div>

    @include('admin.properties.component.modal_create_property')

@endsection
