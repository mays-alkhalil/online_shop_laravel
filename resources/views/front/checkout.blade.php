@extends('front.master')

@section('checkout-active', 'active')
@section('title', 'Checkout')

@section('content')

@include('front.partials.breadcrumb', ['pageName' => 'Checkout'])

<!-- Checkout Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Left Column (Shipping Information) -->
        <div class="col-lg-8">
            <div class="bg-light p-30 mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                <form id="checkout-form" action="{{route('front.checkout')}}" method="POST">
                    @csrf  <!-- Adding CSRF token for security -->
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="123 Street, City" required>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required>
                    </div>

                    <!-- Payment Method Selection -->
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment Information</span></h5>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input checked type="radio" class="custom-control-input" name="paymentMethod" id="payment_method_two" value="cash" onclick="document.getElementById('cardPaymentForm').classList.add('d-none');">
                            <label class="custom-control-label" for="payment_method_two">Cash on Delivery</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="paymentMethod" id="payment_method_one" value="card" onclick="document.getElementById('cardPaymentForm').classList.remove('d-none');">
                            <label class="custom-control-label" for="payment_method_one">Pay with Card</label>
                        </div>
                    </div>

                    <!-- Card Payment Form (conditionally visible) -->
                    <div id="cardPaymentForm" class="d-none">
                        <div class="form-group">
                            <label for="cardNumber">Card Number</label>
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Card Number">
                        </div>
                        <div class="form-group">
                            <label for="expiryDate">Expiry Date</label>
                            <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY">
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                </form>
            </div>
        </div>

        <!-- Right Column (Order Summary) -->
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">Products</h6>

                    <!-- Display Cart Items -->
                    @foreach($cartItems as $item)
                    <div class="d-flex justify-content-between">
                        <p>{{ $item->product->name }}</p>
                        <p>${{  $item->product->price * $item->quantity }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="border-bottom pt-3 pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>${{ $item->product->price * $item->quantity }}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">${{ $shipping }}</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>${{ $cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) + 10 }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->
@endsection
