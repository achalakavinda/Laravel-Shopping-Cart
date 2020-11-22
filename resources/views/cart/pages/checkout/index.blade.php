@extends('layouts.cart')
@section('content')


<div style="padding-top:300px" class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-title">
                        <h2>Checkout</h2>
                    </div>

                    <form action="{{ url('purchase') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                                    id="customer_name" name="customer_name" value="{{ old('customer_name') }}"
                                    placeholder="Full Name" required>
                                @error('customer_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text"
                                    class="form-control mb-3  @error('delivery_address') is-invalid @enderror"
                                    name="delivery_address" id="delivery_address" placeholder="Address"
                                    value="{{ old('delivery_address') }}">
                                @error('delivery_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control  @error('contact') is-invalid @enderror"
                                    id="contact" name="contact" min="0" placeholder="Phone No"
                                    value="{{ old('contact') }}">
                                @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <textarea class="form-control w-100  @error('remarks') is-invalid @enderror"
                                    id="remarks" name="remarks" cols="30" rows="10"
                                    placeholder="Leave a comment about your order">{{ old('remarks') }}</textarea>
                                @error('remarks')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="cart-summary">
                    <h5>Cart Total</h5>
                    <ul class="summary-table">
                        <li><span>subtotal:</span> @if(session('total'))<span>{{ session()->get('total')}}/=</span>
                            @endif
                        </li>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><span>total:</span> @if(session('total'))<span>{{ session()->get('total')}}/=</span> @endif
                        </li>
                    </ul>

                    <div class="payment-method">
                        <!-- Cash on delivery -->
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="cod" checked>
                            <label class="custom-control-label" for="cod">Cash on Delivery</label>
                        </div>
                        <!-- Paypal -->
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="paypal">
                            <label class="custom-control-label" for="paypal">Paypal <img class="ml-15"
                                    src="img/core-img/paypal.png" alt=""></label>
                        </div>
                    </div>

                    <div class="cart-btn mt-100">
                        <button type="submit" class="btn amado-btn w-100">Checkout</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
