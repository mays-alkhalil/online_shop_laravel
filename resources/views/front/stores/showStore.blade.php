@extends('front.master')

@section('shop-active','active')

@section('title','Shop')

@section('content')

<!-- Breadcrumb Start -->
@include('front.partials.breadcrumb',['pageName' => 'Shop List'])
<!-- Breadcrumb End -->

<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">

        <!-- Shop Product Start -->
        @if($products->isEmpty())
        <div class="col-12 text-center py-5">
            <!-- Lottie Animation for no products -->
            <div id="no-products-animation" style="width: 350px; height: 350px; margin: 0 auto; margin-top:-80px;"></div>
            
            <!-- Message when no products are available -->
            <h1>No products are currently available.</h1>
        </div>
        @else
        @foreach($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4" style="border-radius: 15px; overflow: hidden;">
                <div class="product-img position-relative overflow-hidden" style="border-radius: 15px;">
                    <img class="img-fluid w-100" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="border-radius: 15px;">
                    <div class="product-action">
                        <!-- Wishlist Button -->
                        <a class="btn btn-outline-dark btn-square" 
                           href="{{ route('wishlist.add', $product->id) }}" 
                           onclick="showSweetAlertWishlist(event, {{ $product->id }}); return false;">
                            <i class="{{ $wishlist->contains('product_id', $product->id) ? 'fas fa-heart' : 'far fa-heart' }}"></i>
                        </a>
                        
                        <!-- Cart Button -->
                        <a class="btn btn-outline-dark btn-square" 
                           href="{{ route('cart.add', $product->id) }}" 
                           onclick="showSweetAlert(event, {{ $product->id }}); return false;">
                            <i class="{{ $cart->contains('product_id', $product->id) ? 'fas fa-shopping-cart' : 'fas fa-cart-plus' }}"></i>
                        </a>
                        
                        <!-- Product Details -->
                        <a class="btn btn-outline-dark btn-square" href="{{ route('front.details.show', $product->id) }}">
                            <i class="fa fa-search"></i>
                        </a>
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
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        @for($i = 0; $i < 5; $i++)
                            <small class="fa fa-star {{ $i < floor($product->averageRating()) ? 'text-primary' : '' }} mr-1"></small>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        @endforeach    
        @endif
        <!-- Shop Product End -->
    </div> 
</div> 
<!-- Shop End -->

@endsection

