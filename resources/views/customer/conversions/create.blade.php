@extends('customer.layouts.master')

@section('title', __('Conversion'))
@section('breadcrumb', 'Conversion')
@section('banner-label', __('Create music'))

@section('content')
    @include('customer.layouts.breadcrum-no-height')
    <div class="container w-100">
        <div class="row">
            <div class="col-12 m-auto">
                <div class="mt-10 mb-10 pt-10 pb-10">
                    <p>&nbsp;</p>
                    <h2 class="h5 text-primary mb-4 text-white">Current number of tokens: {{ app('credit_amount') }}</h2>
                </div>
                @foreach ($errors->get('name') as $error)
                    <x-input-error :messages="$error" class="text-danger list-unstyled text-bold" />
                @endforeach
                <form action="{{ route('customer.conversions.store') }}" method="post">
                    {{ csrf_field() }}
                    <ul class="nav nav-tabs-alt" role="tablist">
                        <li class="nav-item">
                            <a href="#genre" class="nav-link active" data-bs-toggle="tab" role="tab">
                                Genre
                                <img src="{{ asset('options/tabs/Genre.png') }}" alt="" width="50">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#mood" class="nav-link" data-bs-toggle="tab" role="tab">
                                Mood
                                <img src="{{ asset('options/tabs/Mood.png') }}" alt="" width="50">

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#theme" class="nav-link" data-bs-toggle="tab" role="tab">
                                Theme
                                <img src="{{ asset('options/tabs/Theme.png') }}" alt="" width="50">

                            </a>
                        </li>
                        <li class="nav-item">
                            <select id="tempo" name="tempo" class="nav-link" required="">
                                <option>Tempo</option>
                                <option value="low">Low</option>
                                <option value="normal">Normal</option>
                                <option value="high">High</option>
                            </select>
                        </li>
                        <li class="nav-item">
                            <select id="length" name="length" class="nav-link" required="">
                                <option>Length</option>
                                <option value="15">0:15</option>
                                <option value="30">0:30</option>
                                <option value="45">0:45</option>
                                <option value="60">1:00</option>
                                <option value="120">2:00</option>
                                <option value="180">3:00</option>
                            </select>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="genre" role="tabpanel">
                            @foreach (config('options.genres') as $genre)
                                <span class="btn btn-outline-primary btn-sm mb-2" onclick="toggleCheckbox(this)">
                                    {{ $genre['name'] }}
                                    <input class="d-none" type="checkbox" name="genres[]" value="{{ $genre['name'] }}">
                                    <img src="{{ asset('options/genres/' . $genre['image_name']) }}" alt="" width="75">
                                </span>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="mood" role="tabpanel">
                            @foreach (config('options.moods') as $value)
                                <span class="btn btn-outline-primary btn-sm mb-2" onclick="toggleCheckbox(this)">
                                    {{ $value['name'] }}
                                <input class="d-none" type="checkbox" name="moods[]" value="{{ $value['name'] }}">
                                <img src="{{ asset('options/moods/' . $value['image_name']) }}" alt="{{ $value['name'] }}" width="75">
                                </span>
                            @endforeach

                        </div>
                        <div class="tab-pane fade" id="theme" role="tabpanel">
                            @foreach (config('options.themes') as $value)
                                <span class="btn btn-outline-primary btn-sm mb-2" onclick="toggleCheckbox(this)">
                                    {{ $value['name'] }}
                                <input class="d-none" type="checkbox" name="themes[]" value="{{ $value['name'] }}">
                                <img src="{{ asset('options/themes/' . $value['image_name']) }}" alt="{{ $value['name'] }}" width="75">
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <button class="btn btn-info" type="submit" data-bs-toggle="modal" data-bs-target="#spinner">
                        Save
                    </button>
                </form>
                {{-- <form method="POST" action="{{ route('customer.conversions.store') }}" class="needs-validation mb-2" id="conversionForm">
                    {{ csrf_field() }}
                            <x-input-error :messages="$errors->get('genres')" class="text-danger list-unstyled text-bold" />

                </form> --}}
            </div>
        </div>
    </div>
    <script>
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
    </script>
@endsection
