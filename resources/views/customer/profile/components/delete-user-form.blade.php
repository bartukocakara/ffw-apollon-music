<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<!-- Your HTML content -->
<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
</p>
<button id="delete-account" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">{{__('Delete Account')}}</button>

<div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="confirm-user-deletion-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="delete-account-form" class="p-6">
                @csrf
                @method('delete')
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>
                <div class="mt-6">
                    <label for="password" class="sr-only">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" class="form-control mt-1" placeholder="{{ __('Password') }}">
                    <!-- Error message display -->
                </div>
                <div class="mt-6">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-danger ms-3">{{ __('Delete Account') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Your JavaScript code -->
<script>
    document.getElementById('delete-account-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        var password = document.getElementById('password').value;
        // Here you can add further validation if needed

        // Perform Ajax request to delete the account
        // Example using Fetch API
        fetch('{{ route('customer.profile.destroy') }}', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ password: password })
        })
        .then(response => {
            // Handle response
            if (response.ok) {
                // Optionally, redirect or show a success message
                console.log('Account deleted successfully');
            } else {
                // Optionally, handle errors
                console.error('Failed to delete account');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });

        // Close the modal after submitting the form
        var modal = document.getElementById('confirm-user-deletion');
        var bootstrapModal = bootstrap.Modal.getInstance(modal);
        bootstrapModal.hide();
    });
</script>
