<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <!-- إضافة Bootstrap لتحسين التصميم -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* تخصيص تصميم الزر */
        .btn-custom {
            background-color: #a87676;
            color: white;
            padding: 15px 25px;
            font-size: 18px;
            border-radius: 10px;
            transition: background-color 0.3s, transform 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px; /* إضافة هامش أعلى للزر */
        }

        .btn-custom:hover {
            background-color: #8b5c5c;
            transform: scale(1.1); /* تكبير الزر عند التمرير */
        }

        .btn-custom:focus {
            outline: none;
        }

        /* تخصيص صفحة الخطأ */
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;  /* محاذاة المحتوى عموديًا */
            align-items: center;      /* محاذاة المحتوى أفقيًا */
            height: 100vh;            /* ملء الصفحة */
            text-align: center;
        }
        a::after {
    text-decoration: none; /* إزالة الخط تحت الرابط */
}
a {
    text-decoration: none; /* إزالة الخط تحت الرابط بشكل افتراضي */
    color: white; /* تخصيص لون النص */
    transition: color 0.3s, text-decoration-color 0.3s; /* إضافة تأثير للون والخط */
}

a:hover {
    color: white; /* تغيير اللون إلى الأزرق عند التمرير */
    text-decoration: none; /* إزالة الخط تحت الرابط بشكل افتراضي */

}
img{
    width: 700px;
    height: auto;
    object-fit: cover;
    display: block;
    margin-bottom: 20px;
}


    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/error404.jpg') }}" alt="Error 404" style="width: 40%; max-width: 600px; margin-bottom: 30px;">
        <h4>Oops! You're lost...</h4>
        <p>The page you are looking are looking for might have been moved, renamed, or might never existed.</p>
        <a href="{{ route('front.index') }}">
            <button class="btn btn-custom">Go to Homepage</button>
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
