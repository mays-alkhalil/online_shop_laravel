    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front-assets') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('front-assets') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    {{-- <script src="{{ asset('front-assets/lib/owlcarousel/owl.carousel.min.js') }}"></script> --}}

    <!-- Contact Javascript File -->
    {{-- <script src="{{ asset('front-assets') }}/mail/jqBootstrapValidation.min.js"></script> --}}
    <script src="{{ asset('front-assets') }}/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front-assets') }}/js/main.js"></script>


    <!-- jQuery Library -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="{{ asset('front-assets/mail/jqBootstrapValidation.min.js') }}"></script>

<!-- Owl Carousel JS -->
<script src="{{ asset('front-assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>



<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Initialize Owl Carousel -->
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            loop: true,             // التكرار التلقائي للعناصر
            margin: 5,             // المسافة بين العناصر
            // nav: true,              // أزرار التنقل
            // dots: true,             // النقاط السفلية
            autoplay: true,         // التفعيل التلقائي للحركة
            autoplayTimeout: 1500,  // المدة بين كل حركة (3 ثوانٍ)
            autoplayHoverPause: true, // إيقاف الحركة عند تمرير المؤشر
            responsive: {
                0: { items: 2 },    // عدد العناصر للشاشات الصغيرة
                768: { items: 3 },  // عدد العناصر للشاشات المتوسطة
                1200: { items: 4 }  // عدد العناصر للشاشات الكبيرة
            }
        });
    });
</script>



<script>
function showSweetAlert(event, productId) {
    event.preventDefault(); // منع تحميل الصفحة

    // إرسال الطلب باستخدام AJAX لإضافة المنتج إلى السلة
    $.ajax({
        url: '/cart/add/' + productId,  // أو استخدم route Laravel المناسبة هنا
        type: 'GET', // أو 'POST' حسب الطريقة التي يستخدمها تطبيقك
        success: function(response) {
            // عرض SweetAlert عند النجاح
            Swal.fire({
                title: 'Added!',
                text: 'The product has been successfully added to your cart.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function(xhr, status, error) {
            // في حال حدوث خطأ
            Swal.fire({
                title: 'Error!',
                text: 'There was an error adding the product to the cart.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}

function showSweetAlertWishlist(event, productId) {
    event.preventDefault(); // منع تحميل الصفحة

    // إرسال الطلب باستخدام AJAX لإضافة المنتج إلى السلة
    $.ajax({
        url: '/wishlist/add/' + productId,  // أو استخدم route Laravel المناسبة هنا
        type: 'GET', // أو 'POST' حسب الطريقة التي يستخدمها تطبيقك
        success: function(response) {
            // عرض SweetAlert عند النجاح
            Swal.fire({
                title: 'Added!',
                text: 'The product has been successfully added to your wishlist.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function(xhr, status, error) {
            // في حال حدوث خطأ
            Swal.fire({
                title: 'Error!',
                text: 'There was an error adding the product to the wishlist.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}



</script>

