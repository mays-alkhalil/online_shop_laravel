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
function toggleWishlist(event, productId) {
    event.preventDefault(); // منع تحميل الصفحة

    var icon = $(event.target); // الحصول على الأيقونة التي تم النقر عليها
    var isFilled = icon.hasClass('fas'); // التحقق مما إذا كانت الأيقونة مملوءة

    var url = isFilled ? '/wishlist/remove/' + productId : '/wishlist/add/' + productId;  // تحديد URL الإضافة أو الإزالة

    // إرسال الطلب باستخدام AJAX لإضافة أو إزالة المنتج من قائمة الرغبات
    $.ajax({
        url: url,
        type: 'GET', // أو 'POST' حسب الطريقة التي يستخدمها تطبيقك
        success: function(response) {
            if (isFilled) {
                icon.removeClass('fas').addClass('far'); // تحويل الأيقونة إلى فارغة عند الحذف
            } else {
                icon.removeClass('far').addClass('fas'); // تحويل الأيقونة إلى مملوءة عند الإضافة
            }

            // تحديث عدد المنتجات في قائمة الرغبات بعد الإضافة أو الإزالة
            $('#wishlist-count').text(response.wishlistCount);
        },
        error: function(xhr, status, error) {
            console.error('Error adding/removing from wishlist:', error);
        }
    });
}

function toggleCart(event, productId) {
    event.preventDefault(); // منع تحميل الصفحة

    var icon = $(event.target); // الحصول على الأيقونة التي تم النقر عليها
    var isFilled = icon.hasClass('fas'); // التحقق مما إذا كانت الأيقونة مملوءة

    var url = isFilled ? '/cart/remove/' + productId : '/cart/add/' + productId;  // تحديد URL الإضافة أو الإزالة

    // إرسال الطلب باستخدام AJAX لإضافة أو إزالة المنتج من السلة
    $.ajax({
        url: url,
        type: 'GET', // أو 'POST' حسب الطريقة التي يستخدمها تطبيقك
        success: function(response) {
            if (isFilled) {
                icon.removeClass('fas').addClass('far'); // تحويل الأيقونة إلى فارغة عند الحذف
            } else {
                icon.removeClass('far').addClass('fas'); // تحويل الأيقونة إلى مملوءة عند الإضافة
            }

            // تحديث عدد المنتجات في السلة بعد الإضافة أو الإزالة
            $('#cart-count').text(response.cartCount);
        },
        error: function(xhr, status, error) {
            console.error('Error adding/removing from cart:', error);
        }
    });
}




</script>

