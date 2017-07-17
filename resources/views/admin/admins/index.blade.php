@extends('admin.admins.layout.master')
@section('main')
<div class="table-toolbar">
    <div class="row">
        <div class="col-md-6">
            <div class="text-left">
                <a href="{{ route('admins.create') }}"
                    title="{{ trans('admin/label.index_user') }}"
                    class="btn btn-success btn-sm">
                    Create new user
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
                <th class="text-center">User name</th>
                <th class="text-center">Email</th>
            </tr>
        </thead>
        <tbody>
            @empty($admins->all())
            {{-- @include('admin._components.empty_rows', ['columns' => 5]) --}}
            @else
            @each('admin.admins.components.table', $admins, 'admins')
            @endempty
        </tbody>
    </table>
</div>
@endsection