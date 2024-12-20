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
        <div class="col-lg-3 col-md-4">
            <!-- Filter by Stores -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Store</span></h5>
            <div class="bg-light p-4 mb-30">
                <form id="store-filter-form">
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="store-all" checked>
                        <label class="custom-control-label" for="store-all">All Stores</label>
                    </div>
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
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="color-all">
                        <label class="custom-control-label" for="color-all">All Color</label>
                    </div>
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
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="size-all">
                        <label class="custom-control-label" for="size-all">All Size</label>
                    </div>

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
        </div>
        <!-- Shop Sidebar End -->

        <!-- Shop Product Start -->
      
        <!-- Show Products -->
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
    
    </div>
</div>
 
                            
                {{-- <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <!-- تضمين الباجيناشن التي يتم إنشاؤها باستخدام Laravel Pagination -->
                            @if ($products->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Previous</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->previousPageUrl() }}">Previous</a>
                                </li>
                            @endif
                
                            <!-- تكرار الصفحات المعروضة -->
                            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                
                            <!-- التحقق إذا كانت الصفحة الحالية هي الأخيرة -->
                            @if ($products->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                
        </div> --}}
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->

@endsection



@section('scripts')
{{-- <script>
    $(document).ready(function() {
        // عند اختيار عدد المنتجات من الـdropdown
        $('.dropdown-item').on('click', function(e) {
            e.preventDefault();
            var perPage = $(this).data('per-page'); // الحصول على قيمة عدد المنتجات
            
            // إرسال الطلب باستخدام AJAX لتغيير عدد المنتجات
            $.ajax({
                url: '{{ route('shop') }}', // رابط الصفحة الحالية
                method: 'GET',
                data: { perPage: perPage },
                success: function(response) {
                    // تحديث المحتوى في الصفحة مع المنتجات الجديدة
                    $('.row.px-xl-5').html(response.products); 
                    // تحديث الباجيناشن إذا لزم الأمر
                    $('.pagination').html(response.pagination);
                }
            });
        });
    });
</script> --}}
@endsection

