@extends('front.master')

@section('register-active','active')

@section('title','Register')

@section('content')


<!-- Register Start -->
<div class="container-fluid">
    <div class="row px-xl-5 justify-content-center">
        <div class="col-lg-6 mb-5">
            
            <div class="login-form bg-light p-30">
                <div id="success"></div>
                <form name="registerForm" id="registerForm" novalidate="novalidate">
                    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4 d-flex justify-content-center align-items-center">
                        <span class="border-top w-25 pr-3"></span> Register <span class="border-top w-25 pl-3"></span>
                    </h2>
                
                    <!-- Name -->
                    <div class="control-group mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Your Name"
                            required="required" data-validation-required-message="Please enter your name" />
                        <p class="help-block text-danger"></p>
                    </div>

                    <!-- Email -->
                    <div class="control-group mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Your Email"
                            required="required" data-validation-required-message="Please enter your email" />
                        <p class="help-block text-danger"></p>
                    </div>

                    {{-- phone --}}
                    <div class="control-group mb-3">
                        <input type="tel" class="form-control" id="phone" placeholder="Your Phone Number"
                            required="required" data-validation-required-message="Please enter your Phone Number" />
                        <p class="help-block text-danger"></p>
                    </div>

                    <!-- Password -->
                    <div class="control-group mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Your Password"
                            required="required" data-validation-required-message="Please enter your password" />
                        <p class="help-block text-danger"></p>
                    </div>

                    <!-- Confirm Password -->
                    <div class="control-group mb-3">
                        <input type="password" class="form-control" id="confirm-password" placeholder="Confirm Password"
                            required="required" data-validation-required-message="Please confirm your password" />
                        <p class="help-block text-danger"></p>
                    </div>

                    <!-- Button -->
                    <div class="text-center mb-3">
                        <button class="btn btn-primary py-2 px-4" type="submit" id="registerButton">Register</button>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center">
                        <p>Already have an account? <a href="{{ url('/login') }}">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Register End -->
  
@endsection
