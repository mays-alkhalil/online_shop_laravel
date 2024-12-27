@extends('front.master')

@section('wishlist-active','active') <!-- This class can be adjusted to highlight the active page in the navigation -->

@section('title','Wish List')

@section('content')

@include('front.partials.breadcrumb',['pageName' => __('messages.wishlist')]) <!-- Using translation for "Wish List" -->

<!-- Wish List Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            @if($wishlists->isEmpty()) <!-- Check if wishlist is empty -->
                <div class="text-center">
                    <!-- Lottie Animation Placeholder -->
                    <div id="empty-wishlist-animation" style="width: 300px; height: 300px; margin: 0 auto;"></div>
                    <h1>{{ __('messages.empty_wishlist') }}</h1> <!-- Message when wishlist is empty -->
                </div>
            @else
                <div class="table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>{{ __('messages.product') }}</th> <!-- Product -->
                                <th>{{ __('messages.price') }}</th> <!-- Price -->
                                <th>{{ __('messages.action') }}</th> <!-- Action -->
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach($wishlists as $wishlist)
                                <tr>
                                    <td class="align-middle">
                                        <img src="{{ asset('storage/'.$wishlist->product->image) }}" alt="" style="width: 50px;">
                                        {{ $wishlist->product->name }}
                                    </td>
                                    <td class="align-middle">{{ $wishlist->product->price }} JOD</td>
                                    <td class="align-middle">
                                        <form action="{{ route('wishlist.remove', $wishlist->product_id) }}" method="POST" class="d-inline-block mr-2">
                                            @csrf
                                            @method('DELETE') <!-- Ensure this line is present -->
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-times"></i> {{ __('messages.remove') }} <!-- Remove -->
                                            </button>
                                        </form>
                                        <a href="{{ route('cart.add', $wishlist->product->id) }}" 
                                            class="btn btn-sm btn-primary d-inline-block" 
                                            onclick="showSweetAlert(event, {{ $wishlist->product->id }}); return false;">
                                            <i class="fa fa-cart-plus"></i> {{ __('add_to_cart') }} <!-- Add to Cart -->
                                         </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Wish List End -->

@endsection


