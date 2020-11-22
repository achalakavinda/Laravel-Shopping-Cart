<!-- Banner -->
<div style="margin-top: 100px;background-color: rgba(0,0,0,0.1);padding: 50px 50px" class="banner">
    <div class="container">
        <div class="row">
            @foreach($Brands as $item)
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url({{ $item->img_url  }})">
                        <div class="banner_category">
                            <a href="{{ url('shop') }}/{{ $item->slug }}">{{ $item->name }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
