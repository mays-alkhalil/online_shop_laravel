 <style>
    /* Dropdown Menu */
        #userDropdown {
            display: none;
            position: absolute;
            top: 100%;  /* تأكد من أنه سيظهر تحت الأيقونة */
            left: 81%;
            /* transform: translateX(-50%);  لوضعه بالمنتصف */
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            width: 150px;
            border-radius: 5px;
        }

        .dropdown-item {
            padding: 8px 12px;
            text-decoration: none;
            color: #333;
            display: block;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        /* Hover effect for user icon */
        #userIcon:hover #userDropdown {
            display: block;
        }

        /* Arrow next to the user icon */
        #userIcon {
            position: relative;
        }


        #userIcon:hover::after {
            display: block; /* يظهر السهم عند التمرير فوق الأيقونة */
        }

        /* تحديد لون السهم بنفس لون الأيقونات */
        #userIcon .arrow-icon {
            color: #FFD333; /* نفس لون الأيقونات، يمكنك تغييره حسب الحاجة */
        }



</style>
    
    
    <!-- Topbar Start -->
    <div class="container-fluid">
     
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href{{ url('/front/index')}}" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Shop</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Area</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
               <!-- HTML for Search Form -->
               {{-- <form method="GET" action="{{ route('front.shop') }}" class="mb-4">
                <div class="input-group">
                    <input type="text" name="query" value="{{ request()->query('query') }}" class="form-control" placeholder="Search for products..." required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div> 
            </form> --}}
                        </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+962 796 532 179 </h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
 
 
 <!-- Navbar Start -->
 <div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                  <!-- Store Categories -->
                  <div class="nav-item dropdown dropright">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Stores</a>
                    <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                        @if(isset($stores) && $stores->count() > 0)
                        @foreach ($stores as $store)

                            <a href="{{route('store.show',$store->id)}}" class="dropdown-item">{{ $store->name }}</a>
                        @endforeach
                    @else
                        <p>No stores available</p>
                    @endif                    </div>
                  </div>
              
                  <!-- Product Categories -->
                  <div class="navbar-nav w-100">
                    @if(isset($categories) && $categories->count() > 0)

                    @foreach ($categories as $category)
                        <a href="{{route('category.show',$category->id)}}" class="nav-item nav-link">{{ $category->name }}</a>
                    @endforeach
                    @else
                    <p>No categories available</p>
                @endif           
                </div>
                
                                </div>
 </nav>
                      </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
              
                <a href="{{ url('/front/index')}}" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">Shop</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Area</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ url('/front/index')}}" class="nav-item nav-link @yield('index-active') ">Home</a>
                        <a href="{{ url('/front/shop')}}" class="nav-item nav-link @yield('shop-active') ">Shop</a>
                        <a href="{{ url('/front/contact')}}" class="nav-item nav-link @yield('contact-active') ">Contact</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
<!-- Wishlist Icon -->
<a href="{{ url('/front/wishlist') }}" class="btn px-0">
    <i class="fas fa-heart text-primary"></i>
    <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">
        {{ $wishlistCount }}
    </span>
    <br>
    <small class="d-block text-center" style="font-size: 12px; color:white;margin-right:15px;">Wishlist</small>
</a>

<!-- Cart Icon -->
<a href="{{ url('/front/cart') }}" class="btn px-0 ml-3">
    <i class="fas fa-shopping-cart text-primary"></i>
    <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">
        {{ $cartCount }}
    </span>
    <br>
    <small class="d-block text-center" style="font-size: 12px; color:white; margin-right:15px;">Cart</small>
</a>

                       <!-- User Icon with Dropdown -->
                       <a href="#" class="btn px-0 ml-3 position-relative" id="userIcon">
                        <i class="fas fa-user text-primary"></i> <!-- أيقونة المستخدم -->
                        <i class="fas fa-chevron-down ml-2 arrow-icon"></i> <!-- السهم -->
                    
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu" id="userDropdown">
                            @if(Auth::check()) <!-- إذا كان المستخدم مسجل دخوله -->
                                <a class="dropdown-item" href="{{ url('/profile') }}">My Profile</a>
                                <a class="dropdown-item" href="{{ url('/front/orders') }}">My Orders</a>
                                 <a class="dropdown-item" href="{{ url('/front/coupons') }}">My Coupons</a>
                                {{-- <a class="dropdown-item" href="{{ url('/front/points') }}">My Points</a> --}} 
                                <!-- رابط تسجيل الخروج -->
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            @else <!-- إذا كان المستخدم غير مسجل دخوله -->
                                <a class="dropdown-item" href="{{ url('/login') }}">Login</a>
                                <a class="dropdown-item" href="{{ url('/register') }}">Register</a>
                            @endif
                        </div>
                                            </a>
                    
                                        </div>
                </div>

            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->


<script>
    // عناصر الأيقونة والقائمة
    const userIcon = document.getElementById('userIcon');
    const userDropdown = document.getElementById('userDropdown');
    
    // تأخير الإخفاء عند الخروج
    let hideTimeout;
    
    // إظهار القائمة عند المرور فوق الأيقونة
    userIcon.addEventListener('mouseenter', () => {
        clearTimeout(hideTimeout); // إلغاء أي تأخير سابق
        userDropdown.style.display = 'block'; // إظهار القائمة
    });
    
    // إظهار القائمة عند المرور فوقها
    userDropdown.addEventListener('mouseenter', () => {
        clearTimeout(hideTimeout); // إلغاء أي تأخير سابق
        userDropdown.style.display = 'block';
    });
    
    // إخفاء القائمة عند مغادرة الأيقونة
    userIcon.addEventListener('mouseleave', () => {
        hideTimeout = setTimeout(() => {
            if (!isNear(userIcon, userDropdown, 15)) {
                userDropdown.style.display = 'none'; // إخفاء القائمة
            }
        }, 50); // تأخير 50ms
    });
    
    // إخفاء القائمة عند مغادرتها
    userDropdown.addEventListener('mouseleave', () => {
        hideTimeout = setTimeout(() => {
            if (!isNear(userIcon, userDropdown, 15)) {
                userDropdown.style.display = 'none';
            }
        }, 50);
    });
    
    // وظيفة للتحقق إذا كان المستخدم قريبًا من الأيقونة أو القائمة
    function isNear(element1, element2, distance) {
        const rect1 = element1.getBoundingClientRect();
        const rect2 = element2.getBoundingClientRect();
    
        const isClose = (
            rect2.top - distance <= rect1.bottom &&
            rect2.bottom + distance >= rect1.top &&
            rect2.left - distance <= rect1.right &&
            rect2.right + distance >= rect1.left
        );
    
        return isClose;
    }
    </script>
    