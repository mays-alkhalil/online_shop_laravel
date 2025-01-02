@extends('front.master')

@section('login-active','active')

@section('title','Login')

@section('content')


<!-- Login Start -->
<div class="container-fluid">
    <div class="row px-xl-5 justify-content-center">
        <div class="col-lg-6 mb-5">
            <div class="login-form bg-light p-30">
                <div id="success"></div>
                <form method="POST" action="{{ route('login') }}" name="loginForm" id="loginForm" novalidate="novalidate">
                    @csrf
                    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4 d-flex justify-content-center align-items-center">
                        <span class="border-top w-25 pr-3"></span> Login <span class="border-top w-25 pl-3"></span>
                    </h2>

                    <!-- Email -->
                    <div class="control-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required autocomplete="email" autofocus data-validation-required-message="Please enter your email" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="control-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Your Password" required autocomplete="current-password" data-validation-required-message="Please enter your password" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Button -->
                    <div class="text-center mb-3">
                        <button class="btn btn-primary py-2 px-4" type="submit" id="loginButton">Login</button>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center">
                        <p>Don't have an account? <a href="{{ url('/register') }}">Register here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->
   
@endsection

