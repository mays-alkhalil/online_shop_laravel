@extends('front.master')

@section('shop-active','active')

@section('title','Shop')

@section('content')

<!-- Breadcrumb Start -->
@include('front.partials.breadcrumb',['pageName' => 'Shop List'])
<!-- Breadcrumb End -->

<!-- Shop Start -->
<div class="container-fluid">
  

        <!-- Shop Product Start -->
        <div class="col-lg-12 col-md-8">
            <div class="row px-xl-5" id="product-list">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4" style="border-radius: 15px; overflow: hidden; border: 1px solid #ddd;">
                        <div class="product-img position-relative overflow-hidden" style="border-radius: 15px;">
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="border-radius: 15px;">
                            <div class="product-action">
                                <!-- Wishlist Button -->
                                <a class="btn btn-outline-dark btn-square" 
                                   href="{{ route('wishlist.add', $product->id) }}" 
                                   onclick="showSweetAlertWishlist(event, {{ $product->id }}); return false;">
                                   <i class="{{ collect($wishlist)->contains('product_id', $product->id) ? 'fas fa-heart' : 'far fa-heart' }}"></i>
                                </a>
                                
                                <!-- Cart Button -->
                                <a class="btn btn-outline-dark btn-square" 
                                   href="{{ route('cart.add', $product->id) }}" 
                                   onclick="showSweetAlert(event, {{ $product->id }}); return false;">
                                   <i class="{{ collect($cart)->contains('product_id', $product->id) ? 'fas fa-shopping-cart' : 'fas fa-cart-plus' }}"></i>
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
                                <h5>{{ number_format($product->price, 2) }} JOD </h5>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->

@endsection

@section('scripts')
<script>
    // Apply Filters Button
 
</script>
@endsection
