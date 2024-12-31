@extends('front.master')

@section('order-history-active','active') <!-- يمكن تعديل الكلاس لتحديد الصفحة النشطة في الـ Navigation -->

@section('title','Order History')

@section('content')

@include('front.partials.breadcrumb',['pageName' => 'Order History'])

<!-- Order History Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            @if($orders->isEmpty()) <!-- Check if there are no orders -->
                <!-- Lottie Animation Placeholder -->
                <div id="empty-orders-animation" style="width: 300px; height: 300px; margin: 0 auto;"></div>
                <h1 class="text-center">
                    <strong>No orders found!</strong> You haven't placed any orders yet.
                </h1>
            @else
                <div class="table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Order ID</th>
                                <th>Total Price</th>
                                {{-- <th>Items Count</th> --}}
                                <th>Payment Method</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach($orders as $order)
                            <tr>
                                <td class="align-middle">#{{ $order->id }}</td>
                                <td class="align-middle">
                                    @if($order->total_amount == 0)
                                        $20.00
                                    @else
                                        ${{ number_format($order->total_amount, 2) }}
                                    @endif
                                </td>
                                {{-- <td class="align-middle">{{ $order->items_count }}</td> --}}
                                <td class="align-middle">{{ $order->payment_method }}</td>
                                <td class="align-middle">{{ $order->address }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Order History End -->

@endsection
