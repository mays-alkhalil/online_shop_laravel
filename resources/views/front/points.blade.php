@extends('front.master')

@section('points-active','active') <!-- يمكن تعديل الكلاس لتحديد الصفحة النشطة في الـ Navigation -->

@section('title','Points')

@section('content')

@include('front.partials.breadcrumb',['pageName' => 'Points'])

<!-- Points Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Total Earned Points</th>
                        <th>Points Used</th>
                        <th>Remaining Points</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <!-- Example Row 1 -->
                    <tr>
                        <td class="align-middle">500</td>
                        <td class="align-middle">200</td>
                        <td class="align-middle">300</td>
                        <td class="align-middle">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-exchange-alt"></i> Redeem</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Points End -->

@endsection
