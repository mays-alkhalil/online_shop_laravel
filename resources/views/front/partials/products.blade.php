@extends('front.master')

@section('contact-active','active')


@section('title','Contact')


@section('content')
@foreach($products as $product)
    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
        <div class="product-item bg-light mb-4">
            <div class="product-img position-relative overflow-hidden">
                <img class="img-fluid w-100" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="product-action">
                    <a class="btn btn-outline-dark btn-square" href="{{ route('wishlist.add', $product->id) }}"><i class="far fa-heart"></i></a>
                    <a class="btn btn-outline-dark btn-square" href="{{ route('cart.add', $product->id) }}"><i class="fa fa-shopping-cart"></i></a>
                    <a class="btn btn-outline-dark btn-square" href="{{ route('front.details.show', $product->id) }}"><i class="fa fa-search"></i></a>
                </div>
            </div>
            <div class="text-center py-4">
                <a class="h6 text-decoration-none text-truncate" href="">{{ $product->name }}</a>
                <div class="d-flex align-items-center justify-content-center mt-2">
                    <h5>${{ number_format($product->price, 2) }}</h5>
                    @if($product->old_price)
                        <h6 class="text-muted ml-2"><del>${{ number_format($product->old_price, 2) }}</del></h6>
                    @endif
                </div>
                {{-- <div class="d-flex align-items-center justify-content-center mb-1">
                    @for($i = 0; $i < 5; $i++)
                        <small class="fa fa-star {{ $i < floor($product->averageRating()) ? 'text-primary' : '' }} mr-1"></small>
                    @endfor
                </div> --}}
            </div>
        </div>
    </div>
@endforeach
