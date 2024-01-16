<section class="bg-dark py-4 mt-5" data-bs-theme="dark">
    <div class="container pb-2 py-lg-3" style="height: 450px;">
      <nav class="pb-4 mb-lg-3" aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
          <li class="breadcrumb-item">
            <a href="{{ route('home') }}"><i class="bx bx-home-alt fs-lg me-1"></i>Home</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb')</li>
        </ol>
      </nav>
      <h1 class="text-center mb-0">@yield('banner-label')</h1>
    </div>
</section>
