@extends('customer.layouts.master')

@section('title', __('Conversion'))
@section('breadcrumb', 'Conversion')
@section('banner-label', __('Create music'))

@section('content')
    @include('customer.layouts.breadcrum-no-height')
    <div class="container">
        <div class="row">
        <div class="col-md-3">&nbsp;</div>
            <div class="col-sm-12 col-md-6">
                <div class="mt-10 mb-10 pt-10 pb-10">
                    <p>&nbsp;</p>
                    <h2 class="h5 text-primary mb-4 text-white">Current number of tokens: {{ app('credit_amount') }}</h2>
                </div>
                <form method="POST" action="{{ route('customer.conversions.store') }}" class="needs-validation mb-2" id="conversionForm">
                    {{ csrf_field() }}
                    <div class="row pb-2">
                        <div class="col-sm-12 mb-4">
                            <label for="mood" class="form-label fs-base text-white">Mood</label>
                            <select id="mood" name="mood" class="form-select form-select-lg" required="">
                                <option value="Epic">Epic</option>
                                <option value="Happy">Happy</option>
                                <option value="Hopeful">Hopeful</option>
                                <option value="Laid Back">Laid Back</option>
                                <option value="Angry">Angry</option>
                                <option value="Sentimental">Sentimental</option>
                                <option value="Busy & Frantic">Busy & Frantic</option>
                                <option value="Romantic">Romantic</option>
                                <option value="Funny & Weird">Funny & Weird</option>
                                <option value="Dark">Dark</option>
                                <option value="Glamorous">Glamorous</option>
                                <option value="Mysterious">Mysterious</option>
                                <option value="Elegant">Elegant</option>
                                <option value="Dreamy">Dreamy</option>
                                <option value="Euphoric">Euphoric</option>
                                <option value="Fear">Fear</option>
                                <option value="Heavy & Ponderous">Heavy & Ponderous</option>
                                <option value="Peaceful">Peaceful</option>
                                <option value="Restless">Restless</option>
                                <option value="Running">Running</option>
                                <option value="Sad">Sad</option>
                                <option value="Scary">Scary</option>
                                <option value="Sexy">Sexy</option>
                                <option value="Smooth">Smooth</option>
                                <option value="Suspense">Suspense</option>
                            </select>
                            <x-input-error :messages="$errors->get('themes')" class="text-danger list-unstyled text-bold" />

                            <div class="invalid-feedback">Please choose theme!</div>
                        </div>
                        <div class="col-sm-12 mb-4">
                            <label for="length" class="form-label fs-base text-white">Length</label>
                            <select id="length" name="length" class="form-select form-select-lg" required="">
                                <option value="15">0:15</option>
                                <option value="30">0:30</option>
                                <option value="45">0:45</option>
                                <option value="60">1:00</option>
                                <option value="120">2:00</option>
                                <option value="180">3:00</option>
                            </select>
                            <div class="invalid-feedback">Please choose length!</div>
                        </div>
                        <div class="col-sm-12 mb-4">
                            <label for="genre" class="form-label fs-base text-white">Genre</label>
                            <select id="genre" name="genres" class="form-select form-select-lg" required="">
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
                            <x-input-error :messages="$errors->get('genres')" class="text-danger list-unstyled text-bold" />

                            <div class="invalid-feedback">Please choose genre!</div>
                        </div>

                        <div class="col-sm-12 mb-4">
                            <label for="themes" class="form-label fs-base text-white">Theme</label>
                            <select id="themes" name="themes" class="form-select form-select-lg" required="">
                                <option value="Ads &amp; Trailers">Ads &amp; Trailers</option>
                                <option value="Broadcasting">Broadcasting</option>
                                <option value="Cinematic">Cinematic</option>
                                <option value="Corporate">Corporate</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Cooking">Cooking</option>
                                <option value="Documentary">Documentary</option>
                                <option value="Drama">Drama</option>
                                <option value="Fashion &amp; Beauty">Fashion &amp; Beauty</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Holiday season">Holiday season</option>
                                <option value="Motivational &amp; Inspiring">Motivational &amp; Inspiring</option>
                                <option value="Nature">Nature</option>
                                <option value="Photography">Photography</option>
                                <option value="Technology">Technology</option>
                                <option value="Travel">Travel</option>
                                <option value="Tutorials">Tutorials</option>
                                <option value="Wedding &amp; Romance">Wedding &amp; Romance</option>
                                <option value="Workout &amp; Wellness">Workout &amp; Wellness</option>
                            </select>
                            <x-input-error :messages="$errors->get('themes')" class="text-danger list-unstyled text-bold" />

                            <div class="invalid-feedback">Please choose theme!</div>
                        </div>

                        <div class="col-sm-12 mb-4">
                            <label for="tempo" class="form-label fs-base text-white">Tempo</label>
                            <select id="tempo" name="tempo" class="form-select form-select-lg" required="">
                                <option value="low">Low</option>
                                <option value="normal">Normal</option>
                                <option value="high">High</option>
                            </select>
                            <x-input-error :messages="$errors->get('tempo')" class="text-danger list-unstyled text-bold" />
                            <div class="invalid-feedback">Please choose tempo!</div>
                        </div>
                        <button class="btn btn-info" type="submit" data-bs-toggle="modal" data-bs-target="#spinner">
                            Save
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function previewImage(input) {
        var file = input.files[0];
        var imagePreview = document.getElementById('imagePreview');

        if (file) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Show the image preview
            };

            reader.readAsDataURL(file);
        } else {
            imagePreview.src = ''; // Clear the image source
            imagePreview.style.display = 'none'; // Hide the image preview
        }
    }
    </script>
@endsection
