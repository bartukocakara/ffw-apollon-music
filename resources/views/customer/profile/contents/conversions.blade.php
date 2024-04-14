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
            <div id="filterButton">
                <ul class="nav nav-tabs-alt" role="tablist">
                    <li class="nav-item">
                        <a href="#genre" class="nav-link active" data-bs-toggle="tab" role="tab">
                            <p>Genre</p>
                            <img src="{{ asset('options/tabs/Genre.png') }}" alt="" width="50">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#mood" class="nav-link" data-bs-toggle="tab" role="tab">
                            <p>Mood</p>
                            <img src="{{ asset('options/tabs/Mood.png') }}" alt="" width="50">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#theme" class="nav-link" data-bs-toggle="tab" role="tab">
                            <p>Theme</p>
                            <img src="{{ asset('options/tabs/Theme.png') }}" alt="" width="50">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tempo" class="nav-link" data-bs-toggle="tab" role="tab">
                            <p>Tempo</p>
                            <img src="{{ asset('options/tabs/Tempo.png') }}" alt="" width="50">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#length" class="nav-link" data-bs-toggle="tab" role="tab">
                            <p>Length</p>
                            <img src="{{ asset('options/tabs/Length.png') }}" alt="" width="50">
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="genre" role="tabpanel">
                        <div class='m-auto create-option-container'>
                        @foreach (config('options.genres') as $value)
                            <div class="text-center" style="cursor: pointer; background:black;border-radius:10px">
                                <div class="mx-auto"  onclick="toggleCheckbox(this)">
                                    <input class="d-none" type="checkbox" name="genres[]" value="{{ $value['name'] }}">
                                    <h6 class="m-auto">{{ $value['name'] }}</h6>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="mood" role="tabpanel">
                        <div class='m-auto create-option-container'>
                            @foreach (config('options.moods') as $value)
                                <div class="text-center" style="cursor: pointer; background:black;border-radius:10px">
                                    <div class="mx-auto"  onclick="toggleCheckbox(this)">
                                        <input class="d-none" type="checkbox" name="moods[]" value="{{ $value['name'] }}">
                                        <h6 class="m-auto">{{ $value['name'] }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="theme" role="tabpanel">
                        <div class='m-auto create-option-container'>

                        @foreach (config('options.themes') as $value)
                            <div class="text-center" style="cursor: pointer; background:black;border-radius:10px">
                                <div class="mx-auto"  onclick="toggleCheckbox(this)">
                                    <input class="d-none" type="checkbox" name="themes[]" value="{{ $value['name'] }}">
                                    <h6 class="m-auto">{{ $value['name'] }}</h6>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade text-center py-3" id="tempo" role="tabpanel">
                        @foreach (config('options.tempos') as $value)
                            <span class="btn btn-outline-primary btn-sm mb-2" onclick="toggleCheckbox(this)">
                                {{ $value['name'] }}
                            <input class="d-none" type="checkbox" name="tempo" value="{{ $value['name'] }}">
                            </span>
                        @endforeach
                    </div>
                    <div class="tab-pane fade text-center py-3" id="length" role="tabpanel">
                        @foreach (config('options.length') as $value)
                            <span class="btn btn-outline-primary btn-sm mb-2" onclick="toggleCheckbox(this)">
                                {{ $value['name'] }}
                            <input class="d-none" type="checkbox" name="length" value="{{ $value['name'] }}">
                            </span>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex">
                    <button id="" class="btn btn-primary w-25" style="margin:auto">
                        Activate Filter
                        <i class='bx bx-filter'></i>
                    </button>
                    <button id="clearFilterButton" class="btn btn-secondary w-25" style="margin:auto">
                        Clear Filter
                        <i class='bx bx-sync'></i>
                    </button>
                </div>
            </form>
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
                                    @foreach($conversion['moods'] as $value)
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
    function toggleCheckbox(span) {
            // Get the hidden checkbox inside the span
            var checkbox = span.querySelector('input[type="checkbox"]');

            // Toggle the 'checked' attribute of the checkbox
            checkbox.checked = !checkbox.checked;

            // Optionally, you can also toggle the 'active' class on the span
            if (checkbox.checked) {
                span.classList.add('active');
            } else {
                span.classList.remove('active');
            }
        }

    document.addEventListener('DOMContentLoaded', function () {
        // Set selected options based on values in the URL
        var urlParams = new URLSearchParams(window.location.search);

        // Get the values from the URL
        var selectedLength = urlParams.get('length');
        var selectedGenres = urlParams.get('genres');
        var selectedThemes = urlParams.get('themes');
        var selectedMoods = urlParams.get('moods');
        var selectedIsFavorite = urlParams.get('is_favorite');
        var selectedPerPage = urlParams.get('per_page');
        // Set the selected values in the dropdowns
        document.getElementById('length').value = selectedLength;
        document.getElementById('is_favorite').value = selectedIsFavorite;
        document.getElementById('per_page').value = selectedPerPage;

        // Check and activate selected checkboxes for genres, themes, and moods
        var selectedGenres = urlParams.getAll('genres[]');
        var selectedThemes = urlParams.getAll('themes[]');
        var selectedMoods = urlParams.getAll('moods[]');
        selectedGenres.forEach(function (genre) {
            document.querySelector('input[name="genres[]"][value="' + genre + '"]').checked = true;
            var checkbox = span.querySelector('input[type="checkbox"]');

        });
        selectedThemes.forEach(function (theme) {
            document.querySelector('input[name="themes[]"][value="' + theme + '"]').checked = true;
        });
        selectedMoods.forEach(function (mood) {
            document.querySelector('input[name="moods[]"][value="' + mood + '"]').checked = true;
        });

        // Add similar logic for themes and moods if needed
    });

    document.getElementById('filterButton').addEventListener('click', function () {
        // Get selected values from the dropdowns
        var selectedLength = document.getElementById('length').value;
        var selectedIsFavorite = document.getElementById('is_favorite').value;
        var selectedPerPage = document.getElementById('per_page').value || 10;

        // Get selected genres
        var selectedGenres = [];
        var selectedThemes = [];
        var selectedMoods = [];
        document.querySelectorAll('input[name="genres[]"]:checked').forEach(function (checkbox) {
            selectedGenres.push(checkbox.value);
        });
        document.querySelectorAll('input[name="themes[]"]:checked').forEach(function (checkbox) {
            selectedThemes.push(checkbox.value);
        });
        document.querySelectorAll('input[name="moods[]"]:checked').forEach(function (checkbox) {
            selectedMoods.push(checkbox.value);
        });

        // Encode selected arrays as one parameter
        var filterUrl = '{{ route('customer.conversions.index') }}' +
            '?length=' + encodeURIComponent(selectedLength) +
            '&is_favorite=' + encodeURIComponent(selectedIsFavorite) +
            '&genres=' + encodeURIComponent(selectedGenres?.join(',')) +
            '&themes=' + encodeURIComponent(selectedThemes?.join(',')) +
            '&moods=' + encodeURIComponent(selectedMoods?.join(',')) +
            '&order_by=created_at' + // Set default order_by value here
            '&per_page=' + encodeURIComponent(selectedPerPage); // Set default per_page value here
        console.log(filterUrl);
        return
        // Redirect to the filtered URL
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
</script>

@endsection
