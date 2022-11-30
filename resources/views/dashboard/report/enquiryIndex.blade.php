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
                    <div class="col-md-4">
                        <div class="btn-group">
                            <button type="button" class="btn btn-dark dropdown-toggle mr-2" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right: 5px">
                                Filter Search
                            </button>
                            <a href="{{ route('enquiry.report.index') }}" class="btn btn-primary">
                                Reload
                            </a>
                            <ul class="dropdown-menu" style="cursor: pointer">
                                <li><a class="dropdown-item" data-id="name">Name</a></li>
                                <li><a class="dropdown-item" data-id="email">Email</a></li>
                                <li><a class="dropdown-item" data-id="mobile">Mobile</a></li>
                                <li><a class="dropdown-item" data-id="higher_level_education">Higher Level Education </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form action="{{ route('enquiry.report.index') }}" method="get" class="row row-cols-lg-auto g-3 align-items-center" id="showFilter" style="display: none">
                            <input type="hidden" class="filterType" name="filterData">
                            <div class="col-12">
                                <label class="visually-hidden" for="query">Username</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="queryData" id="query" placeholder="Search Your Filter . . . .">
                                    <input type="hidden" class="form-control" name="queryType" id="queryType">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" id="submsitFilter" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Search
                                </button>
                                <button type="button" id="closeFilter" class="btn btn-info">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" id="table-data">
                         @include('dashboard.report.table.enTableData')

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
            console.log(filterData)
            $('#showFilter').show(); //show filter form
            $('#queryType').val('filterData'); // put filter type data into hidden input table
            $('.filterType').val(filterData); // put filter type data into hidden input table

        })
        // close filter form
        $("#closeFilter").on('click', function () {
            $('#showFilter').hide();
        });
    </script>

@endpush

