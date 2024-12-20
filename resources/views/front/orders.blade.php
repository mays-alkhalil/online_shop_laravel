@extends('front.master')

@section('order-history-active','active') <!-- يمكن تعديل الكلاس لتحديد الصفحة النشطة في الـ Navigation -->

@section('title','Order History')

@section('content')

@include('front.partials.breadcrumb',['pageName' => 'Order History'])

<!-- Order History Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            @if($orders->isEmpty())
                <!-- رسالة عندما لا توجد طلبات -->
                <div class="alert alert-warning text-center">
                    <strong>No orders found!</strong> You haven't placed any orders yet.
                </div>
            @else
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Order ID</th>
                            <th>Total Price</th>
                            <th>Date</th>
                            <th>Items Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach($orders as $order)
                        <tr>
                            <td class="align-middle">#{{ $order->id }}</td>
                            <td class="align-middle">${{ $order->total_price }}</td>
                            <td class="align-middle">{{ $order->order_date }}</td>
                            <td class="align-middle">{{ $order->items_count }}</td>
                            <td class="align-middle">
                                <a href="{{ route('front.order', $order->id) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye"></i> 
                                    <small>View Order Items</small>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
<!-- Order History End -->

@endsection
