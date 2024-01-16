@extends('customer.layouts.master')
@section('title', 'Register')

@section('content')
<section class="position-relative h-100 pt-5 pb-4">
    <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start h-100 pt-5">
        <div class="w-100 align-self-end pt-1 pt-md-4 pb-4" style="max-width: 526px;">
            <h1 class="text-center text-xl-start">Create Account</h1>
            <p class="text-center text-xl-start pb-3 mb-3">Already have an account?
                <a href="{{ route('login') }}">Sign in here.</a>
            </p>
            <form method="POST" class="needs-validation" action="{{ route('register') }}" novalidate >
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="position-relative mb-4">
                            <x-input-label class="form-label fs-base" for="name" :value="__('Name')" />
                            <x-text-input type="text" id="name" class="form-control form-control-lg" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class=" text-danger list-unstyled text-bold" />
                            <div class="invalid-feedback position-absolute start-0 top-100">Please enter your name!</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="position-relative mb-4">
                            <x-input-label for="email" class="form-label fs-base" :value="__('Email')" />
                            <x-text-input type="email" id="email" class="form-control form-control-lg" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="text-danger list-unstyled bold" />
                            <div class="invalid-feedback position-absolute start-0 top-100">Please enter a valid email address!</div>
                        </div>
                    </div>
                    <div class="col-12 mb-4 d-block">
                        <x-input-label for="password" class="form-label fs-basex" :value="__('Password')" />
                        <div class="password-toggle">
                            <input type="password" id="password" class="form-control form-control-lg" name="password" required autocomplete="new-password" />
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox">
                            <span class="password-toggle-indicator"></span>
                            </label>
                            <x-input-error :messages="$errors->get('password')" class="text-danger list-unstyled bold" />
                            <div class="invalid-feedback position-absolute start-0 top-100">Please enter a password!</div>
                        </div>
                    </div>
                    <div class="col-12 mb-4 d-block">
                        <x-input-label for="password_confirmation" class="form-label fs-base" :value="__('Confirm Password')" />
                        <div class="password-toggle">
                            <x-text-input id="password_confirmation" type="password" name="password_confirmation" class="form-control form-control-lg" required autocomplete="new-password" />
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox">
                            <span class="password-toggle-indicator"></span>
                            </label>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger list-unstyled bold" />
                            <div class="invalid-feedback position-absolute start-0 top-100">Please enter a password!</div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="form-check">
                        <input type="checkbox" id="is_licence_approved" name="is_licence_approved" class="form-check-input privacy">
                        <label for="license" class="form-check-label fs-base">I agree to
                            <a type="button" class="" data-bs-toggle="modal" data-bs-target="#licence">
                                User License Agreement for Apollon Engine
                            </a>
                        </label>
                        <x-input-error :messages="$errors->get('is_licence_approved')" class=" text-danger list-unstyled text-bold" />
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="is_privacy_approved" name="is_privacy_approved" class="form-check-input privacy">
                        <label for="privacy" class="form-check-label fs-base">I agree to
                            <a type="button" class="" data-bs-toggle="modal" data-bs-target="#privacy">
                                Apollon Engine Privacy Policy
                            </a>
                        </label>
                        <x-input-error :messages="$errors->get('is_privacy_approved')" class=" text-danger list-unstyled text-bold" />
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="is_gdpr_approved" name="is_gdpr_approved" class="form-check-input privacy">
                        <label for="gdpr" class="form-check-label fs-base">I agree to
                            <a type="button" class="" data-bs-toggle="modal" data-bs-target="#gdpr">
                                Apollon Engine Privacy and GDPR Agreement
                            </a>
                        </label>
                        <x-input-error :messages="$errors->get('is_gdpr_approved')" class=" text-danger list-unstyled text-bold" />
                    </div>
                </div>
                <x-primary-button class="btn btn-primary shadow-primary btn-lg w-100" id="registerButton"  disabled>
                    {{ __('Register') }}
                </x-primary-button>
            </form>
            <hr class="my-4">
            <h6 class="text-center mb-4">Or sign up with your social network</h6>
            <div class="row row-cols-1 row-cols-sm-2">
                <div class="col mb-3">
                    <a href="#" class="btn btn-icon btn-secondary btn-google btn-lg w-100">
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        var checkboxes = $('.privacy');
        checkboxes.on('change', function () {
            var allChecked = checkboxes.filter(':checked').length === checkboxes.length;
            $('#registerButton').prop('disabled', !allChecked);
        });
    });
</script>
@endsection

