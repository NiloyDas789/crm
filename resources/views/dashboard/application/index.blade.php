@extends('layouts.master')

@section('title', 'Application')


@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Application</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Application</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="row mb-2">
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary btn-md waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target="#create">Create</button>
                        <!-- sample modal content -->
                        <div id="create" class="modal fade" tabindex="-1" role="dialog"
                             aria-labelledby="createLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createLabel">Create Application</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    {{ Form::open(['route' => 'application.store', 'class' => 'needs-validation', 'novalidate']) }}
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
                                        @include('dashboard.application.form')
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect"
                                                data-bs-dismiss="modal">Close</button>
                                        <button type="submit"
                                                class="btn btn-primary waves-effect waves-light">Create</button>
                                    </div>
                                    {{ Form::close() }}
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                    </div>
                </div>
                @include('dashboard.application.showPage')
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
    <!-- Responsive datatable examples -->
    <link href="{{ asset('/') }}assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="{{ asset('/') }}assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('/') }}assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
@endpush
@push('script')
    <script src="{{ asset('') }}assets/js/pages/form-validation.init.js"></script>
    <script>
        $("#q").on('input', function () {
            var q = $(this).val();
            console.log(q);
            var csrf = "{{ @csrf_token() }}"
            $.ajax({
                url: "{{ route('application.search') }}",
                data: {
                    _token: csrf,
                    q: q
                },
                type: "POST",
            }).done(function (e) {
                console.log(e);
                $(".card-body").html(e);
            })
        })
    </script>

@endpush

