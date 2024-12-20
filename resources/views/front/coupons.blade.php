@extends('front.master')

@section('coupons-active','active') <!-- يمكن تعديل الكلاس لتحديد الصفحة النشطة في الـ Navigation -->

@section('title','Coupons')

@section('content')

@include('front.partials.breadcrumb',['pageName' => 'Coupons'])

<!-- Coupons Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Coupon Name</th>
                        <th>Code</th>
                        <th>Discount</th>
                        <th>Expiration Date</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <!-- Coupon 1 -->
                    <tr>
                        <td class="align-middle">Summer Sale</td>
                        <td class="align-middle">SUMMER20</td>
                        <td class="align-middle">20% Off</td>
                        <td class="align-middle">2024-12-31</td>
                    </tr>
                    <!-- Coupon 2 -->
                    <tr>
                        <td class="align-middle">Black Friday</td>
                        <td class="align-middle">BLACKFRIDAY50</td>
                        <td class="align-middle">50% Off</td>
                        <td class="align-middle">2024-11-30</td>
                    </tr>
                    <!-- Coupon 3 -->
                    <tr>
                        <td class="align-middle">Free Shipping</td>
                        <td class="align-middle">FREESHIP</td>
                        <td class="align-middle">Free Shipping</td>
                        <td class="align-middle">2025-01-15</td>
                    </tr>
                    <!-- Coupon 4 -->
                    <tr>
                        <td class="align-middle">Holiday Special</td>
                        <td class="align-middle">HOLIDAY25</td>
                        <td class="align-middle">$25 Off</td>
                        <td class="align-middle">2024-12-25</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Coupons End -->

@endsection
