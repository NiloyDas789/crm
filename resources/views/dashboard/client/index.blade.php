@extends('layouts.master')

@section('title', 'Client')


@section('content')
<div class="container-fluid">
    <!-- start page title -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Client</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Client</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <div class="row mb-2">
                <div class="col-md-11">
                    <div class="mx-auto pull-right">
                        <div class="input-group mb-3">
                            {{ Form::text('q',null,['class'=>'form-control','id'=>'q','placeholder'=>__('Search Here....')]) }}
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-magnify"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-primary btn-md waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#create">Create</button>
                    <!-- sample modal content -->
                    <div id="create" class="modal modal-fullscreen-xl fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createLabel">Create Client</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                {{ Form::open(['route' => 'client.store', 'class' => 'needs-validation', 'novalidate','files' => true ]) }}
                                                                   @csrf
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
                                    @include('dashboard.client.form')
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Create</button>
                                </div>
                                {{ Form::close() }}
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    @include('dashboard.client.clientTable')
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
<link href="{{ asset('/') }}assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- DataTables -->
<link href="{{ asset('/') }}assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush
@push('script')
<script src="{{ asset('') }}assets/js/pages/form-validation.init.js"></script>
<script>
    $("#q").on('input', function() {
        var q = $(this).val();
        console.log(q);
        var csrf = "{{ @csrf_token() }}"
        $.ajax({
            url: "{{ route('client.search') }}",
            data: {
                _token: csrf,
                q: q
            },
            type: "POST",
        }).done(function(e) {
            console.log(e);
            $(".card-body").html(e);
        })
    })
</script>
<script>
    $('.select2').select2({
        dropdownParent: $('#create'),
        placeholder: 'Select an option',
        width: 'resolve'
    });

    function editData(id) {
        let data = $('#edit' + id)
        $('.select2').select2({
            dropdownParent: data,
            placeholder: 'Select an option'
        });
        console.log(aa)
    }
</script>

<script>
    var input = document.querySelector('.filestyle');

    input.addEventListener('change', function(event) {
        var preview = document.querySelector('#preview-wrap img');
        var previewSource = URL.createObjectURL(input.files[0]);
        preview.src = previewSource;
    });
</script>

<script>
    $('#country_id').change(function() {
        let id = $(this).val();
        let $options = $('#state_id').find('option');
        $options.remove().end();
        $.ajax({
            url: '{{ url('api/fetch-states') }}/' + id,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $.each(data, function(key, value) {
                    $("#state_id").append('<option value="' + key + '">' + value + '</option>');
                });
            }
        });
    });

    $('#state_id').change(function() {
        let id = $(this).val();
        console.log(id);
        let $options = $('#city_id').find('option');
        $options.remove().end();
        $.ajax({
            url: '{{ url('api/fetch-city') }}/' + id,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $.each(data, function(key, value) {
                    $("#city_id").append('<option value="' + key + '">' + value + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>

@endpush