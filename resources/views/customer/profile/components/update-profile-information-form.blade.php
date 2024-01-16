<form id="send-verification" method="post" action="{{ route('customer.verification.send') }}">
    @csrf
</form>
<form class="needs-validation border-bottom pb-3 pb-lg-4" method="post" novalidate="" action="{{ route('customer.profile.update') }}">
    @csrf
    @method('patch')

   <div class="row pb-2">
        <div class="col-sm-6 mb-4">
            <x-input-label for="name" class="form-label fs-base" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="form-control form-control-lg" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="text-danger list-unstyled text-bold" />
        </div>
        <div class="col-sm-6 mb-4">
            <x-input-label for="email" class="form-label fs-base" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="form-control form-control-lg" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="text-danger list-unstyled text-bold" />
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="btn btn-info underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @else
                <span class="badge bg-success">
                    {{ __('User Verified') }}
                </span>
                @endif
        </div>
   </div>
   <div class="d-flex mb-3">
        <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
        @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('Saved.') }}</p>
        @endif
   </div>
</form>
