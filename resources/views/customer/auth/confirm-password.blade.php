@extends('customer.layouts.master')
@section('title', 'Confirm Password')

@section('content')
    <section class="position-relative h-100 pt-5 pb-4">
        <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start h-100 pt-5">
            <div class="w-100 align-self-end pt-1 pt-md-4 pb-4" style="max-width: 526px;">
                <p class="text-center text-xl-start">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </p>
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif
                <form method="POST" class="needs-validation mb-2" action="{{ route('password.confirm') }}" novalidate>
                    @csrf
                    <x-input-label for="password" class="form-label fs-base" :value="__('Password')" />
                    <x-text-input id="password" class="form-control form-control-lg"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="text-danger list-unstyled text-bold" />
                </form>

                    <hr class="my-4">
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                        <x-dropdown-link class="btn btn-link btn-lg w-100" :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        <div class="position-absolute top-0 end-0 w-50 h-100 bg-position-center bg-repeat-0 bg-size-cover d-none d-xl-block" style="background-image: url( {{ asset('customer/assets/img/account/signin-bg.jpg') }} )"></div>
    </section>

@endsection
