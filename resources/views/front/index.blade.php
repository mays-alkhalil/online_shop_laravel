@extends('front.master')

@section('index-active','active')

@section('title','Home')




@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{ asset('front-assets') }}/img/carousel-1.jpg" style="object-fit: cover; border-radius: 15px;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">{{ __('messages.heroMen') }}</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">{{ __('messages.heroMenH') }}</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{'shop'}}">{{ __('messages.shopNow') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{ asset('front-assets') }}/img/carousel-2.jpg" style="object-fit: cover; border-radius: 15px;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">{{ __('messages.heroWomen') }}</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">{{ __('messages.heroWomenH') }}</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{'shop'}}">{{ __('messages.shopNow') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{ asset('front-assets') }}/img/carousel-3.jpg" style="object-fit: cover; border-radius: 15px;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">{{ __('messages.heroKids') }}</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">{{ __('messages.heroKidsH') }}</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{'shop'}}">{{ __('messages.shopNow') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px; border-radius: 15px; overflow: hidden;">
                    <img class="img-fluid" src="{{ asset('front-assets') }}/img/offer-1.jpg" alt="" style="object-fit: cover; border-radius: 15px;">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">{{ __('messages.save') }} {{ $highestDiscount }}%</h6>
                        <h3 class="text-white mb-3">{{ __('messages.specialOffer') }}</h3>
                        <a href="{{'shop'}}" class="btn btn-primary">{{ __('messages.shopNow') }}</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px; border-radius: 15px; overflow: hidden;">
                    <img class="img-fluid" src="{{ asset('front-assets') }}/img/offer-2.jpg" alt="" style="object-fit: cover; border-radius: 15px;">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">{{ __('messages.save') }} {{ $secondHighestDiscount }}%</h6>
                        <h3 class="text-white mb-3">{{ __('messages.specialOffer') }}</h3>
                        <a href="{{'shop'}}" class="btn btn-primary">{{ __('messages.shopNow') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px; border-radius: 15px; overflow: hidden;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">{{ __('messages.qualityProduct') }}</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px; border-radius: 15px; overflow: hidden;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">{{ __('messages.freeShipping') }}</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px; border-radius: 15px; overflow: hidden;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">{{ __('messages.fourteenDayReturn') }}</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px; border-radius: 15px; overflow: hidden;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">{{ __('messages.support24/7') }}</h5>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">{{ __('messages.categories') }}</span>
        </h2>
        <div class="row px-xl-5 pb-3">
            @if ($categories->isNotEmpty())
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <a class="text-decoration-none" href="{{ route('category.show', $category->id) }}">
                            <div class="cat-item d-flex align-items-center mb-4" style="transition: background-color 0.3s; border-radius: 15px; overflow: hidden;">
                                <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                    <img class="img-fluid" src="{{ asset('storage/images/' . $category->image) }}" alt="{{ $category->name }}">
                                </div>
                                <div class="flex-fill pl-3">
                                    <h6>{{ $category->name }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-center text-muted">No categories available.</p>
                </div>
            @endif
        </div>
        
        <script>
            // إضافة التأثير عند التمرير على العنصر
            const categoryItems = document.querySelectorAll('.cat-item');
            categoryItems.forEach(item => {
                item.addEventListener('mouseenter', () => {
                    item.style.backgroundColor = '#F1E7E7';
                });
                item.addEventListener('mouseleave', () => {
                    item.style.backgroundColor = '';
                });
            });
        </script>
            </div>
    
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">{{ __('messages.featured_products') }}</span>
        </h2>
        <div class="row px-xl-5">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4" style="border-radius: 15px; overflow: hidden;">
                    <div class="product-img position-relative overflow-hidden" style="border-radius: 15px;">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="border-radius: 15px;">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="{{ route('wishlist.add', $product->id) }}" onclick="showSweetAlertWishlist(event, {{ $product->id }}); return false;">
                                <i class="far fa-heart"></i>
                            </a>
                            <a class="btn btn-outline-dark btn-square" href="{{ route('cart.add', $product->id) }}" onclick="showSweetAlert(event, {{ $product->id }}); return false;">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <!-- رابط عرض تفاصيل المنتج -->
                            <a class="btn btn-outline-dark btn-square" href="{{ route('front.details.show', $product->id) }}"><i class="fa fa-search"></i></a>
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
        <!-- Products End -->


  
<!-- Offer Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="row px-xl-5">
        <!-- العرض الأول -->
        <div class="col-sm-12 col-md-6"> <!-- عرض بجانب بعض في الشاشات الكبيرة وتحت بعض في الشاشات الصغيرة -->
            <div class="product-offer mb-30" style="height: 200px; border-radius: 15px; overflow: hidden;">
                <img class="img-fluid w-100" src="{{ asset('front-assets') }}/img/offer-1.jpg" alt="" style="border-radius: 15px;">
                <div class="offer-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                    <h6 class="text-white text-uppercase">{{ __('messages.save') }} {{ $highestDiscount }}%</h6>
                    <h3 class="text-white mb-3">{{ __('messages.specialOffer') }}</h3>
                    <a href="#" class="btn btn-primary">{{ __('messages.shopNow') }}</a>
                </div>
            </div>
        </div>

        <!-- العرض الثاني -->
        <div class="col-sm-12 col-md-6"> <!-- نفس الشيء هنا -->
            <div class="product-offer mb-30" style="height: 200px; border-radius: 15px; overflow: hidden;">
                <img class="img-fluid w-100" src="{{ asset('front-assets') }}/img/offer-2.jpg" alt="" style="border-radius: 15px;">
                <div class="offer-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                    <h6 class="text-white text-uppercase">{{ __('messages.save') }} {{ $secondHighestDiscount }}%</h6>
                    <h3 class="text-white mb-3">{{ __('messages.specialOffer') }}</h3>
                    <a href="#" class="btn btn-primary">{{ __('messages.shopNow') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Offer End -->
   


   <!-- Products Start -->
   <div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">{{ __('messages.recent_products') }}</span>
    </h2>
    <div class="row px-xl-5">
        @foreach($LastProducts as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4" style="border-radius: 15px; overflow: hidden;">
                <div class="product-img position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="border-radius: 15px;">
                    <div class="product-action">
                        <a class="btn btn-outline-dark btn-square" href="{{ route('wishlist.add', $product->id) }}" onclick="showSweetAlertWishlist(event, {{ $product->id }}); return false;">
                            <i class="far fa-heart"></i>
                        </a>
                        
                        <a class="btn btn-outline-dark btn-square" href="{{ route('cart.add', $product->id) }}" onclick="showSweetAlert(event, {{ $product->id }}); return false;">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        
                        <!-- رابط عرض تفاصيل المنتج -->
                        <a class="btn btn-outline-dark btn-square" href="{{ route('front.details.show', $product->id) }}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h6 text-decoration-none text-truncate" href="">{{ $product->name }}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>{{ number_format($product->price, 2) }} JOD</h5>
                        @if($product->old_price)
                            <h6 class="text-muted ml-2"><del>{{ number_format($product->old_price, 2) }} JOD</del></h6>
                        @endif
                    </div>
                    {{-- <div class="d-flex align-items-center justify-content-center mb-1">
                        @for($i = 0; $i < 5; $i++)
                            <small class="fa fa-star {{ $i < floor($product->averageRating()) ? 'text-primary' : '' }} mr-1"></small>
                        @endfor
                        <small>({{ $product->reviews_count }})</small>
                    </div> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Products End -->



    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel d-flex flex-wrap justify-content-start">
                    @foreach($stores as $store)
                        <div class="bg-light p-4 m-2" style="width: 200px; border-radius: 15px; overflow: hidden;">
                            <img src="{{ url('storage/' . $store->image) }}" alt="{{ $store->name }}" class="img-fluid" style="border-radius: 15px;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    
            <!-- Vendor End -->

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop: true,                // تفعيل التكرار
            margin: 10,               // المسافة بين العناصر
            nav: true,                // إضافة أزرار التنقل
            dots: true,               // إظهار النقاط السفلية
            responsive: {
                0: {
                    items: 1          // عدد العناصر المعروضة في الشاشات الصغيرة
                },
                768: {
                    items: 2          // عدد العناصر المعروضة في الشاشات المتوسطة
                },
                1200: {
                    items: 4          // عدد العناصر المعروضة في الشاشات الكبيرة
                }
            }
        });
    });
</script>
@endsection


