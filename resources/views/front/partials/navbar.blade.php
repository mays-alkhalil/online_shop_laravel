 <style>
    /* Dropdown Menu */
        #userDropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 81%;
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
            display: block; 
        }

        /* تحديد لون السهم بنفس لون الأيقونات */
        #userIcon .arrow-icon {
            color: #A87676 ; /* نفس لون الأيقونات، يمكنك تغييره حسب الحاجة */
        }

/* Topbar styling */
.topbar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f8f9fa;
    padding: 10px 30px;
}

/* Logo */
.logo {
    display: flex;
    align-items: center;
}

.logo .logo-text {
    margin-left: 10px;
    font-size: 20px;
    color: #333;
    font-weight: bold;
}

/* Language flags */
.language-flags {
    display: flex;
    /* gap: 15px; */
    align-items: center;
    justify-content: flex-start;
    margin-left: 15px;
}


.language-flag {
    text-align: center;
}

.language-flag img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
}

.language-flag p {
    margin-top: 5px;
    font-size: 12px;
    color: #333;
}

.navbar {
    background-color: #333;
}

.navbar-nav {
    margin: 0 auto;
}

.nav-item {
    padding: 0 15px;
}

.navbar-toggler {
    border: none;
}

.navbar-collapse {
    justify-content: center; 
}


.navbar-nav .nav-link {
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    transition: color 0.3s ease;
}

.navbar-nav .nav-link:hover {
    color: #ffd333;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .navbar-nav {
        flex-direction: column; 
        /* العناصر تصبح عمودية في الشاشات الصغيرة */
    }
    .nav-item {
        text-align: center;
        padding: 10px 0;
    }
}
.navbar-toggler {
    border-color: #A87676;
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 30 30%27%3E%3Cpath stroke=%27%23A87676%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-miterlimit=%2710%27 d=%27M4 7h22M4 15h22M4 23h22%27/%3E%3C/svg%3E");
}


