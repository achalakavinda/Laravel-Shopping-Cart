<!-- New Arrivals -->
<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>Shop</h2>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col text-center">
                <div class="new_arrivals_sorting">
                    <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
                        @foreach($Brands as $item)
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".{{ $item->id }}">{{ $item->name }}</li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                @foreach($ItemCodes as $item)
                    <!-- Product {{ $item->id }} -->
                        <div class="product-item {{ $item->brand_id }}">
                            <div class="product discount product_filter">
                                <div  class="product_image">
                                    <img src="{{ $item->thumbnail_url }}" alt="{{ $item->name }}">
                                </div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="{{ url('product-detail') }}/{{ $item->id }}">{{ $item->name }}</a></h6>
                                    <div class="product_price">{{ $item->selling_price }} /=</div>
                                </div>
                                <div class="red_button add_to_cart_button"><a href="{{ url('product-detail') }}/{{ $item->id }}">add to cart</a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
