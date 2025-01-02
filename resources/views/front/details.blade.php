@extends('front.master')

@section('details-active','active')


@section('title','Details')


@section('content')


@include('front.partials.breadcrumb',['pageName' => 'Details']);

  
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light" style="border-radius: 30px; overflow: hidden;height: 350px;">
                    <!-- عرض صورة واحدة فقط -->
                    <div class="carousel-item active" >
                        <img class="w-100" src="{{ asset('storage/' . $product->image) }}" alt="Image" >
                    </div>
                    
                </div>
               
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30" >
            <div class="h-100 bg-light p-30" style="border-radius: 30px; overflow: hidden;">
                <h3>{{ $product->name }}</h3>
                <h3 class="font-weight-semi-bold mb-4">${{ $product->price }}</h3>
                <p class="mb-4">{{ $product->description }}</p>
        
                <!-- Sizes -->
                <div class="d-flex mb-3">
                    <strong class="text-primary mr-3">Sizes:</strong>
                    <form>
                        @if($sizes->isNotEmpty())
                            @foreach($sizes as $size)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-{{ $size }}" name="size">
                                    <label class="custom-control-label" for="size-{{ $size }}">{{ $size }}</label>
                                </div>
                            @endforeach
                        @else
                            <p>No sizes available.</p>
                        @endif
                    </form>
                </div>
        
                <!-- Colors -->
                <div class="d-flex mb-4">
                    <strong class="text-primary mr-3">Colors:</strong>
                    <form>
                        @if($colors->isNotEmpty())
                            @foreach($colors as $color)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-{{ $color }}" name="color">
                                    <label class="custom-control-label" for="color-{{ $color }}">{{ $color }}</label>
                                </div>
                            @endforeach
                        @else
                            <p>No colors available.</p>
                        @endif
                    </form>
                </div>
        
                <!-- Add to Cart Button -->
                <div class="d-flex align-items-center mb-4 pt-2">
                    <a href="{{ route('cart.add', $product->id) }}">
                        <button class="btn btn-primary px-3">
                            <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                        </button>
                    </a>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <p class="nav-item  text-primary active"  href="#tab-pane-1">Description</p>
                  
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>{{ $product->description }}</p>
                    </div>
                  
                   
            </div>
            </div>
        </div>
    </div> 
</div>


 

    <!-- Shop Detail End -->


    <!-- related Products Start -->
    <div class="container-fluid py-5 ">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">You May Also Like</span>
        </h2>
        <div class="row px-xl-5">
            @foreach($relatedProducts as $relatedProduct)
                <div class="col-12 col-sm-4 col-md-4 mb-4">
                    <div class="product-item bg-light" style="border-radius: 30px; overflow: hidden;">
                        <div class="product-img position-relative overflow-hidden" style="border-radius: 30px;">
                            <img class="img-fluid w-100" src="{{ asset('storage/'.$relatedProduct->image) }}" alt="{{ $relatedProduct->name }}">
                            <div class="product-action">
                                <!-- Wishlist Button -->
                                <a class="btn btn-outline-dark btn-square" 
                                   href="{{ route('wishlist.add', $relatedProduct->id) }}" 
                                   onclick="showSweetAlertWishlist(event, {{ $relatedProduct->id }}); return false;">
                                    <i class="{{ $wishlist->contains('product_id', $relatedProduct->id) ? 'fas fa-heart' : 'far fa-heart' }}"></i>
                                </a>
                                
                                <!-- Cart Button -->
                                <a class="btn btn-outline-dark btn-square" 
                                   href="{{ route('cart.add', $relatedProduct->id) }}" 
                                   onclick="showSweetAlert(event, {{ $relatedProduct->id }}); return false;">
                                   
                                   <i class="{{ $cart->contains('product_id', $relatedProduct->id) ? 'fas fa-shopping-cart' : 'fas fa-cart-plus' }}"></i>
    
    
    
    
    
    
                                </a>
                                
                                <!-- Product Details -->
                                <a class="btn btn-outline-dark btn-square" href="{{ route('front.details.show', $relatedProduct->id) }}">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>

    
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{ $relatedProduct->name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>${{ $relatedProduct->price }}</h5>
                                @if($relatedProduct->old_price)
                                    <h6 class="text-muted ml-2"><del>${{ $relatedProduct->old_price }}</del></h6>
                                @endif
                            </div>
                          
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
        
    <!-- Products End -->




@endsection








