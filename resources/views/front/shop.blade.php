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
        <!-- Shop Sidebar Start -->
        {{-- <div class="col-lg-3 col-md-4">
            <!-- Filter by Stores -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Store</span></h5>
            <div class="bg-light p-4 mb-30">
                <form id="filterForm">
                    @foreach ($stores as $store)
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="store-{{ $store->id }}" value="{{ $store->id }}">
                            <label class="custom-control-label" for="store-{{ $store->id }}">{{ $store->name }}</label>
                        </div>
                    @endforeach
                </form>
            </div>

            <!-- Filter by Category -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Category</span></h5>
            <div class="bg-light p-4 mb-30">
                <form id="category-filter-form">
                    @foreach ($categories as $category)
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="category-{{ $category->id }}" value="{{ $category->id }}">
                            <label class="custom-control-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
                        </div>
                    @endforeach
                </form>
            </div>

            <!-- Filter by Color -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Color</span></h5>
            <div class="bg-light p-4 mb-30">
                <form id="color-filter-form">
                    @if(isset($colors) && count($colors) > 0)
                    @foreach($colors as $color)
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-{{ $loop->index }}" value="{{ $color }}">
                            <label class="custom-control-label" for="color-{{ $loop->index }}">{{ ucfirst($color) }}</label>
                        </div>
                    @endforeach
                    @else
                        <p>No colors found.</p>
                    @endif
                </form>
            </div>

            <!-- Filter by Size -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Size</span></h5>
            <div class="bg-light p-4 mb-30">
                <form id="size-filter-form">
                    @if(isset($sizes) && count($sizes) > 0)
                    @foreach($sizes as $size)
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-{{ $loop->index }}" value="{{ $size }}">
                            <label class="custom-control-label" for="size-{{ $loop->index }}">{{ ucfirst($size) }}</label>
                        </div>
                    @endforeach
                    @else
                        <p>No sizes found.</p>
                    @endif
                </form>
            </div> 
        </div> --}}
        <!-- Shop Sidebar End -->

        <!-- Shop Product Start -->
        @if($products->isEmpty())
        <div class="col-12 text-center py-5">
            <h5>No products are currently available.</h5>
        </div>
        @else
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

@section('scripts')
<script>
$('#filterForm').on('submit', function(e) {
    e.preventDefault();

    // جمع القيم المحددة لكل فئة
    var categories = $('#category-filter-form input:checkbox:checked').map(function() {
        return $(this).val();
    }).get();

    var colors = $('#color-filter-form input:checkbox:checked').map(function() {
        return $(this).val();
    }).get();

    var sizes = $('#size-filter-form input:checkbox:checked').map(function() {
        return $(this).val();
    }).get();

    $.ajax({
        url: '{{ route('front.shop.filter') }}',
        method: 'GET',
        data: {
            categories: categories,
            colors: colors,
            sizes: sizes
        },
        success: function(response) {
            $('.row.px-xl-5').html(response.products);
        },
        error: function() {
            alert('فشل تطبيق الفلاتر. حاول مرة أخرى.');
        }
    });
});
</script>
@endsection
