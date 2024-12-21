@extends('front.master')

@section('order-items-active', 'active') 

@section('title', 'Order Items')

@section('content')

@include('front.partials.breadcrumb', ['pageName' => 'Order Items'])

<!-- Order Items Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <h3>Order ID: {{ $order->id }}</h3>
            @if($order->orderItems->isNotEmpty()) <!-- التحقق من وجود عناصر -->
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach($order->orderItems as $orderItem)
                        <tr>
                            <td class="align-middle">
                                <img src="{{ asset('storage/' . $orderItem->product->id . '.jpg') }}" alt="{{ $orderItem->product->name }}" style="width: 50px;">
                                {{ $orderItem->product->name }}
                            </td>
                            <td class="align-middle">{{ $orderItem->quantity }}</td>
                            <td class="align-middle">${{ number_format($orderItem->unit_price, 2) }}</td>
                            <td class="align-middle">${{ number_format($orderItem->total_price, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No order items available for this order.</p>
            @endif
        </div>
    </div>
</div>
<!-- Order Items End -->

@endsection
