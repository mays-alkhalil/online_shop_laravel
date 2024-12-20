@extends('front.master')

@section('order-history-active','active') <!-- يمكن تعديل الكلاس لتحديد الصفحة النشطة في الـ Navigation -->

@section('title','Order History')

@section('content')

@include('front.partials.breadcrumb',['pageName' => 'Order History'])

<!-- Order History Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
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
                    <!-- Order 1 -->
                    <tr>
                        <td class="align-middle">#001</td>
                        <td class="align-middle">$500</td>
                        <td class="align-middle">2024-11-29</td>
                        <td class="align-middle">5</td>
                        <td class="align-middle">
                            <button class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i> 
                                <small>View Order Items</small>
                            </button>
                        </td>
                    </tr>
                    <!-- Order 2 -->
                    <tr>
                        <td class="align-middle">#002</td>
                        <td class="align-middle">$320</td>
                        <td class="align-middle">2024-11-27</td>
                        <td class="align-middle">3</td>
                        <td class="align-middle">
                            <button class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i> 
                                <small>View Order Items</small>
                            </button>
                        </td>
                    </tr>
                    <!-- Order 3 -->
                    <tr>
                        <td class="align-middle">#003</td>
                        <td class="align-middle">$250</td>
                        <td class="align-middle">2024-11-25</td>
                        <td class="align-middle">2</td>
                        <td class="align-middle">
                            <button class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i> 
                                <small>View Order Items</small>
                            </button>
                        </td>
                    </tr>
                    <!-- Order 4 -->
                    <tr>
                        <td class="align-middle">#004</td>
                        <td class="align-middle">$700</td>
                        <td class="align-middle">2024-11-22</td>
                        <td class="align-middle">7</td>
                        <td class="align-middle">
                            <button class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i> 
                                <small>View Order Items</small>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Order History End -->

@endsection
