{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

@extends('layouts.app')
@section('title','Login')
@section('content')
    <div class="col-xl-4 col-lg-6 col-md-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="">
                    <div class="text-center">
                        <a href="index.html" class="">
                            <img src="{{ asset('') }}/assets/images/logo-dark.png" alt="" height="24"
                                class="auth-logo logo-dark mx-auto">
                            <img src="{{ asset('') }}/assets/images/logo-light.png" alt="" height="24"
                                class="auth-logo logo-light mx-auto">
                        </a>
                    </div>
                    <!-- end row -->
                    <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4>
                    <p class="mb-5 text-center">Sign in to continue to  <a href="https://niloydas.net/">Niloy Das</a>.</p>
                        {{ Form::open(['method' => 'POST', 'route' => 'login', 'class' => 'form-horizontal']) }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-4">
                                        {{ Form::label('email', 'Email') }}
                                        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email', 'required' => 'required']) }}
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} mb-4">
                                        {{ Form::label('password', 'Password') }}
                                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter password', 'required' => 'required']) }}
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customControlInline">
                                                <label class="form-label" class="form-check-label"
                                                    for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="text-md-end mt-3 mt-md-0">
                                                <a href="{{ route('password.request') }}" class="text-muted"><i
                                                        class="mdi mdi-lock"></i>
                                                    {{ __('Forgot your password?') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid mt-4">
                                        {{ Form::button('Log In', ['class' => 'btn btn-primary waves-effect waves-light', 'type' => 'submit']) }}
                                    </div>
                                </div>
                            </div>
                        {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <p class="text-white-50">Don't have an account ? <a href="{{ route('register') }}"
                    class="fw-medium text-primary">
                    Register </a> </p>
            <p class="text-white-50">©
                <script>
                    document.write(new Date().getFullYear())
                </script> <a href="https://niloydas.net/">Niloy Das</a> <i
                    class="mdi mdi-heart text-danger"></i> by MRBDL
            </p>
        </div>
    </div>
@endsection
