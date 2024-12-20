<!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
            <p class="mb-4"> We're here to help you find the perfect outfits that suit your style. Feel free to reach out with any questions – we’re always ready to provide you with the best shopping experience.</p>
           
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>maysalkhalil02@gmail.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+962 796 532 179</p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="{{ route('front.index') }}"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        {{-- <a class="text-secondary mb-2" href="{{ route('front.shop') }}"><i class="fa fa-angle-right mr-2"></i>Our Shop</a> --}}
                        <a class="text-secondary mb-2" href="{{ route('front.cart') }}"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                        <a class="text-secondary mb-2" href="{{ route('front.checkout') }}"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                        <a class="text-secondary" href="{{ route('front.contact') }}"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="{{ route('front.index') }}"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-secondary mb-2" href="{{ route('front.profile') }}"><i class="fa fa-angle-right mr-2"></i>My Profile</a>
                        <a class="text-secondary mb-2" href="{{ route('front.wishlist') }}"><i class="fa fa-angle-right mr-2"></i>My Wishlist</a>
                        <a class="text-secondary mb-2" href="{{ route('front.cart') }}"><i class="fa fa-angle-right mr-2"></i>My Cart</a>
                        {{-- <a class="text-secondary mb-2" href="{{ route('front.orders') }}"><i class="fa fa-angle-right mr-2"></i>My Orders</a> --}}
                        {{-- <a class="text-secondary" href="{{ route('front.points') }}"><i class="fa fa-angle-right mr-2"></i>My Points</a> --}}
                    </div>
                </div>
                                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">News letter</h5>
                    <p>"Fashion is the armor to survive the reality of everyday life."</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Your Email Address">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                    </form>
                    <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('front.partials.copyright')
</div>
<!-- Footer End -->