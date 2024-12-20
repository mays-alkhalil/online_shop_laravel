@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @if(session('message'))
                    <div class="alert alert-warning">
                        {{ session('message') }}
                    </div>
                    @endif --}}

                    {{-- @if(session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                    @endif --}}
{{-- 
                    @if(auth()->user()->role == 0) <!-- تحقق إذا كان المستخدم دور يوزر -->
                        <script>
                            // إعادة توجيه المستخدم إلى الصفحة الرئيسية في حال كان دوره "User"
                            window.location.href = "{{ route('front.profile') }}"; // ضع رابط الصفحة الرئيسية هنا
                        </script>
                        <p>{{ __('You are logged in as a user. Redirecting to front-end.') }}</p>
                    @else
                        <p>{{ __('You are logged in as an administrator.') }}</p>
                    @endif --}}
                   
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
