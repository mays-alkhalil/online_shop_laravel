<!DOCTYPE html>
<html lang="en">

@include('front.partials.head')

<body>
 


   @include('front.partials.navbar')
  
   @yield('content')



    @include('front.partials.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

@include('front.partials.scripts')
<script src="//code.tidio.co/0l62fkif7dxtyrbjgri3styr43dl0xsr.js" async></script>
</html>