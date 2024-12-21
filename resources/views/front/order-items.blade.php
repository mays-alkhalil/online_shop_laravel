@extends('front.master')

@section('order-items-active', 'active') <!-- يمكن تعديل الكلاس لتحديد الصفحة النشطة في الـ Navigation -->

@section('title', 'Order Items')

@section('content')

@include('front.partials.breadcrumb', ['pageName' => 'Order Items'])

<!-- Order Items Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
               
                    <tbody class="align-middle">
                        @foreach($orders as $order)
                        <h3>Order ID: {{ $order->id }}</h3>
                        @if(isset(${'orderItems_' . $order->id}) && ${'orderItems_' . $order->id}->isNotEmpty())
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
                                    @foreach(${'orderItems_' . $order->id} as $orderItem)
                                    <tr>
                                        <td class="align-middle">
                                            <img src="{{ asset('storage/images/' . $orderItem->product->id . '.jpg') }}" alt="{{ $orderItem->product->name }}" style="width: 50px;">
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
                    @endforeach
                                        </tbody>
                </table>
        </div>
    </div>
</div>
<!-- Order Items End -->

@endsection
