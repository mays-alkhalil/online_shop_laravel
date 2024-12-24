@extends('front.master')

@section('checkout-active', 'active')
@section('title', __('messages.checkout'))

@section('content')

@include('front.partials.breadcrumb', ['pageName' => __('messages.checkout')])

<!-- Checkout Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Left Column (Shipping Information) -->
        <div class="col-lg-8">
            <div class="bg-light p-30 mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">{{ __('messages.shipping_address') }}</span></h5>
                <form id="checkout-form" action="{{route('front.checkout')}}" method="POST">
                    @csrf  <!-- Adding CSRF token for security -->
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="firstName">{{ __('messages.first_name') }}</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="{{ __('messages.first_name') }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="lastName">{{ __('messages.last_name') }}</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="{{ __('messages.last_name') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">{{ __('messages.address') }}</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="{{ __('messages.address') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">{{ __('messages.phone_number') }}</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="{{ __('messages.phone_number') }}" required>
                    </div>

                    <!-- Payment Method Selection -->
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">{{ __('messages.payment_information') }}</span></h5>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input checked type="radio" class="custom-control-input" name="paymentMethod" id="payment_method_two" value="cash" onclick="document.getElementById('cardPaymentForm').classList.add('d-none');">
                            <label class="custom-control-label" for="payment_method_two">{{ __('messages.cash_on_delivery') }}</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="paymentMethod" id="payment_method_one" value="card" onclick="document.getElementById('cardPaymentForm').classList.remove('d-none');">
                            <label class="custom-control-label" for="payment_method_one">{{ __('messages.pay_with_card') }}</label>
                        </div>
                    </div>

                    <!-- Card Payment Form (conditionally visible) -->
                    <div id="cardPaymentForm" class="d-none">
                        <div class="form-group">
                            <label for="cardNumber">{{ __('messages.card_number') }}</label>
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="{{ __('messages.card_number') }}">
                        </div>
                        <div class="form-group">
                            <label for="expiryDate">{{ __('messages.expiry_date') }}</label>
                            <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="{{ __('messages.expiry_date') }}">
                        </div>
                        <div class="form-group">
                            <label for="cvv">{{ __('messages.cvv') }}</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="{{ __('messages.cvv') }}">
                        </div>
                    </div>

                    <input type="hidden" name="totalAmount" value="{{ $cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) + 10 }}">

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">{{ __('messages.place_order') }}</button>
                </form>
            </div>
        </div>

        <!-- Right Column (Order Summary) -->
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">{{ __('messages.order_total') }}</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">{{ __('messages.products') }}</h6>
                    <!-- Display Cart Items -->
                    @foreach($cartItems as $item)
                    <div class="d-flex justify-content-between">
                        <p>{{ $item->product->name }}</p>
                        <p>{{  $item->product->price * $item->quantity }} JOD</p>
                    </div>
                    @endforeach
                </div>
                <div class="border-bottom pt-3 pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>{{ __('messages.subtotal') }}</h6>
                        <h6>${{ $cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) }}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">{{ __('messages.shipping') }}</h6>
                        <h6 class="font-weight-medium">{{ $shipping }} JOD</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h6>{{ __('messages.discount') }}</h6>
                        <h6>{{ session('coupon_discount_value', 0) }}%</h6>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <h5>{{ __('messages.total') }}</h5>
                        <h5>
                            @php
                                $subtotal = $cartItems->sum(function($item) { return $item->product->price * $item->quantity; });
                                $discountAmount = $subtotal * (session('coupon_discount_value', 0) / 100);
                                $totalAmount = $subtotal - $discountAmount + $shipping;
                            @endphp
                            {{ $totalAmount }} JOD
                        </h5>
                    </div>
                </div>
                <!-- Coupon Section -->
                <div class="bg-light p-30 mb-5">
                    <form id="apply-coupon-form" action="{{ route('front.applyCoupon') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="couponCode" placeholder="{{ __('messages.enter_coupon') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">{{ __('messages.apply_coupon') }}</button>
                            </div>
                        </div>
                        @if (session('coupon_error'))
                            <div class="text-danger mt-2">{{ session('coupon_error') }}</div>
                        @endif
                        @if (session('coupon_success'))
                            <div class="text-success mt-2">{{ session('coupon_success') }}</div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Checkout End -->
@endsection
