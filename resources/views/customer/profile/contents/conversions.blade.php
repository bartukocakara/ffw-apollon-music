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
            <h1 class="h2 pt-xl-1 pb-3">
                {{ __('Conversions') }}
            </h1>
            <div class="border ">
            @foreach ($collection['data'] as $conversion )
                <div class="border ">
                    <img src="{{ asset('storage/'.$conversion['image_path']) }}" alt="">
                    <h6>Genres</h6>
                    {{ $conversion['genres'] }}
                    {{--@foreach ($conversion['genres'] as $item)
                        <p>
                            {{ $item }}
                        </p>
                    @endforeach
                    --}}
                    <audio controls>
                        <source src="{{ asset('storage/'.$conversion['music_path']) }}" type="audio/mp4">
                        Your browser does not support the audio element.
                    </audio>
                </div>
                <br class="border"/>
            @endforeach
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
