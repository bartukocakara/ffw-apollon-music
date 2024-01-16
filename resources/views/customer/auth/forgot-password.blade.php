@extends('customer.layouts.master')
@section('title', 'Forgot Password')

@section('content')
    <section class="position-relative h-100 pt-5 pb-4">
        <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start h-100 pt-5">
            <div class="w-100 align-self-end pt-1 pt-md-4 pb-4" style="max-width: 526px;">
                <p class="text-center text-xl-start">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>
                <p class="text-center text-xl-start pb-3 mb-3">Don’t have an account yet? <a href="{{ route('register') }}">Register here.</a></p>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                        <div class="position-relative mb-4">
                            <x-input-label for="email" class="form-label fs-base" :value="__('Email')" />
                            <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class=" text-danger list-unstyled text-bold" />
                        </div>
                        <x-primary-button class="btn btn-primary shadow-primary btn-lg w-100">
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        <div class="position-absolute top-0 end-0 w-50 h-100 bg-position-center bg-repeat-0 bg-size-cover d-none d-xl-block" style="background-image: url({{ asset('customer/assets/img/account/signin-bg.jpg') }})"></div>
    </section>

@endsection

