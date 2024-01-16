<form method="post" class="needs-validation border-bottom pb-3 pb-lg-4" action="{{ route('customer.password.update') }}">
    @csrf
    @method('put')

   <div class="row pb-2">
        <div class="col-sm-6 mb-4">
            <x-input-label for="update_password_current_password" class="form-label fs-base" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control form-control-lg" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-danger list-unstyled text-bold" />
        </div>
        <div class="col-sm-6 mb-4">
            <x-input-label for="update_password_password" class="form-label fs-base" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="form-control form-control-lg" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="text-danger list-unstyled text-bold" />
        </div>
        <div class="col-sm-6 mb-4">
            <x-input-label for="update_password_password_confirmation" class="form-label fs-base" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control form-control-lg" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger list-unstyled text-bold" />
        </div>
   </div>
   <div class="d-flex mb-3">
        <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
        @if (session('status') === 'password-updated')
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
