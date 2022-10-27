@extends('layouts.master')

@section('title', 'Company Setting')


@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Company Setting</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Company Setting</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row d-flex justify-content-center">
            <div class="col-9">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{ Form::model($company_setting, ['route' => ['company.update', $company_setting->id], 'method' => 'Post', 'files' => true, 'class' => 'form-horizontal needs-validation', 'novalidate']) }}
                <div class="card card-border-primary">
                    <div class="card-header">
                        <h4 class="mb-0">Default Setting</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-3">
                            {{ Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name', 'required' => 'required']) }}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mobile1') ? ' has-error' : '' }} mb-3">
                            {{ Form::label('mobile1', 'Mobile Number', ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                {{ Form::text('mobile1', null, ['class' => 'form-control', 'placeholder' => 'Enter mobile number', 'required' => 'required']) }}
                                <small class="text-danger">{{ $errors->first('mobile1') }}</small>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile2') ? ' has-error' : '' }} mb-3">
                            {{ Form::label('mobile2', 'Mobile Number', ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                {{ Form::text('mobile2', null, ['class' => 'form-control', 'placeholder' => 'Enter mobile number', 'required' => 'required']) }}
                                <small class="text-danger">{{ $errors->first('mobile2') }}</small>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-3">
                            {{ Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email', 'required' => 'required']) }}
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }} mb-3">
                            {{ Form::label('location', 'Location', ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                {{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Enter location', 'required' => 'required']) }}
                                <small class="text-danger">{{ $errors->first('location') }}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }} mb-3">
                                    {{ Form::label('logo', 'Logo', ['class' => 'col-sm-3 control-label']) }}
                                    <div class="col-sm-9">
                                        {{ Form::file('logo', ['class' => 'filestyle']) }}
                                        {{-- <p class="help-block">Help block text</p> --}}
                                        <small class="text-danger">{{ $errors->first('logo') }}</small>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('footer_logo') ? ' has-error' : '' }} mb-3">
                                    {{ Form::label('footer_logo', 'Footer Logo', ['class' => 'col-sm-3 control-label']) }}
                                    <div class="col-sm-9">
                                        {{ Form::file('footer_logo', ['class' => 'filestyle']) }}
                                        {{-- <p class="help-block">Help block text</p> --}}
                                        <small class="text-danger">{{ $errors->first('footer_logo') }}</small>
                                    </div>
                                </div>


                            </div>

                        </div>




                    </div>
                </div>
                <div class="card card-border-primary">
                    <div class="card-header">
                        <h4 class="mb-0">Social Links</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }} mb-3">
                                    {{ Form::label('facebook', 'FaceBook', ['class' => 'col-sm-3 control-label']) }}
                                    <div class="col-sm-9">
                                        {{ Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'Enter facebook link', 'required' => 'required']) }}
                                        <small class="text-danger">{{ $errors->first('facebook') }}</small>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }} mb-3">
                                    {{ Form::label('twitter', 'Twitter', ['class' => 'col-sm-3 control-label']) }}
                                    <div class="col-sm-9">
                                        {{ Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'Enter twitter link', 'required' => 'required']) }}
                                        <small class="text-danger">{{ $errors->first('twitter') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary w-md  waves-effect waves-light">Submit</button>

                    </div>
                </div>



                {{ Form::close() }}




            </div> <!-- end col -->
        </div>
        <!-- end row -->



    </div>
@endsection
@push('script')
    <script src="{{ asset('') }}assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>
    <script src="assets/js/pages/form-validation.init.js"></script>
@endpush

@push('style')
    <link href="{{ asset('') }}assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
@endpush
