@extends('admin.layout.master')

@section('content')
@push('scripts')
    <script>
        $( document ).ready(function() {
            $(document).on('keyup', '.imputupdate', function() {
                var id = $(this).attr('data-id');
                $('#buttonupdate' + id ).removeClass('hide');
            });
            $(document).on('click', ".laupdate", function() {
                var id = $(this).attr('data-id');
                var url = $(this).attr('data-url');
                var value = $("#value" + id).val();
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {_method:'PUT',value: value, id: id},
                    success: function(data) {
                        $(".hasStatus" + id).html(data);
                        $(".hasStatus" + id).addClass('text-success');
                        $(".hasStatus" + id).removeClass('text-danger');
                        $(".hasStatus" + id).slideDown(function() {
                            setTimeout(function() {
                                $(".hasStatus" + id).slideUp();
                            }, 5000);
                        });
                    },
                    error: function(data) {
                        $(".hasStatus" + id).addClass('text-danger');
                        $(".hasStatus" + id).removeClass('text-success');
                        $(".hasStatus" + id).html(data.responseJSON.value[0]);
                        //$("#id").css("display", "block");
                        $(".hasStatus" + id).slideDown(function() {
                            setTimeout(function() {
                                $(".hasStatus" + id).slideUp();
                            }, 5000);
                        });
                    }
                });
            });
        });
    </script>
@endpush
    <div class="row">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Setting </h5>

                </div>
                <div class="ibox-content" style="display: block;">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($settings as $setting)
                            <tr>
                                <td>{{ $setting->id }}</td>
                                <td><strong>{{ $setting->title }}</strong></td>
                                <td><input id="value{{ $setting->id }}" data-id="{{ $setting->id }}" type="text" class="form-control imputupdate" value="{{ $setting->value}}" >
                                    <i>{{ $setting->description }}</i><br/>
                                    <strong><i class=" text-danger hasStatus{{ $setting->id }} ">
                                    </i></strong>
                                </td>
                                <td><button id="buttonupdate{{ $setting->id }}" data-id="{{ $setting->id }}" data-url="{{ route('setting.update', $setting->id) }}" data-type="{{ $setting->type }}" type="button" class="btn btn-w-m btn-success laupdate hide">Update</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
@endsection
