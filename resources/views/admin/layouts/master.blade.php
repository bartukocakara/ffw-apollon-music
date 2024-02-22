<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
  <head>
    <meta charset="utf-8">
    <title>FFW Admin</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="FFW Admin template">
    <meta name="keywords" content="bootstrap, business, creative agency, mobile app showcase, saas, fintech, finance, online courses, software, medical, conference landing, services, e-commerce, shopping cart, multipurpose, shop, ui kit, marketing, seo, landing, blog, portfolio, html5, css3, javascript, gallery, slider, touch, creative">
    <meta name="author" content="Createx Studio">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Theme switcher (color modes) -->
    <script src="{{ asset('assets/js/theme-switcher.js') }}"></script>

    <!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">
    <link rel="manifest" href="{{ asset('favicon.png') }}">
    <link rel="mask-icon" href="{{ asset('favicon.png') }}" color="#6366f1">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <meta name="msapplication-TileColor" content="#080032">
    <meta name="msapplication-config" content="{{ asset('assets/favicon/browserconfig.xml') }}">

    <meta name="msapplication-TileColor" content="#080032">
    <meta name="msapplication-config" content="{{ asset('assets/favicon/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendor Styles -->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/prismjs/themes/prism.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/prismjs/plugins/toolbar/prism-toolbar.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/prismjs/plugins/line-numbers/prism-line-numbers.css') }}">

    <!-- Main Theme Styles + Bootstrap -->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/css/theme.min.css') }}">
  </head>


  <!-- Body -->
  <body data-bs-spy="scroll" data-bs-target="#jumpToNav" tabindex="0">
    @include('admin.layouts.navbar')
    @include('admin.layouts.sidebar')
                @yield('content')

    @include('admin.layouts.footer')

   <!-- Vendor Scripts -->
   <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/prismjs/components/prism-core.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/prismjs/components/prism-markup.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/prismjs/components/prism-clike.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/prismjs/plugins/toolbar/prism-toolbar.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/prismjs/plugins/line-numbers/prism-line-numbers.min.js') }}"></script>

   <!-- Main Theme Script -->
   <script src="{{ asset('assets/js/theme.min.js') }}"></script>
</body>

</html>
