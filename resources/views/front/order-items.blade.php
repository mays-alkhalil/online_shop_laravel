@extends('front.master')

@section('order-items-active','active') <!-- يمكن تعديل الكلاس لتحديد الصفحة النشطة في الـ Navigation -->

@section('title','Order Items')

@section('content')

@include('front.partials.breadcrumb',['pageName' => 'Order Items'])

<!-- Order Items Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
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
                    <!-- Order Item 1 -->
                    <tr>
                        <td class="align-middle">
                            <img src="{{ asset('front-assets') }}/img/product-1.jpg" alt="" style="width: 50px;"> Product Name 1
                        </td>
                        <td class="align-middle">2</td>
                        <td class="align-middle">$150</td>
                        <td class="align-middle">$300</td>
                    </tr>
                    <!-- Order Item 2 -->
                    <tr>
                        <td class="align-middle">
                            <img src="{{ asset('front-assets') }}/img/product-2.jpg" alt="" style="width: 50px;"> Product Name 2
                        </td>
                        <td class="align-middle">1</td>
                        <td class="align-middle">$200</td>
                        <td class="align-middle">$200</td>
                    </tr>
                    <!-- Order Item 3 -->
                    <tr>
                        <td class="align-middle">
                            <img src="{{ asset('front-assets') }}/img/product-3.jpg" alt="" style="width: 50px;"> Product Name 3
                        </td>
                        <td class="align-middle">3</td>
                        <td class="align-middle">$120</td>
                        <td class="align-middle">$360</td>
                    </tr>
                    <!-- Order Item 4 -->
                    <tr>
                        <td class="align-middle">
                            <img src="{{ asset('front-assets') }}/img/product-4.jpg" alt="" style="width: 50px;"> Product Name 4
                        </td>
                        <td class="align-middle">1</td>
                        <td class="align-middle">$180</td>
                        <td class="align-middle">$180</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Order Items End -->

@endsection
