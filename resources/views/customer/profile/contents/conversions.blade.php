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
            <div class="row" id="filterForm">
                <div class="col-6 mb-4">
                    <label for="length" class="form-label fs-base text-white">Length</label>
                    <select id="length" name="length" class="form-select form-select-lg">
                        <option value="15">0:15</option>
                        <option value="30">0:30</option>
                        <option value="45">0:45</option>
                        <option value="60">1:00</option>
                        <option value="120">2:00</option>
                        <option value="180">3:00</option>
                    </select>
                </div>
                <div class="col-6 mb-4">
                    <label for="genre" class="form-label fs-base text-white">Genre</label>
                    <select id="genre" name="genres" class="form-select form-select-lg">
                        <option value="Acoustic">Acoustic</option>
                        <option value="Hip Hop">Hip Hop</option>
                        <option value="Beats">Beats</option>
                        <option value="Pop">Pop</option>
                        <option value="Trap">Trap</option>
                        <option value="Tokyo night pop">Tokyo night pop</option>
                        <option value="Rock">Rock</option>
                        <option value="Latin">Latin</option>
                        <option value="House">House</option>
                        <option value="Tropical House">Tropical House</option>
                        <option value="Ambient">Ambient</option>
                        <option value="Orchestra">Orchestra</option>
                        <option value="Electro &amp; Dance">Electro &amp; Dance</option>
                        <option value="Electronica">Electronica</option>
                        <option value="Techno &amp; Trance">Techno &amp; Trance</option>
                    </select>
                </div>
                <div class="col-3 mb-4">
                    <label for="per_page" class="form-label fs-base text-white">Results Per Page</label>
                    <select id="per_page" name="per_page" class="form-select form-select-lg">
                        <option value="10">10</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="col-3 mb-4">
                    <label for="is_favorite" class="form-label fs-base text-white">Favorite</label>
                    <select id="is_favorite" name="is_favorite" class="form-select form-select-lg">
                        <option value="0">All</option>
                        <option value="1">Favorite</option>
                    </select>
                </div>
                <div class="d-flex">
                    <button id="filterButton" class="btn btn-primary w-25" style="margin:auto">Activate Filter<i class='bx bx-filter'></i></button>
                    <button id="clearFilterButton" class="btn btn-secondary w-25" style="margin:auto">Clear Filter<i class='bx bx-sync'></i></button>
                </div>
            </div>
            <br/>
            <div class="row g-md-4 g-3">
            @foreach ($collection['data'] as $conversion )
                <div class="col-6 border-0 shadow-sm overflow-hidden mb-4">
                    <div class="card border-0 shadow-sm overflow-hidden mb-4">
                        <div class="row g-0">
                            <a class="position-relative col-sm-4 bg-repeat-0 bg-position-center bg-size-cover" style="background-image: url({{ asset('storage/'.$conversion['image_path']) }}); min-height: 13rem;" aria-label="Cover image">
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
                                        <a href="#" class="favorite-icon" data-conversion-id="8841fd5d-7f76-4e47-9da3-31a09a4724af">
                                            <i class="bx bx-heart"></i>
                                        </a>
                                    </h2>
                                    <p class="mb-4 mb-lg-5">{{ $conversion['genres'] }} / {{ $conversion['tempo'] }} / {{ $conversion['length'] }}</p>
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
    document.addEventListener('DOMContentLoaded', function () {

        document.getElementById('filterButton').addEventListener('click', function () {
            // Get selected values from the dropdowns
            var selectedLength = document.getElementById('length').value;
            var selectedGenre = document.getElementById('genre').value;
            var selectedIsFavorite = document.getElementById('is_favorite').value;

            // Get the selected per_page value or set it to the default (10)
            var selectedPerPage = document.getElementById('per_page').value || 10;

            // Build the URL with filter parameters and default values
            var filterUrl = '{{ route('customer.conversions.index') }}' +
                '?length=' + selectedLength +
                '&is_favorite=' + selectedIsFavorite +
                '&genre=' + selectedGenre +
                '&order_by=created_at' + // Set default order_by value here
                '&per_page=' + selectedPerPage; // Set default per_page value here

            // Redirect to the filtered URL
            window.location.href = filterUrl;

            // Set selected options based on values in the URL
            var urlParams = new URLSearchParams(window.location.search);

            // Get the values from the URL
            var selectedLength = urlParams.get('length');
            var selectedGenre = urlParams.get('genre');
            var selectedIsFavorite = urlParams.get('is_favorite');
            var selectedPerPage = urlParams.get('per_page');

            // Set the selected values in the dropdowns
            document.getElementById('length').value = selectedLength;
            document.getElementById('genre').value = selectedGenre;
            document.getElementById('is_favorite').value = selectedIsFavorite;
            document.getElementById('per_page').value = selectedPerPage;
        });

        // Set the default per_page value to 10
        document.getElementById('per_page').value = 10;

        // Clear Filter button click event
        document.getElementById('clearFilterButton').addEventListener('click', function () {
            // Reset selected values in the dropdowns
            document.getElementById('length').value = '';
            document.getElementById('genre').value = '';
            document.getElementById('is_favorite').value = '';

            // Build the URL without filter parameters
            var filterUrl = '{{ route('customer.conversions.index') }}';

            // Redirect to the unfiltered URL
            window.location.href = filterUrl;
        });


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

// ...

    });
</script>

@endsection
