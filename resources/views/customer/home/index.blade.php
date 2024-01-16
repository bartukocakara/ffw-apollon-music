@extends('customer.layouts.master')
@section('title', __('Home'))

@section('content')
    @include('customer.home.components.banner')
    @include('customer.home.components.examples')
    @include('customer.home.components.how-it-works')
    @include('customer.home.components.instrumentals')
    @include('customer.home.components.use-cases')

@endsection
