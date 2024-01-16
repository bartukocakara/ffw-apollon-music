<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
   <head>
      <meta charset="utf-8">
      <title>Apollo Engine - @yield('title')</title>
      <!-- SEO Meta Tags-->
      <meta name="description" content="Silicon - Multipurpose Technology Bootstrap Template">
      <meta name="keywords" content="bootstrap, business, creative agency, construction, services, e-commerce, shopping cart, mobile app showcase, multipurpose, shop, ui kit, marketing, seo, landing, html5, css3, javascript, gallery, slider, touch, creative">
      <meta name="author" content="Createx Studio">
      <!-- Viewport-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Theme switcher (color modes) -->
      <!-- Favicon and Touch Icons-->
      <link rel="shortcut icon" href="{{ asset('assets/favicon/favicon.ico') }}">
      <meta name="msapplication-TileColor" content="#080032">
      <meta name="theme-color" content="#ffffff">
      <!-- Vendor Styles-->
      <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
      <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
      <!-- Main Theme Styles + Bootstrap-->
      <link rel="stylesheet" media="screen" href="{{ asset('assets/css/theme.min.css') }}">
      <style>

         [data-bs-theme="dark"] .page-loading {
         background-color: #0b0f19;
         }
         .page-loading.active {
         opacity: 1;
         visibility: visible;
         }

         [data-bs-theme="dark"] .page-loading-inner > span {
         color: #fff;
         opacity: .6;
         }

      </style>
   </head>
   <body>
      <main class="page-wrapper">
         @include('emails.customer.layouts.header')
         @yield('content')

      </main>
      @include('emails.customer.layouts.footer')
      <script src="{{ asset('assets/js/theme.min.js') }}"></script>
   </body>
</html>
