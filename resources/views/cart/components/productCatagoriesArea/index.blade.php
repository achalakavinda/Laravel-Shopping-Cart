<!-- products catagories area component -->
<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">
        @foreach($Brands as $brand)
            <!-- Single Catagory -->
                <div style="padding: 5px" class="single-products-catagory clearfix">
                    <a href="{{ url('shop') }}/{{ $brand->slug }}">
                        <img src="{{ $brand->img_url }}" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>{!! $brand->description !!}</p>
                            <h4>{!! $brand ->name !!}</h4>
                        </div>
                    </a>
                </div><!-- /Single Catagory -->
        @endforeach
    </div>
</div>
