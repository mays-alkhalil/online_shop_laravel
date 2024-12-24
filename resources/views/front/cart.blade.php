@extends('front.master')

@section('cart-active','active')

@section('title', __('cart.cart'))

@section('content')

@include('front.partials.breadcrumb',['pageName' => __('cart.cart')])

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Cart Table -->
        <div class="col-lg-8 mb-5">
            <div class="table-responsive">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{ __('messages.products') }}</th>
                            <th>{{ __('messages.price') }}</th>
                            <th>{{ __('messages.quantity') }}</th>
                            <th>{{ __('messages.total') }}</th>
                            <th>{{ __('messages.action') }}</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @if($cartItems->isEmpty())
                            <tr>
                                <td colspan="5">{{ __('messages.empty_cart') }}</td>
                            </tr>
                        @else
                            @foreach($cartItems as $item)
                                <tr id="cart-item-{{ $item->id }}">
                                    <td class="align-middle d-flex align-items-center">
                                        <img src="{{ asset('storage/'.$item->product->image) }}" alt="" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover;">
                                        <span class="ml-3">{{ $item->product->name }}</span>
                                    </td>
                                    <td class="align-middle">{{ $item->product->price }} JOD</td>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </form>
                                            <span class="mx-2">{{ $item->quantity }}</span>
                                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="align-middle total" id="total-{{ $item->id }}">
                                        {{ $item->product->price * $item->quantity }} JOD
                                    </td>
                                    <td class="align-middle">
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-times"></i> {{ __('messages.remove') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Cart Summary -->
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">{{ __('messages.summary') }}</span></h5>
            <div class="bg-light p-4 rounded">
                <div class="border-bottom pb-3">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>{{ __('messages.subtotal') }}</h6>
                        <h6 id="subtotal">{{ $cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) }} JOD</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">{{ __('messages.shipping') }}</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="pt-3">
                    <div class="d-flex justify-content-between">
                        <h5>{{ __('messages.total_price') }}</h5>
                        <h5 id="total">{{ $cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) + 10 }} JOD</h5>
                    </div>
                    <a href="{{ route('front.checkout') }}">
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">{{ __('messages.proceed_checkout') }}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
 
@endsection
