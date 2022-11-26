@extends('layouts.master')

@section('title', 'Application Report')


@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Application Report</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Application Report</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="row mb-2">
                    <div class="col-md-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter Search
                            </button>
                            <ul class="dropdown-menu" style="cursor: pointer">
                                <li><a class="dropdown-item" data-id="client_id">Name</a></li>
                                <li><a class="dropdown-item" data-id="workflow_id">Workflows</a></li>
                                <li><a class="dropdown-item" data-id="partner_id">Partner</a></li>
                                <li><a class="dropdown-item" data-id="product_id">Product </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <form class="row row-cols-lg-auto g-3 align-items-center" id="showFilter" style="display: none">
                            <div class="col-12">
                                <label class="visually-hidden" for="query">Username</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="query" id="query" placeholder="Search Your Filter . . . .">
                                    <input type="hidden" class="form-control" name="queryType" id="queryType">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button" id="submitFilter" class="btn btn-primary">Submit</button>
                                <button type="button" id="closeFilter" class="btn btn-info">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                         @include('dashboard.report.application.reportTable')

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


        $(".dropdown-item").on('click', function () {
            // get filter type
            let filterData  = $(this).data("id");

            $('#showFilter').show(); //show filter form
            $('#queryType').val('filterData'); // put filter type data into hidden input table

            // submit filter
            $('#submitFilter').on('click', function(){
                let queryData = $('#query').val();
                $.ajax({
                    url:"{{route('application.report.search')}}",
                    method:"GET",
                    data: {filterData, queryData},
                    success: function (response) {
                          $(".card-body").html(response);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            })
        })
        // close filter form
        $("#closeFilter").on('click', function () {
            $('#showFilter').hide();
        });
    </script>

@endpush

