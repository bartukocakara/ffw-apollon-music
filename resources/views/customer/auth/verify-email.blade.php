@extends('customer.layouts.master')
@section('title', 'Verify Email')

@section('content')
    <section class="position-relative h-100 pt-5 pb-4">
        <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start h-100 pt-5">
            <div class="w-100 align-self-end pt-1 pt-md-4 pb-4" style="max-width: 526px;">
                <p class="text-center text-xl-start">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </p>
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif
                <form method="POST" class="needs-validation mb-2" action="{{ route('customer.verification.send') }}" novalidate>
                    @csrf
                    <x-primary-button class="btn btn-primary shadow-primary btn-lg w-100">
                    {{ __('Resend Verification Email') }}
                    </x-primary-button >
                    <x-input-error :messages="$errors->get('password')" class="text-danger list-unstyled text-bold" />

                </form>
                </div>
            </div>
        <div class="position-absolute top-0 end-0 w-50 h-100 bg-position-center bg-repeat-0 bg-size-cover d-none d-xl-block" style="background-image: url( {{ asset('customer/assets/img/account/signin-bg.jpg') }} )"></div>
    </section>

@endsection
