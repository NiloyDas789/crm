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
                @include('dashboard.application.editPage')
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

    <script>
        $('.checkTaskApplication').on('change', function(){
            let id = $(this).val();
            let applicationID = "{{$application->id}}";
            $.get("/application-taskcheck/"+id+"/"+applicationID, function (data) {
               location.reload();

            });
        });
    </script>

@endpush

