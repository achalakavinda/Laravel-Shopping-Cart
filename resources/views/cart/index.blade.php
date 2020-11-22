<?php
    $Brands = \App\Models\Ims\Brand::all();
    $ItemCodes = \App\Models\Ims\ItemCode::all();
?>

@push('css')

@endpush

@push('js')

@endpush

@extends('layouts.cart')
@section('content')
    <!-- Slider -->
    <div class="main_slider" style="background-image:url({{ asset('colorshop/images/slider_1.jpg') }})">
        <div class="container fill_height">
            <div class="row align-items-center fill_height">
                <div class="col">
                    <div class="main_slider_content">
                        <h1>Hawaii Shirt Collection 2020</h1>
{{--                        <h1>Get up to 30% Off New Arrivals</h1>--}}
{{--                        <div class="red_button shop_now_button"><a href="#">shop now</a></div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('cart.components.new-arrival-area.index')
    @include('cart.components.banner-area.index')
{{--    @include('cart.components.deal_of_the_week.index')--}}
    @include('cart.components.best-sellers.index')
@endsection
