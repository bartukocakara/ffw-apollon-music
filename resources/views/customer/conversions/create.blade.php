@extends('customer.layouts.master')

@section('title', __('Conversion'))
@section('breadcrumb', 'Conversion')
@section('banner-label', __('Create music'))

@section('content')
    @include('customer.layouts.breadcrum-no-height')
    <form  method="POST" action="{{ route('customer.conversions.store') }}" class="needs-validation mb-2" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="container pb-2 py-lg-3">
            <div class="row">
                <h6>Genres</h6>
                <!-- Text input -->
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="genres" name="genres[]" value="Rock">
                    <label class="form-check-label" for="genres">Rock</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="genres" name="genres[]" value="Acoustic">
                    <label class="form-check-label" for="genres">Acoustic</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="genres" name="genres[]" value="Hip Hop">
                    <label class="form-check-label" for="genres">Hip Hop</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="genres" name="genres[]" value="R&B">
                    <label class="form-check-label" for="genres">R&B</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="genres" name="genres[]" value="Latin">
                    <label class="form-check-label" for="genres">Latin</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="genres" name="genres[]" value="Funk">
                    <label class="form-check-label" for="genres">Funk</label>
                </div>
                ...

            </div>
            <x-input-error :messages="$errors->get('genres')" class="text-danger list-unstyled text-bold" />

            <br/>
            <div class="row my-4">
                <h6>Themes</h6>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="themes" name="themes[]" value="Corporate">
                    <label class="form-check-label" for="themes">Corporate</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="themes" name="themes[]" value="Photography">
                    <label class="form-check-label" for="themes">Photography</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="themes" name="themes[]" value="Motivational & Inspiring">
                    <label class="form-check-label" for="themes">Motivational & Inspiring</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="themes" name="themes[]" value="Cinematic">
                    <label class="form-check-label" for="themes">Cinematic</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="themes" name="themes[]" value="Comedy">
                    <label class="form-check-label" for="themes">Comedy</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="themes" name="themes[]" value="Fashion & Beauty">
                    <label class="form-check-label" for="themes">Fashion & Beauty</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="themes" name="themes[]" value="Nature">
                    <label class="form-check-label" for="themes">Nature</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="themes" name="themes[]" value="Sports & Action">
                    <label class="form-check-label" for="themes">Sports & Action</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="themes" name="themes[]" value="Technology">
                    <label class="form-check-label" for="themes">Technology</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="themes" name="themes[]" value="Tutorials">
                    <label class="form-check-label" for="themes">Tutorials</label>
                </div>
                <div class="form-check col-1">
                    <input class="form-check-input" type="checkbox" id="themes" name="themes[]" value="Travel">
                    <label class="form-check-label" for="themes">Travel</label>
                </div>
                ...
            </div>
            <x-input-error :messages="$errors->get('themes')" class="text-danger list-unstyled text-bold" />

            <br/>
            <div class="mb-4 w-25">
                <h6>Length</h6>
                <input class="form-control" name="length" type="number" id="length" value="30">
                <x-input-error :messages="$errors->get('themes')" class="text-danger list-unstyled text-bold" />

            </div>
            <br/>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04" class="form-label">Tempo</label>
                <select class="form-select" id="validationCustom04" name="tempo" required>
                    <option value="low">Slow</option>
                    <option value="normal">Normal</option>
                    <option value="high">High</option>
                </select>
                <x-input-error :messages="$errors->get('tempo')" class="text-danger list-unstyled text-bold" />
            </div>
            <br/>
            <div class="mb-4  w-25">
                <h6>Image</h6>
                <input class="form-control" type="file" id="file-input" name="image">
            </div>
            <button class="btn btn-info" type="submit">
                Save
            </button>
        </div>
    </form>
</section>

@endsection
