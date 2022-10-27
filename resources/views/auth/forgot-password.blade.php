{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

@extends('layouts.app')
@section('title','Forget-password')
@section('content')
    <div class="col-xl-4 col-lg-6 col-md-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="">
                    <div class="text-center">
                        <a href="index.html" class="">
                            <img src="assets/images/logo-dark.png" alt="" height="24"
                                class="auth-logo logo-dark mx-auto">
                            <img src="assets/images/logo-light.png" alt="" height="24"
                                class="auth-logo logo-light mx-auto">
                        </a>
                    </div>
                    <!-- end row -->
                    <h4 class="font-size-18 text-muted mt-2 text-center">Reset Password</h4>
                    <p class="mb-5 text-center">Reset your Password with  <a href="https://niloydas.net/">Niloy Das</a>.</p>
                        {{ Form::open(['method' => 'POST', 'route' => 'password.email', 'class' => 'form-horizontal']) }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    Enter your <b>Email</b> and instructions will be sent to you!
                                </div>
                                <div class="mt-4">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::text('email', null, ['class' => 'form-control','placeholder'=>'Enter email', 'required' => 'required']) }}
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    {{ Form::submit('Send Email', ['class' => 'btn btn-primary waves-effect waves-light']) }}
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <p class="text-white-50">Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary">
                    Register </a> </p>
            <p class="text-white-50">©
                <script>
                    document.write(new Date().getFullYear())
                </script> <a href="https://niloydas.net/">Niloy Das</a>. Crafted with <i class="mdi mdi-heart text-danger"></i> by MRBDL
            </p>
        </div>
    </div>
@endsection