</style>
    
    
    <!-- Topbar Start -->
    <div class="container-fluid">
     
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                
                <a href="{{ url('/front/index')}}" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">jory</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">moda</span>
                   
                    
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
               <!-- HTML for Search Form -->
              
                        </div>
                        <div class="col-lg-4 col-6 d-flex">
                            <div class="customer">
                                <p class="m-0">{{ __('messages.customerService') }}</p>
                                <h5 class="m-0">+962 796 532 179 </h5>
                            </div>
                            <div class="language-flags d-flex">
                                <!-- English Language Link -->
                                <a href="{{ route('setLocale', 'en') }}" class="mr-3">
                                    <div class="language-flag">
                                        <img src="{{ asset('front-assets/img/usajpeg.jpeg') }}" alt="USA Flag" class="img-fluid">
                                        <p>English</p>
                                    </div>
                                </a>
                            
                                <!-- Arabic Language Link -->
                                <a href="{{ route('setLocale', 'ar') }}">
                                    <div class="language-flag">
                                        <img src="{{ asset('front-assets/img/jordanjpeg.jpeg') }}" alt="Jordan Flag" class="img-fluid">
                                        <p>العربية</p>
                                    </div>
                                </a>
                            </div>
                            
                              
                        </div>
                        
                        
        </div>
    </div>
    <!-- Topbar End -->
 
 
 <!-- Navbar Start -->
 <div>
 <div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-light m-0"><i class="fa fa-bars mr-2"></i>{{ __('messages.categories') }}</h6>
                <i class="fa fa-angle-down text-light"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                  <!-- Store Categories -->
                  <div class="nav-item dropdown dropright">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('messages.stores') }}</a>
                    <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                        @if(isset($stores) && $stores->count() > 0)
                        @foreach ($stores as $store)

                            <a href="{{route('store.show',$store->id)}}" class="dropdown-item">{{ $store->name }}</a>
                        @endforeach
                    @else
                        <p>{{ __('messages.noStoresAvailable') }}</p>
                    @endif                    </div>
                  </div>
              
                  <!-- Product Categories -->
                  <div class="navbar-nav w-100">
                    @if(isset($categories) && $categories->count() > 0)

                    @foreach ($categories as $category)
                        <a href="{{route('category.show',$category->id)}}" class="nav-item nav-link">{{ $category->name }}</a>
                    @endforeach
                    @else
                    <p>{{ __('messages.noCategoriesAvailable') }}</p>
                @endif           
                </div>
                
                                </div>
 </nav>
                      </div>
                      <div class="col-lg-9">
                        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                            <a href="{{ url('/front/index') }}" class="text-decoration-none d-block d-lg-none">
                                <span class="h1 text-uppercase text-dark bg-light px-2">jory</span>
                                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">moda</span>
                               
                            </a>
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" style="border-color: #A87676;">
                                <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 30 30%27%3E%3Cpath stroke=%27%23A87676%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-miterlimit=%2710%27 d=%27M4 7h22M4 15h22M4 23h22%27/%3E%3C/svg%3E');"></span>
                            </button>
                            
                            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0">
                                    <a href="{{ url('/front/index') }}" class="nav-item nav-link @yield('index-active')">{{ __('messages.home') }}</a>
                                    <a href="{{ url('/front/shop') }}" class="nav-item nav-link @yield('shop-active')">{{ __('messages.shop') }}</a>
                                    <a href="{{ url('/size-calculator') }}" class="nav-item nav-link">{{ __('messages.calculateYourSize') }}</a>
                                    <a href="{{ url('/front/contact') }}" class="nav-item nav-link @yield('contact-active')">{{ __('messages.contact') }}</a>
                                    <!-- Add the new size calculation link -->
                                 
                                </div>
                                <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                                    <!-- Wishlist Icon -->
                                    <a href="{{ url('/front/wishlist') }}" class="btn px-0">
                                        <i class="fas fa-heart text-primary"></i>
                                        <span class="badge text-primary border border-primary rounded-circle" style="padding-bottom: 2px;">
                                            {{ $wishlistCount }}
                                        </span>
                                        <br>
                                        <small class="d-block text-center" style="font-size: 12px; color:#713030;margin-right:15px;">{{ __('messages.wishlist') }}</small>
                                    </a>
                            
                                    <!-- Cart Icon -->
                                    <a href="{{ url('/front/cart') }}" class="btn px-0 ml-3">
                                        <i class="fas fa-shopping-cart text-primary"></i>
                                        <span class="badge text-primary border border-primary rounded-circle" style="padding-bottom: 2px;">
                                            {{ $cartCount }}
                                        </span>
                                        <br>
                                        <small class="d-block text-center" style="font-size: 12px; color:#713030; margin-right:15px;">{{ __('messages.cart') }}</small>
                                    </a>
                            
                                    <!-- User Icon with Dropdown -->
                                    <a href="#" class="btn px-0 ml-3 position-relative" id="userIcon">
                                        <i class="fas fa-user text-primary"></i> <!-- User Icon -->
                                        <i class="fas fa-chevron-down ml-2 arrow-icon"></i> <!-- Arrow Icon -->
                                        
                                        <!-- Dropdown Menu -->
                                        <div class="dropdown-menu" id="userDropdown">
                                            @if(Auth::check()) <!-- If user is logged in -->
                                                <a class="dropdown-item" href="{{ url('/profile') }}">{{ __('messages.myProfile') }}</a>
                                                <a class="dropdown-item" href="{{ url('/front/orders') }}">{{ __('messages.myOrders') }}</a>
                                                {{-- <a class="dropdown-item" href="{{ url('/front/coupons') }}">{{ __('messages.myCoupons') }}</a> --}}
                                                <a class="dropdown-item" href="{{ route('logout') }}">{{ __('messages.logout') }}</a>
                                            @else <!-- If user is not logged in -->
                                                <a class="dropdown-item" href="{{ url('/login') }}">{{ __('messages.login') }}</a>
                                                <a class="dropdown-item" href="{{ url('/register') }}">{{ __('messages.register') }}</a>
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
    