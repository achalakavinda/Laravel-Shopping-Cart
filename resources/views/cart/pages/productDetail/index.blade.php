@extends('layouts.cart')

@push('css')
    <link rel="stylesheet" href="{{ asset('colorshop/plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('colorshop/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('colorshop/styles/single_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('colorshop/styles/single_responsive.css') }}">
@endpush

@push('js')
    <script src="{{ asset('colorshop/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
    <script src="{{ asset('colorshop/js/single_custom.js') }}"></script>
@endpush


@section('content')

    <div class="container single_product_container">
    <div class="row">
        <div class="col">

            <!-- Breadcrumbs -->
            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="categories.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Men's</a></li>
                    <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="single_product_pics">
                <div class="row">
                    <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                        <div class="single_product_thumbnails">
                            <ul>
                                <li style="height: auto" class="active"><img src="{{ $ItemCode->thumbnail_url }}" alt="" data-image="{{ $ItemCode->thumbnail_url }}"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 image_col order-lg-2 order-1">
                        <div class="single_product_image">
                            <div class="single_product_image_background" style="background-image:url({{ $ItemCode->thumbnail_url }})"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="product_details">
                <div class="product_details_title">
                    <h2>{!! $ItemCode->name !!}</h2>
                    <p>{!! $ItemCode->description !!}</p>
                </div>
                <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                    <span class="ti-truck"></span><span>free delivery</span>
                </div>
                <div class="product_price">{!! $ItemCode->selling_price !!} /=</div>
                <ul class="star_rating">
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                </ul>

                <!-- Add to Cart Form -->
                <form class="" method="post" action="{{ url('addtocart') }}">
                    @csrf


                    @if ($stockItem)
                    <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                        <span>Item Code:</span>
                        <select class="quantity_selector" name="stockItem_id" id="drop">
                            @foreach ($stockItem as $stockItem)
                                <option value="{{ $stockItem->id }}">
                                    {{$stockItem->itemCodeColor->color}} /
                                    {{$stockItem->itemCodeSize->size}}
                                </option>

                            @endforeach
                        </select>
                    </div>
                    @endif

                        <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                            <span>Quantity:</span>
                            <div class="quantity_selector">

                                <span class="qty-minus"
                                      onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                        class="fa fa-caret-down" aria-hidden="true"></i></span>
                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="300"
                                       name="quantity" value="1">
                                <span class="qty-plus"
                                      onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                        class="fa fa-caret-up" aria-hidden="true"></i></span>

                            </div>
                            <button type="submit" name="addtocart" class="btn amado-btn">Add to cart</button>
                        </div>


                </form>


            </div>
        </div>
    </div>
</div>
<!-- Tabs -->
<div class="tabs_section_container">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabs_container">
                    <ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
                        <li class="tab active" data-active-tab="tab_1"><span>Description</span></li>
                        <li class="tab" data-active-tab="tab_2"><span>Additional Information</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <!-- Tab Description -->

                <div id="tab_1" class="tab_container active">
                    <div class="row">
                        <div class="col-lg-5 desc_col">
                            <div class="tab_title">
                                <h4>Description</h4>
                            </div>
                            <div class="tab_text_block">
                                <h2>{!! $ItemCode->name !!}</h2>
                                <p>{!! $ItemCode->description !!}</p>
                            </div>
                            <div class="tab_image">
                                <img src="{!! $ItemCode->thumbnail_url !!}" alt="">
                        </div>

{{--                        <div class="col-lg-5 offset-lg-2 desc_col">--}}
{{--                            <div class="tab_image">--}}
{{--                                <img src="{{ asset('colorshop/images/desc_1.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="tab_text_block">--}}
{{--                                <h2>Pocket cotton sweatshirt</h2>--}}
{{--                                <p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>--}}
{{--                            </div>--}}
{{--                            <div class="tab_image desc_last">--}}
{{--                                <img src="{{ asset('colorshop/images/desc_1.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                </div>

                <!-- Tab Additional Info -->
                <div id="tab_2" class="tab_container">
                    <div class="row">
                        <div class="col additional_info_col">
                            <div class="tab_title additional_info_title">
                                <h4>Additional Information</h4>
                            </div>
                            <p>SIZE:<span>S,M,L</span></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
