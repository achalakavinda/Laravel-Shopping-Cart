@extends('layouts.cart')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('colorshop/styles/categories_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('colorshop/styles/categories_responsive.css') }}">
    @endpush
@push('js')
    <script src="{{ asset('colorshop/js/categories_custom.js') }}"></script>
@endpush

@section('content')
    <div class="container product_section_container">
        <div class="row">
            <div class="col product_section clearfix">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Men's</a></li>
                    </ul>
                </div>

                <!-- Sidebar -->

                <div class="sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Product Category</h5>
                        </div>
                        <ul class="sidebar_categories">
                            <li><a href="#">Men</a></li>
                        </ul>
                    </div>


                    <!-- Sizes -->
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Sizes</h5>
                        </div>
                        <ul class="checkboxes">
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>S</span></li>
                            <li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>M</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>L</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>XL</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>XXL</span></li>
                        </ul>
                    </div>

                </div>

                <!-- Main Content -->

                <div class="main_content">

                    <!-- Products -->

                    <div class="products_iso">
                        <div class="row">
                            <div class="col">

                                <!-- Product Sorting -->

                                <div class="product_sorting_container product_sorting_container_top">
                                    <ul class="product_sorting">
                                        <li>
                                            <span class="type_sorting_text">Default Sorting</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_type">
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <span>Show</span>
                                            <span class="num_sorting_text">6</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_num">
                                                <li class="num_sorting_btn"><span>6</span></li>
                                                <li class="num_sorting_btn"><span>12</span></li>
                                                <li class="num_sorting_btn"><span>24</span></li>
                                            </ul>
                                        </li>
                                    </ul>

                                </div>

                                <!-- Product Grid -->

                                <div class="product-grid">

                                @foreach($ItemCodes as $itemCode)
                                    <!-- Product {{ $itemCode->id }} -->
                                        <div class="product-item {{ $itemCode->brand_id }}">
                                            <div class="product discount product_filter">
                                                <div  class="product_image">
                                                    <img src="{{ $itemCode->thumbnail_url }}" alt="{{ $itemCode->name }}">
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_name"><a href="{{ url('product-detail') }}/{{ $itemCode->id }}">{{ $itemCode->name }}</a></h6>
                                                    <div class="product_price">{{ $itemCode->selling_price }} /=</div>
                                                </div>
                                                <div class="red_button add_to_cart_button"><a href="{{ url('product-detail') }}/{{ $itemCode->id }}">add to cart</a></div>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>

                                <!-- Product Sorting -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
