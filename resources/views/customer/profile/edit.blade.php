@extends('customer.layouts.master')
@section('title', __('Profile'))

@section('content')
<section class="container pt-5">
   <div class="row">
      <!-- Sidebar (User info + Account menu) -->
      @include('customer.profile.components.sidebar')
      <!-- Account details -->
      <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
         <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
            <h1 class="h2 pt-xl-1 pb-3">
                {{ __('Profile Information') }}
            </h1>

            @include('customer.profile.components.update-profile-information-form')

            <h1 class="h2 pt-xl-1 pb-3">
                {{ __('Password') }}
            </h1>
            @include('customer.profile.components.update-password-form')
            <!-- Delete acco    unt -->
            <h1 class="h2 pt-xl-1 pb-3">
                {{ __('Delete Account') }}
            </h1>
            @include('customer.profile.components.delete-user-form')

         </div>
      </div>
   </div>
</section>
@endsection
