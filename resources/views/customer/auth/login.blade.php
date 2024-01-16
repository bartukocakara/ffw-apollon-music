@extends('customer.layouts.master')
@section('title', 'Login')

@section('content')
    <section class="position-relative h-100 pt-5 pb-4">
        <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start h-100 pt-5">
            <div class="w-100 align-self-end pt-1 pt-md-4 pb-4" style="max-width: 526px;">
                <h1 class="text-center text-xl-start">Welcome Back</h1>
                <p class="text-center text-xl-start pb-3 mb-3">Don’t have an account yet? <a href="{{ route('register') }}">Register here.</a></p>
                <form class="needs-validation mb-2" method="POST" action="{{ route('login') }}" novalidate >
                    @csrf
                        <div class="position-relative mb-4">
                            <x-input-label for="email" class="form-label fs-base" :value="__('Email')" />
                            <x-text-input type="email" class="form-control form-control-lg" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="text-danger list-unstyled text-bold" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="password" :value="__('Password')" class="form-label fs-base" />
                            <div class="password-toggle">
                                <x-text-input type="password" id="password" name="password" class="form-control form-control-lg" required autocomplete="current-password" />
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox">
                                    <span class="password-toggle-indicator"></span>
                                </label>
                                <x-input-error :messages="$errors->get('password')" class=" text-danger list-unstyled text-bold" />
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="form-check">
                                <input type="checkbox" id="remember" class="form-check-input">
                                <label for="remember" class="form-check-label fs-base">Remember me</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary shadow-primary btn-lg w-100">{{ __('Log in') }}</button>
                    </form>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="btn btn-link btn-lg w-100">Forgot Password ?</a>
                    @endif
                    <hr class="my-4">
                    <h6 class="text-center mb-4">Or sign in with your social network</h6>
                    <div class="row row-cols-1 row-cols-sm-2">
                        <div class="col mb-3">
                            <a href="{{ route('google.redirect') }}" class="btn btn-icon btn-secondary btn-google btn-lg w-100">
                            <i class="bx bxl-google fs-xl me-2"></i>
                            Google
                            </a>
                        </div>
                        <div class="col mb-3">
                            <a href="#" class="btn btn-icon btn-secondary btn-facebook btn-lg w-100">
                            <i class="bx bxl-facebook fs-xl me-2"></i>
                            Facebook
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute top-0 end-0 w-50 h-100 bg-position-center bg-repeat-0 bg-size-cover d-none d-xl-block" style="background-image: url(assets/img/account/signin-bg.jpg);"></div>
        </section>
@endsection
