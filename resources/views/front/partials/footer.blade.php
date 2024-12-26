<!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4">{{ __('messages.get_in_touch') }}</h5>
            <p class="mb-4">{{ __('messages.help_message') }}</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>maysalkhalil02@gmail.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+962 796 532 179</p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">{{ __('messages.quick_shop') }}</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="{{ route('front.index') }}"><i class="fa fa-angle-right mr-2"></i>{{ __('messages.home') }}</a>
                        <a class="text-secondary mb-2" href="{{ route('front.cart') }}"><i class="fa fa-angle-right mr-2"></i>{{ __('messages.shopping_cart') }}</a>
                        <a class="text-secondary mb-2" href="{{ route('front.checkout') }}"><i class="fa fa-angle-right mr-2"></i>{{ __('messages.checkout') }}</a>
                        <a class="text-secondary" href="{{ route('front.contact') }}"><i class="fa fa-angle-right mr-2"></i>{{ __('messages.contact_us') }}</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">{{ __('messages.my_account') }}</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="{{ route('front.index') }}"><i class="fa fa-angle-right mr-2"></i>{{ __('messages.home') }}</a>
                        <a class="text-secondary mb-2" href="{{ route('front.profile') }}"><i class="fa fa-angle-right mr-2"></i>{{ __('messages.my_profile') }}</a>
                        <a class="text-secondary mb-2" href="{{ route('front.wishlist') }}"><i class="fa fa-angle-right mr-2"></i>{{ __('messages.my_wishlist') }}</a>
                        <a class="text-secondary mb-2" href="{{ route('front.cart') }}"><i class="fa fa-angle-right mr-2"></i>{{ __('messages.my_cart') }}</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">{{ __('messages.newsletter') }}</h5>
                    <p>{{ __('messages.fashion_quote') }}</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Your Email" style="border-radius: 25px 0 0 25px;">
                            <div class="input-group-append">
                                <button class="btn btn-primary" style="border-radius: 0 25px 25px 0;">{{ __('messages.sign_up') }}</button>
                            </div>
                        </div>
                    </form>
                    <h6 class="text-secondary text-uppercase mt-4 mb-3">{{ __('messages.follow_us') }}</h6>
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
