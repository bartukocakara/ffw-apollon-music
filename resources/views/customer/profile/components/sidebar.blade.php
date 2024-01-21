<aside class="col-lg-3 col-md-4 border-end pb-5 mt-n5">
    <div class="position-sticky top-0">
        <div class="text-center pt-5">
            <div class="d-table position-relative mx-auto mt-2 mt-lg-4 pt-5 mb-3">
                <h2 class="h5 mb-1">{{ Auth::user()->name }}</h2>
            </div>
            <p class="mb-3 pb-3">{{ Auth::user()->email }}</p>
            <button type="button" class="btn btn-secondary w-100 d-md-none mt-n2 mb-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
                <i class="bx bxs-user-detail fs-xl me-2"></i>
                    Account menu
                <i class="bx bx-chevron-down fs-lg ms-1"></i>
            </button>
          <div id="account-menu" class="list-group list-group-flush collapse d-md-block">
                <a href="{{ route('customer.profile.edit') }}" class="list-group-item list-group-item-action d-flex align-items-center active">
                    <i class="bx bx-cog fs-xl opacity-60 me-2"></i>
                    Accountt Details
                </a>
                <a href="{{ route('customer.conversions.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bx bx-collection fs-xl opacity-60 me-2"></i>
                        Conversions
                </a>
                <a href="account-payment.html" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bx bx-credit-card-front fs-xl opacity-60 me-2"></i>
                        Payment Details
                </a>
                <a href="account-signin.html" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bx bx-log-out fs-xl opacity-60 me-2"></i>
                        Sign Out
                </a>
            </div>
        </div>
    </div>
</aside>
