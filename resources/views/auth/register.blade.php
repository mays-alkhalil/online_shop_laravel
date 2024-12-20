@extends('front.master')

@section('register-active','active')

@section('title','Register')

@section('content')

{{-- @include('front.partials.breadcrumb',['pageName' => 'Register']) --}}

<!-- Register Start -->
<div class="container-fluid">
    <div class="row px-xl-5 justify-content-center">
        <div class="col-lg-6 mb-5">
            
            <div class="login-form bg-light p-30">
                <div id="success"></div>
                <form method="POST" action="{{ route('register') }}" name="registerForm" id="registerForm" novalidate="novalidate">
                    @csrf
                    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4 d-flex justify-content-center align-items-center">
                        <span class="border-top w-25 pr-3"></span> Register <span class="border-top w-25 pl-3"></span>
                    </h2>
                
                    <!-- Name -->
                    <div class="control-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}" required autocomplete="name" autofocus data-validation-required-message="Please enter your name" />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

{{-- last name --}}
                    <div class="control-group mb-3">
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Your Last Name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus data-validation-required-message="Please enter your last name" />
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="control-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required autocomplete="email" data-validation-required-message="Please enter your email" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="control-group mb-3">
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Your Phone Number" value="{{ old('phone') }}" required autocomplete="phone" data-validation-required-message="Please enter your Phone Number" />
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="control-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Your Password" required autocomplete="new-password" data-validation-required-message="Please enter your password" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="control-group mb-3">
                        <input type="password" class="form-control" id="confirm-password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" data-validation-required-message="Please confirm your password" />
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
