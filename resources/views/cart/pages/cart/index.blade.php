<?php
$Items = [1];
?>
@extends('layouts.cart')
@section('content')

<div style="padding-top: 300px" class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="col-12">
                    @include('layouts.status')
                </div>
                <div class="cart-title mt-50">
                    <h2>Shopping Cart</h2>
                </div>

                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('cart'))
                            <?php $total = 0; ?>
                            @foreach(session('cart') as $id => $detail)
                            <?php $total = $total + $detail['price']; ?>
                            <tr>
                                <td class="cart_product_img">
                                    <a href="#"><img style="width:50%;" src="{{ $detail['img'] }}" alt="Product"></a>
                                </td>
                                <td class="cart_product_desc">
                                    <h5>{{ $detail['name'] }}</h5>
                                    <p>{{ $detail['colorSize'] }}</p>
                                </td>
                                <td class="price">
                                    <span>{{ $detail['price'] }}/=</span>
                                </td>
                                <td class="qty">
                                    <span>{{ $detail['quantity'] }}</span>
                                    <form action="{{ url('itemRemove') }}/{{ $detail['id'] }}" method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-sm btn-danger">del</button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                            <?php session()->put('total', $total); ?>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="cart-summary">
                    <h5>Cart Total</h5>
                    <ul class="summary-table">
                        <li><span>subtotal:</span> <span>@if(session('cart')){{$total}}/=</span>@endif</li>
                        <li><span>delivery:</span> <span>@if(session('cart'))Free</span>@endif</li>
                        <li><span>total:</span> <span>@if(session('cart')){{$total}}/=</span>@endif</li>
                    </ul>
                    <div class="cart-btn mt-100">
                        <a href="{!! url('checkout') !!}" class="btn amado-btn w-100">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
