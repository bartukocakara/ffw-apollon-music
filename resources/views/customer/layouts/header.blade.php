<header class="header navbar navbar-expand-lg bg-light shadow-sm fixed-top">
    <div class="container px-3">
        {{-- <a href="route('home')" class="navbar-brand pe-3">
            <img src="{{ asset('assets/img/logo.svg') }}" width="47" alt="Silicon">
            {{ config('app.name') }}
        </a>
        --}}
         <a href="route('home') --}}">
            <div style="opacity: 1; transform: none;">
                <div class="logo" style="width:125px">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/brand2.png') }}" alt="">
                    </a>
                </div>
            </div>
        </a>
        <div id="navbarNav" class="offcanvas offcanvas-end">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-header border-top">
                <a href="https://themes.getbootstrap.com/product/silicon-business-technology-template-ui-kit/"
                    class="btn btn-primary w-100" target="_blank" rel="noopener">
                    <i class="bx bx-cart fs-4 lh-1 me-1"></i>
                    &nbsp;Buy now
                </a>
            </div>
        </div>
        <div id="navbarNav" class="offcanvas offcanvas-end">
            <div class="offcanvas-header border-bottom">
              <h5 class="offcanvas-title">Menu</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('customer.conversions.create') }}" class="nav-link">
                        Create Music
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('customer.conversions.index') }}" class="nav-link">
                    My Musics
                </a>
                </li>
              </ul>
            </div>
            <div class="offcanvas-header border-top">
              <a href="https://themes.getbootstrap.com/product/silicon-business-technology-template-ui-kit/" class="btn btn-primary w-100" target="_blank" rel="noopener">
                <i class="bx bx-cart fs-4 lh-1 me-1"></i>
                &nbsp;Buy now
              </a>
            </div>
          </div>

        <div class="nav dropdown d-block order-lg-3 ms-4">
            @if (Auth::check())
            <a href="#" class="d-flex nav-link p-0" data-bs-toggle="dropdown">
                <img src="{{ asset('assets/img/avatar/18.jpg') }}" class="rounded-circle" width="48" alt="Avatar">
                <div class="d-none d-sm-block ps-2">
                    <div class="fs-xs lh-1 opacity-60">Credits: {{ app('credit_amount') }}</div>
                    <div class="fs-sm dropdown-toggle">{{ Auth::user()->name }}</div>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end my-1" style="width: 14rem;">
                <li>
                    <a href="{{ route('customer.profile.edit') }}" class="dropdown-item d-flex align-items-center">
                        <i class="bx bx-shopping-bag fs-base opacity-60 me-2"></i>
                        {{ __('Profile') }}
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bx bx-heart fs-base opacity-60 me-2"></i>
                        Favorites
                        <span class="ms-auto fs-xs text-muted">6</span>
                    </a>
                </li>
                <li class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('customer.logout') }}">
                        @csrf
                        <x-dropdown-link class="dropdown-item d-flex align-items-center" :href="route('customer.logout')"
                            onclick="event.preventDefault();
                                    this.closest('form').submit();">
                            <i class="bx bx-log-out fs-base opacity-60 me-2"></i>
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
            @else
            <a href="#" class="d-flex nav-link p-0" data-bs-toggle="dropdown">
                <div class="d-none d-sm-block ps-2">
                    {{ __('Sign in') }}
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu my-1" style="width: 14rem;">
                <li>
                    <a href="{{ route('login') }}" class="dropdown-item d-flex align-items-center">
                        {{ __('Sign in') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="dropdown-item d-flex align-items-center">
                        {{ __('Sign up') }}
                    </a>
                </li>
            </ul>
            @endif
        </div>
    </div>
</header>
