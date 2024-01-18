@extends('customer.layouts.master')
@section('title', __('Conversions'))

@section('content')
<section class="container pt-5">
   <div class="row">
      <!-- Sidebar (User info + Account menu) -->
      @include('customer.profile.components.sidebar')
      <!-- Account details -->
      <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
         <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
            <div class="d-flex">
                <h3>
                    {{ __('Conversions') }}
                </h3>
                <a href="{{ route('customer.conversions.create') }}" class="btn btn-success" style="margin-left:auto">
                    {{ __('Create Music') }}
                </a>
            </div>
            <br/>
            <div class="row g-md-4 g-3">
            @foreach ($collection['data'] as $conversion )
            <div class="col-12 col-12 mt-5 pt-3 pt-xl-4 row">
                <div class="col-6 position-relative rounded-3 overflow-hidden">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center zindex-5">
                        <button onclick="playThis(this)" class="btn btn-video btn-icon btn-xl bg-white">
                            <i class="bx bx-play"></i>
                        </button>
                    </div>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-35"></span>
                    <video class="videoElement d-block w-100"  style="height:150px" poster="{{ asset('storage/'.$conversion['image_path']) }}">
                        <source src="{{ asset('storage/'.$conversion['music_path']) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="col-6">
                    <h6>Genres : {{ $conversion['genres'] }}</h6>
                    <h6>Tempo : {{ $conversion['tempo'] }}</h6>
                    <h6>Length : {{ $conversion['length'] }}</h6>
                </div>
            </div>
            @endforeach
            </div>
         </div>
      </div>
   </div>
</section>
<script>
    function playThis(button) {
        var videoElement = button.closest('.position-relative').querySelector('.videoElement');

        if (videoElement.paused) {
            videoElement.play();
            button.innerHTML = '<i class="bx bx-pause"></i>';
        } else {
            videoElement.pause();
            button.innerHTML = '<i class="bx bx-play"></i>';
        }
    }
</script>
@endsection
