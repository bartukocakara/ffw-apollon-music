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
            <div class="row g-3">
            @foreach ($collection['data'] as $conversion )
                <div class="col-6 border-0 shadow-sm overflow-hidden mb-4">
                    <div class="card border-0 shadow-sm overflow-hidden mb-4">
                        <div class="row g-0">
                            <a class="position-relative col-sm-4 bg-repeat-0 bg-position-center bg-size-cover" >
                                <div class=" top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center zindex-5">
                                    <button onclick="playThis(this)" class="btn btn-video btn-icon btn-xl bg-white">
                                        <i class="bx bx-play"></i>
                                    </button>
                                </div>
                                <span class=" top-0 start-0 w-100 h-100 bg-black opacity-35"></span>
                                    <video class="videoElement d-block w-100"  style="height:150px">
                                        <source src="{{ asset('storage/'.$conversion['music_path']) }}" type="video/mp4">
                                    </video>
                                </a>
                            <div class="col-sm-8">
                                <div class="card-body">
                                    <div class="fs-sm text-muted mb-1">{{ $conversion['created_at'] }}</div>
                                    <h2 class="h4 pb-1 mb-2">
                                        <a href="#" class="favorite-icon" data-conversion-id="{{ $conversion['id'] }}">
                                            <input id="is_favorite" type="checkbox" class='d-none' value="{{ $conversion['is_favorite'] }}" />
                                            <i class='bx {{ $conversion['is_favorite'] ? 'bxs' : 'bx' }}-heart'></i>
                                        </a>
                                    </h2>
                                    <h6>Moods</h6>
                                    @foreach($conversion['moods'] as $value)
                                        <span class="btn btn-outline-primary btn-sm mb-2">
                                            {{ $value }}
                                        </span>

                                    @endforeach
                                    <h6>Genres</h6>
                                    @foreach($conversion['genres'] as $value)
                                        <span class="btn btn-outline-primary btn-sm mb-2">
                                            {{ $value }}
                                        </span>

                                    @endforeach
                                    <h6>Themes</h6>
                                    @foreach($conversion['themes'] as $value)
                                        <span class="btn btn-outline-primary btn-sm mb-2">
                                            {{ $value }}
                                        </span>
                                    @endforeach
                                    <div class="d-flex">
                                        <form action="{{ route('customer.conversions.destroy', $conversion['id']) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this conversion?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger px-3 px-lg-4">
                                                <i class="bx bx-trash-alt fs-xl me-xl-2"></i>
                                                <span class="d-none d-xl-inline">{{ __('Delete') }}</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Pagination -->
            @if($pagination)
                <input type="text" id="per_page" class="d-none" value="{{ $pagination['per_page'] }}">
                <!-- Pagination: Basic example -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination">

                        @foreach ($pagination['links'] as $page)
                            <li class="page-item @if($page['active']) active @endif" aria-current="page">
                                @if($page['url'])
                                    <a href="{{ $page['url'] }}" class="page-link">{{ $page['label'] }}</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </nav>
            @endif
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

    var favoriteIcons = document.querySelectorAll('.favorite-icon');

        favoriteIcons.forEach(function (icon) {
            icon.addEventListener('click', function (e) {
                e.preventDefault();
                // Get the conversion ID from the data attribute
                var conversionId = icon.getAttribute('data-conversion-id');
                // Get the CSRF token from the meta tag
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                // Get the current is_favorite value from the icon's class
                var currentIsFavorite = icon.querySelector('i').classList.contains('bxs-heart');
                // Use Axios to send the PUT request
                axios.put('/conversions/' + conversionId, {
                    is_favorite: !currentIsFavorite // Send the opposite value
                }, {
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                })
                .then(function (response) {
                    // Update the heart icon based on the new is_favorite value
                    var responseData = response.data;
                    var iconElement = icon.querySelector('i');
                    iconElement.classList.toggle('bxs-heart', responseData.is_favorite);
                    iconElement.classList.toggle('bx-heart', !responseData.is_favorite);
                })
                .catch(function (error) {
                    console.error('Error updating is_favorite:', error.response.statusText);
                });
            });
        });
</script>

@endsection
