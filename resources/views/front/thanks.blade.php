@extends('front.master')

@section('thanks-active', 'active')
@section('title', 'Thanks')

@section('content')

@include('front.partials.breadcrumb',['pageName' => 'Thanks'])

<!-- Success Message -->
<div class="container mt-5 d-flex flex-column align-items-center justify-content-center" style="min-height: 70vh;">
    <h2 style="margin-top: -110px">You have successfully placed your order.</h2>
    <p>Thank You!</p>

    <!-- الأنيميشن الأول -->
    <div id="animationOne" style="width: 400px; height: 400px; margin: 10px auto;"></div>

    <!-- الأنيميشن الثاني -->
    <div id="animationTwo" style="width: 300px; height: 300px; margin: -390px auto 20px; opacity: 0; transition: opacity 1s;"></div>
</div>

@endsection
