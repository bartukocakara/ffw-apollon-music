<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - @yield('title')</title>

    <meta name="description" content="FFW Apollon Music ">
    <meta name="keywords" content="bootstrap, business, creative agency, construction, services, e-commerce, shopping cart, mobile app showcase, multipurpose, shop, ui kit, marketing, seo, landing, html5, css3, javascript, gallery, slider, touch, creative">
    <meta name="author" content="Createx Studio">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">
    <link rel="manifest" href="{{ asset('favicon.png') }}">
    <link rel="mask-icon" href="{{ asset('favicon.png') }}" color="#6366f1">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <meta name="msapplication-TileColor" content="#080032">
    <meta name="msapplication-config" content="{{ asset('assets/favicon/browserconfig.xml') }}">

    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">

    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/css/theme.min.css') }}">

    <!-- Page loading styles -->
    <style>
      .page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #fff;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      [data-bs-theme="dark"] .page-loading {
        background-color: #0b0f19;
      }
      .page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .page-loading.active > .page-loading-inner {
        opacity: 1;
      }
      .page-loading-inner > span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #9397ad;
      }
      [data-bs-theme="dark"] .page-loading-inner > span {
        color: #fff;
        opacity: .6;
      }
      .page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        border: .15em solid #b4b7c9;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      [data-bs-theme="dark"] .page-spinner {
        border-color: rgba(255,255,255,.4);
        border-right-color: transparent;
      }
      @-webkit-keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
    </style>

    <!-- Page loading scripts -->
    <script>
      (function () {
        window.onload = function () {
          const preloader = document.querySelector('.page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 1000);
        };
      })();
    </script>
  </head>

  <body>
        <!-- Page loading spinner -->
        <div class="page-loading active">
            <div class="page-loading-inner">
            <div class="page-spinner"></div>
                <span>Loading...</span>
            </div>
        </div>
        <main class="page-wrapper">
            @include('sweetalert::alert')

            @include('customer.modals.gdpr-modal')
            @include('customer.modals.spinner-modal')
            @include('customer.modals.licence-modal')
            @include('customer.modals.privacy-modal')
            @include('customer.layouts.header')
            @yield('content')
        </main>
    @include('customer.layouts.footer')
    <script src="{{ asset('assets/vendor/rellax/rellax.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/@lottiefiles/lottie-player/dist/lottie-player.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>

</html>
