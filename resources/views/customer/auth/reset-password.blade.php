@extends('customer.layouts.master')
@section('title', 'Reset Password')

@section('content')
    <section class="position-relative h-100 pt-5 pb-4">
        <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start h-100 pt-5">
            <div class="w-100 align-self-end pt-1 pt-md-4 pb-4" style="max-width: 526px;">
                <h1 class="text-center text-xl-start">Reset password</h1>
                <form method="POST" class="needs-validation mb-2" method="POST" action="{{ route('password.store') }}" novalidate >
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="position-relative mb-4">
                            <x-input-label for="email" class="form-label fs-base" :value="__('Email')" />
                            <x-text-input type="email" class="form-control form-control-lg" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class=" text-danger list-unstyled text-bold" />
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
                            <x-input-label for="password_confirmation" :value="__('Password')" class="form-label fs-base" />
                            <div class="password-toggle">
                                <x-text-input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" required autocomplete="current-password" />
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox">
                                    <span class="password-toggle-indicator"></span>
                                </label>
                                <x-input-error :messages="$errors->get('password_confirmation')" class=" text-danger list-unstyled text-bold" />
                            </div>
                        </div>
                        <x-primary-button class="btn btn-primary shadow-primary btn-lg w-100">
                            {{ __('Reset Password') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        <div class="position-absolute top-0 end-0 w-50 h-100 bg-position-center bg-repeat-0 bg-size-cover d-none d-xl-block" style="background-image: url({{ asset('customer/assets/img/account/signin-bg.jpg') }})"></div>
    </section>
@endsection

