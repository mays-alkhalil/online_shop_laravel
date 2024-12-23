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
                    @forelse($coupons as $coupon)
                        <tr>
                            <td class="align-middle">{{ $coupon->id }}</td>
                            <td class="align-middle">{{ $coupon->code }}</td>
                            <td class="align-middle">
                                {{ is_numeric($coupon->discount) ? $coupon->discount . '%' : $coupon->discount }}
                            </td>
                            <td class="align-middle">{{ $coupon->expires_at ?? 'No Expiration Date' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Coupons Available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Coupons End -->

@endsection
