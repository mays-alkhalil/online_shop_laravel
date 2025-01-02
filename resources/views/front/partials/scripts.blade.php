<!-- JavaScript Libraries -->
<!-- تحميل مكتبات JavaScript -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> <!-- مكتبة jQuery -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> <!-- مكتبة Bootstrap -->
<script src="{{ asset('front-assets') }}/lib/easing/easing.min.js"></script> <!-- مكتبة Easing لتأثيرات التمرير -->
<script src="{{ asset('front-assets') }}/lib/owlcarousel/owl.carousel.min.js"></script> <!-- مكتبة Owl Carousel لإنشاء سلايدر للمحتوى -->




<!-- Contact Javascript File -->
<!-- ملف JavaScript الخاص بالاتصال -->
<script src="{{ asset('front-assets') }}/mail/contact.js"></script> <!-- ملف الاتصال -->



<!-- Template Javascript -->
<!-- ملف JavaScript الخاص بالقالب -->
<script src="{{ asset('front-assets') }}/js/main.js"></script> <!-- الملف الرئيسي لتنسيق الصفحة -->




<!-- Owl Carousel JS -->
<!-- تحميل مكتبة Owl Carousel -->
<script src="{{ asset('front-assets/lib/owlcarousel/owl.carousel.min.js') }}"></script> <!-- مكتبة السلايدر -->




<!-- SweetAlert2 CDN -->
<!-- تحميل مكتبة SweetAlert2 للنوافذ المنبثقة -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




{{-- حساب مقاسات --}}
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script> <!-- مكتبة TensorFlow لتطبيقات الذكاء الاصطناعي -->
<script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/body-pix"></script> <!-- نموذج Body-Pix للتعرف على الجسم البشري -->




{{-- انيمشين --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.10.2/lottie.min.js"></script> <!-- مكتبة لوتي لتشغيل الرسوم المتحركة -->





<!-- Initialize Owl Carousel -->
<!-- تهيئة مكتبة Owl Carousel -->
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            loop: true,             // التكرار التلقائي للعناصر
            margin: 5,              // المسافة بين العناصر
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





{{-- انيميشن --}}
<!-- تهيئة الرسوم المتحركة باستخدام مكتبة Lottie -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
      console.log('Lottie Loaded:', typeof lottie); // تحقق إذا كانت مكتبة lottie محملة بنجاح
      const animationContainer = document.getElementById('empty-cart-animation');
      if (animationContainer) {
          lottie.loadAnimation({
              container: animationContainer, // العنصر الذي ستعرض فيه الرسوم
              renderer: 'svg', // نوع الرسوم (SVG)
              loop: true, // تكرار الرسوم
              autoplay: true, // تشغيل تلقائي
              path: '/front-assets/animations/HdKTC8eZWS.json' // مسار ملف JSON
          });
      } else {
          console.log('Animation container not found');
      }
  });
</script>




<!-- انيمشين عند عدم وجود طلبات -->
<script>
    // Initialize the Lottie animation for empty orders
    @if($orders instanceof \Illuminate\Support\Collection && $orders->isEmpty())
        var animation = bodymovin.loadAnimation({
            container: document.getElementById('empty-orders-animation'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '/front-assets/animations/BHD4atWtSz.json'
        });
    @endif
</script>




<!-- انيمشين عند عدم وجود قائمة مفضلات -->
<script >
document.addEventListener('DOMContentLoaded', () => {
    console.log('Lottie Loaded:', typeof lottie); // تحقق إذا كانت مكتبة lottie محملة بنجاح
    const animationContainer = document.getElementById('empty-wishlist-animation');
    if (animationContainer) {
        lottie.loadAnimation({
            container: animationContainer, // العنصر الذي ستعرض فيه الرسوم
            renderer: 'svg', // نوع الرسوم (SVG)
            loop: true, // تكرار الرسوم
            autoplay: true, // تشغيل تلقائي
            path: '/front-assets/animations/tkZ8v2CtU2.json' // مسار ملف JSON
        });
    } else {
        console.log('Animation container not found');
    }
});
</script>





<!-- انيمشين عند عدم وجود منتجات -->
<script >
    document.addEventListener('DOMContentLoaded', () => {
        console.log('Lottie Loaded:', typeof lottie); // تحقق إذا كانت مكتبة lottie محملة بنجاح
        const animationContainer = document.getElementById('no-products-animation');
        if (animationContainer) {
            lottie.loadAnimation({
                container: animationContainer, // العنصر الذي ستعرض فيه الرسوم
                renderer: 'svg', // نوع الرسوم (SVG)
                loop: true, // تكرار الرسوم
                autoplay: true, // تشغيل تلقائي
                path: '/front-assets/animations/1HM2DaVcfW (2).json' // مسار ملف JSON
            });
        } else {
            console.log('Animation container not found');
        }
    });
</script>






<!-- thanks تحميل وتشغيل الأنيميشن الأول -->
<script>
    const animationOne = lottie.loadAnimation({
        container: document.getElementById('animationOne'), // العنصر الهدف
        renderer: 'svg',
        loop: false,
        autoplay: true,
        path: '/front-assets/animations/lDJTO0WlTQ.json', // مسار ملف JSON الخاص بالأنيميشن الأول
        speed: 0.9 
    });

    // عند انتهاء الأنيميشن الأول، قم بتشغيل الثاني بسلاسة
    animationOne.addEventListener('complete', () => {
        // إخفاء الأنيميشن الأول تدريجيًا (اختياري)
        document.getElementById('animationOne').style.opacity = '0';

        // بعد مهلة قصيرة، عرض الأنيميشن الثاني بسلاسة
        setTimeout(() => {
            const animationTwoElement = document.getElementById('animationTwo');
            animationTwoElement.style.opacity = '1'; // اجعل الأنيميشن الثاني مرئيًا

            // تحميل الأنيميشن الثاني
            lottie.loadAnimation({
                container: animationTwoElement, // العنصر الهدف
                renderer: 'svg',
                loop: false,
                autoplay: true,
                path: '/front-assets/animations/sBt67xgwkC.json', // مسار ملف JSON الخاص بالأنيميشن الثاني
            });
        }, 1000); // مهلة للتأثير التدريجي، يمكن زيادتها لتبطئة العرض
    });
</script>






<!-- سكربت لإضافة المنتجات إلى قائمة الرغبات والسلة -->
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
