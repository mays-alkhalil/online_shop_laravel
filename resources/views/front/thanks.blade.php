@extends('front.master')

@section('thanks-active', 'active')
@section('title', 'Thanks')

@section('content')

@include('front.partials.breadcrumb',['pageName' => 'Thanks'])

<!-- Success Message -->
<div class="container mt-5">
    <div class="alert alert-success text-center">
        <h4>You have successfully placed your order.</h4>
        <p>Thank You!</p>
        
    </div>
</div>

@endsection
