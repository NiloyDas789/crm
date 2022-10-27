{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

@extends('layouts.app')
@section('title','Register')
@section('content')
    <div class="col-xl-4 col-lg-6 col-md-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="text-center">
                    <a href="index.html" class="">
                        <img src="assets/images/logo-dark.png" alt="" height="24"
                            class="auth-logo logo-dark mx-auto">
                        <img src="assets/images/logo-light.png" alt="" height="24"
                            class="auth-logo logo-light mx-auto">
                    </a>
                </div>

                <h4 class="font-size-18 text-muted text-center mt-2">Free Register</h4>
                <p class="text-muted text-center mb-4">Get your free Upzet account now.</p>
                    {{ Form::open(['method' => 'POST', 'route' => 'register', 'class' => 'form-horizontal']) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-4">
                                {{ Form::label('name', 'User Name') }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter username', 'required' => 'required']) }}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-4">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email', 'required' => 'required']) }}
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} mb-4">
                                {{ Form::label('password', 'Password') }}
                                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter password', 'required' => 'required']) }}
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} mb-4">
                                {{ Form::label('password_confirmation', 'Password') }}
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Enter confirm password', 'required' => 'required']) }}
                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="term-conditionCheck">
                                <label class="form-check-label fw-normal" for="term-conditionCheck">I accept <a
                                        href="#" class="text-primary">Terms and Conditions</a></label>
                            </div>
                            <div class="d-grid mt-4">
                                {{ Form::submit('Register', ['class' => 'btn btn-primary waves-effect waves-light']) }}
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
            </div>
        </div>
        <div class="mt-5 text-center">
            <p class="text-white-50">Already have an account ?<a href="auth-login.html" class="fw-medium text-primary">
                    Login </a> </p>
            <p class="text-white-50">©
                <script>
                    document.write(new Date().getFullYear())
                </script>2022  <a href="https://niloydas.net/">Niloy Das</a>. Crafted with <i class="mdi mdi-heart text-danger"></i> by <a
                    href="https://1.envato.market/themesdesign" target="_blank">Themesdesign</a>
            </p>
        </div>
    </div>
@endsection
