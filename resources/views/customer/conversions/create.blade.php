@extends('customer.layouts.master')

@section('title', __('Conversion'))
@section('breadcrumb', 'Conversion')
@section('banner-label', __('Create music'))

@section('content')
    @include('customer.layouts.breadcrum-no-height')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mt-10 mb-10 pt-10 pb-10">
                    <p>&nbsp;</p>
                    <h2 class="h5 text-primary mb-4 text-white">Current number of tokens: {{ app('credit_amount') }}</h2>
                </div>
                @foreach ($errors->get('name') as $error)
                    <x-input-error :messages="$error" class="text-danger list-unstyled text-bold" />
                @endforeach
                <form class="" action="{{ route('customer.conversions.store') }}" method="post">
                    {{ csrf_field() }}
                    <ul class="nav nav-tabs-alt" role="tablist" style="margin-left:20%">
                        <li class="nav-item">
                            <a href="#genre" class="nav-link tab active" data-bs-toggle="tab" role="tab">
                                <p class="my-auto">Genres</p>
                                <img src="{{ asset('options/tabs/Genre.png') }}" alt="" width="50">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#mood" class="nav-link tab" data-bs-toggle="tab" role="tab">
                                <p class="my-auto">Moods</p>
                                <img src="{{ asset('options/tabs/Mood.png') }}" alt="" width="50">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#theme" class="nav-link tab" data-bs-toggle="tab" role="tab">
                                <p class="my-auto">Themes</p>
                                <img src="{{ asset('options/tabs/Theme.png') }}" alt="" width="50">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#length" class="nav-link tab" data-bs-toggle="tab" role="tab">
                                <p class="my-auto">Tempo & Length</p>
                                <img src="{{ asset('options/tabs/tempo.png') }}" alt="" width="50">
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active " id="genre" role="tabpanel">
                            <div class="d-flex w-75 m-auto">
                                <div class='m-auto create-option-container'>
                                @foreach (config('options.genres') as $value)
                                    <div class="create-option-parent">
                                        <div class="create-option m-auto mb-2"  style="width: 120px;height: 120px;" onclick="toggleCheckbox(this)">
                                            <input class="d-none" type="checkbox" name="genres[]" value="{{ $value['name'] }}">
                                            <img src="{{ asset('options/genres/' . $value['image_name']) }}" alt="" style="border-radius:10px; width:100%; height: 120px;">
                                            <h6 class="create-option-text">{{ $value['name'] }}</h6>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                <button type="button" class="btn btn-info mt-auto next-stage" data-current="#genre" data-next="#mood">Next step ></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="mood" role="tabpanel">
                            <div class="d-flex w-75 m-auto">
                                <button type="button" class="btn btn-info mt-auto prev-stage" data-current="#mood" data-prev="#genre">< Previous step</button>
                                <div class='m-auto create-option-container'>
                                    @foreach (config('options.moods') as $value)
                                        <div class="create-option-parent">
                                            <div class="create-option m-auto mb-2" style="width: 120px;height: 120px;" onclick="toggleCheckbox(this)">
                                                <input class="d-none" type="checkbox" name="moods[]" value="{{ $value['name'] }}">
                                                <img src="{{ asset('options/moods/' . $value['image_name']) }}" alt="{{ $value['name'] }}" width="100" style="border-radius:10px; width:100%; height: 120px;">
                                                <h6 class="create-option-text">{{ $value['name'] }}</h6>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-info mt-auto next-stage" data-current="#mood" data-next="#theme">Next step ></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="theme" role="tabpanel">
                            <div class="d-flex w-75 m-auto">
                                <button type="button" class="btn btn-info mt-auto prev-stage" data-current="#theme" data-prev="#mood">< Previous step</button>
                                <div class='m-auto create-option-container'>
                                    @foreach (config('options.themes') as $value)
                                        <div class="create-option-parent">
                                            <div class="create-option m-auto mb-2" style="width: 120px;height: 120px;" onclick="toggleCheckbox(this)">
                                                <input class="d-none" type="checkbox" name="themes[]" value="{{ $value['name'] }}">
                                                <img src="{{ asset('options/themes/' . $value['image_name']) }}" alt="{{ $value['name'] }}" width="100" style="border-radius:10px; width:100%; height: 120px;">
                                                <h6 class="create-option-text">{{ $value['name'] }}</h6>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-info mt-auto next-stage" data-current="#theme" data-next="#length">Next step ></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="length" role="tabpanel" data-single-select="true">
                            <div class="d-flex w-75 m-auto">
                                <button type="button" class="btn btn-info mt-auto prev-stage" name="length" data-current="#length" data-prev="#theme">< Previous step</button>
                                    <div class='text-center'>
                                        <h6>Tempo</h6>
                                        <img src="{{ asset('options/tabs/tempo.png') }}" alt="" width="50">
                                        @foreach (config('options.tempos') as $value)
                                            <span class="btn btn-outline-primary btn-sm mb-2" onclick="toggleCheckbox(this)" style="display: inline-grid">
                                                <input class="d-none" type="checkbox" name="tempo" value="{{ $value['name'] }}">
                                                <h6 class="my-auto">{{ $value['name'] }}</h6>
                                            </span>
                                        @endforeach

                                        <br/><br/><br/>
                                        <h6>Length</h6>
                                        <img src="{{ asset('options/tabs/length.png') }}" alt="" width="50">
                                        @foreach (config('options.length') as $value)
                                            <span class="btn btn-outline-primary btn-sm mb-2" onclick="toggleCheckbox(this)" style="display: inline-grid">
                                                <input class="d-none" type="checkbox" name="length" value="{{ $value['name'] }}">
                                                <h6>{{ $value['data'] }}</h6>
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-lg mt-auto ml-auto btn-success" style="margin-left:40%; margin-top:20px">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>

    function toggleCheckbox(div) {
        // Get the hidden checkbox inside the span
        var checkbox = div.querySelector('input[type="checkbox"]');
        var checkboxes = div.parentNode.querySelectorAll('input[type="checkbox"]');
        var isSingleSelect = div.parentNode.parentNode.parentNode.getAttribute('data-single-select');

        // Check if the clicked checkbox is part of the tempo or length group
        var group = checkbox.getAttribute('name');
        var otherGroupName = group === 'tempo' ? 'length' : 'tempo';

        // If single select mode is enabled
        if (isSingleSelect === "true") {
            // Uncheck all checkboxes in the group
            checkboxes.forEach(function(item) {
                if (item.getAttribute('name') === group) {
                    item.checked = false;
                    item.parentNode.classList.remove('active');
                }
            });

            // Check the clicked checkbox
            checkbox.checked = true;

            // Add active class to the clicked span
            div.classList.add('active');
        } else {
            // Toggle the 'checked' attribute of the checkbox
            checkbox.checked = !checkbox.checked;

            // Toggle the 'active' class on the span
            if (checkbox.checked) {
                div.classList.add('active');
            } else {
                div.classList.remove('active');
            }
        }

        // Keep active class for the other group
        var otherCheckboxes = div.parentNode.parentNode.parentNode.querySelectorAll('input[type="checkbox"][name="' + otherGroupName + '"]');
        otherCheckboxes.forEach(function(item) {
            if (!checkbox.checked) {
                item.parentNode.classList.remove('active');
            }
        });
    }


        document.querySelectorAll('.next-stage').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var currentNavItem = document.querySelector('.nav-link.active');
                var nextTabId = this.getAttribute('data-next');
                var currentTabId = this.getAttribute('data-current');
                var nextNavItem = document.querySelector('[href="' + nextTabId + '"]');
                var prevImgElement = currentNavItem.querySelector('img');
                var nextImgElement = nextNavItem.querySelector('img');
                console.log(nextImgElement);
                // // Remove 'active' class from the current nav item
                currentNavItem.classList.remove('active');

                // Add 'active' class to the next nav item
                nextNavItem.classList.add('active');

                // // Hide the current tab pane
                document.getElementById(currentTabId.substr(1)).classList.remove('show', 'active');

                // // Show the next tab pane
                document.querySelector(nextTabId).classList.add('show', 'active');
                var nextOriginalSrc = nextImgElement.getAttribute('src');
                var prevOriginalSrc = prevImgElement.getAttribute('src');

                nextImgElement.setAttribute('src', nextOriginalSrc.replace('-black.png', '.png', ));
                prevImgElement.setAttribute('src', prevOriginalSrc.replace('.png', '-black.png'));

            });
        });

    document.querySelectorAll('.prev-stage').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var currentNavItem = document.querySelector('.nav-link.active');
            var prevTabId = this.getAttribute('data-prev');
            var prevNavItem = document.querySelector('[href="' + prevTabId + '"]');
            var currentTabId = this.getAttribute('data-current');
            var prevImgElement = prevNavItem.querySelector('img');
            var currentImgElement = currentNavItem.querySelector('img');

            // Remove 'active' class from the current nav item
            currentNavItem.classList.remove('active');

            // Add 'active' class to the previous nav item
            prevNavItem.classList.add('active');

            // Hide the current tab pane
            document.getElementById(currentTabId.substr(1)).classList.remove('show', 'active');
            var currentOriginalSrc = currentImgElement.getAttribute('src');
            var prevOriginalSrc = prevImgElement.getAttribute('src');
            // Show the previous tab pane
            document.querySelector(prevTabId).classList.add('show', 'active');

            currentImgElement.setAttribute('src', currentOriginalSrc.replace('.png', '-black.png' ));
            prevImgElement.setAttribute('src', prevOriginalSrc.replace('-black.png', '.png'));
        });
    });

        document.addEventListener('DOMContentLoaded', function() {
        // Get all navigation links
        var navLinks = document.querySelectorAll('.nav-link.tab');
        // Loop through each navigation link
        navLinks.forEach(function(navLink) {
            // Check if the navigation link has the 'active' class
            var isActive = navLink.classList.contains('active');
            // Get the image element inside the navigation link
            var imgElement = navLink.querySelector('img');

            // // Get the original image source
            var originalSrc = imgElement.getAttribute('src');

            // Modify the image source based on whether the navigation link is active or not
            if (isActive) {
                // If active, keep the original source
                imgElement.setAttribute('src', originalSrc.replace('-black.png', '.png', ));
            } else {
                // If not active, append '-black' to the original source
                imgElement.setAttribute('src', originalSrc.replace('.png', '-black.png',));
            }

        });
    });


    </script>
@endsection
