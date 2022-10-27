@extends('layouts.master')

@section('title', 'Role')


@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">role</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">role</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary btn-md waves-effect waves-light" href="{{ route('roles.create') }}">Create</i></a>
{{--                                <button type="button" class="btn btn-primary btn-md waves-effect waves-light"--}}
{{--                                        data-bs-toggle="modal" data-bs-target="#create">Create</button>--}}
{{--                                <!-- sample modal content -->--}}
{{--                                <div id="create" class="modal fade" tabindex="-1" role="dialog"--}}
{{--                                     aria-labelledby="createLabel" aria-hidden="true">--}}
{{--                                    <div class="modal-dialog">--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <h5 class="modal-title" id="createLabel">Create role</h5>--}}
{{--                                                <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                        aria-label="Close"></button>--}}
{{--                                            </div>--}}
{{--                                            {{ Form::open(['route' => 'roles.store', 'class' => 'needs-validation', 'novalidate']) }}--}}
{{--                                            <div class="modal-body">--}}
{{--                                                @if ($errors->any())--}}
{{--                                                    <div class="alert alert-danger">--}}
{{--                                                        <ul>--}}
{{--                                                            @foreach ($errors->all() as $error)--}}
{{--                                                                <li>{{ $error }}</li>--}}
{{--                                                            @endforeach--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                                @include('dashboard.role.form')--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-footer">--}}
{{--                                                <button type="button" class="btn btn-secondary waves-effect"--}}
{{--                                                        data-bs-dismiss="modal">Close</button>--}}
{{--                                                <button type="submit"--}}
{{--                                                        class="btn btn-primary waves-effect waves-light">Create</button>--}}
{{--                                            </div>--}}
{{--                                            {{ Form::close() }}--}}
{{--                                        </div><!-- /.modal-content -->--}}
{{--                                    </div><!-- /.modal-dialog -->--}}
{{--                                </div><!-- /.modal -->--}}
                            </div>
                        </div>
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>{{ __('ID')}}</th>
                                <th>{{ __('Name') }}</th>
                                <th class="action">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->sl}}</td>
                                    <td>{{ $role->name }}</td>
                                    <td nowrap="nowrap">
                                         <a class="btn btn-primary btn-md waves-effect waves-light" href="{{ route('roles.edit', $role->id) }}"><i class="fas fa-edit"></i></a>
                                        {{-- Edit Modal --}}
{{--                                        <button type="button" onclick="editData({{$role->id}})" class="btn btn-primary btn-md waves-effect waves-light"--}}
{{--                                                data-bs-toggle="modal" data-bs-target="#edit{{$role->id}}"><i--}}
{{--                                                class="fas fa-edit"></i></button>--}}
                                        <!-- sample modal content -->
                                        <div id="edit{{$role->id}}" class="modal fade" tabindex="-1" role="dialog"
                                             aria-labelledby="editLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editLabel">Edit role</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    {{ Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) }}
                                                    <div class="modal-body">
                                                        @if ($errors->any())
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                        @include('dashboard.role.form')
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect"
                                                                data-bs-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light">Update</button>
                                                    </div>
                                                    {{ Form::close() }}
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        {{ Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) }}
                                        {{ Form::button('<i class="fas fa-trash"  aria-hidden="true"></i>', ['class' => 'btn btn-danger btm-md', 'type' => 'submit']) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
@endsection
@push('style')
    <style>
        .action {
            width: 120px;
        }
    </style>
@endpush
@push('script')
    <script src="{{ asset('') }}assets/js/pages/form-validation.init.js"></script>
    <script>
        $('.select2').select2({
            dropdownParent: $('#create'),
            placeholder: "Select a state",
        });

        function editData(id){
            let data = $('#edit'+id)
            $('.select2').select2({
                dropdownParent: data,
                placeholder: "Select Options",
            });
            console.log(data)
        }
    </script>


@endpush


