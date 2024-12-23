<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديد المقاس باستخدام الكاميرا</title>
    <style>
        #camera {
            width: 100%;
            height: auto;
        }
        #capture-btn {
            margin-top: 10px;
        }
        #captured-image {
            margin-top: 10px;
            display: none;
        }
        #size-result img {
            width: 100%;
        }
    </style>
</head>
<body>
    <h2>تحديد المقاس باستخدام الكاميرا</h2>
    <video id="camera" autoplay></video>
    <button id="capture-btn">التقاط الصورة</button>
    <canvas id="captured-image"></canvas>
    <div id="size-result"></div>
    <div id="size-dimensions"></div>  <!-- لعرض القياسات -->

    <!-- تحميل مكتبة OpenCV.js من المجلد المحلي -->
    <script src="{{ asset('libs/opencv.js') }}"></script>

    <script>
        const camera = document.getElementById('camera');
        const captureButton = document.getElementById('capture-btn');
        const capturedImageCanvas = document.getElementById('captured-image');
        const sizeResult = document.getElementById('size-result');
        const sizeDimensions = document.getElementById('size-dimensions');
        const context = capturedImageCanvas.getContext('2d');

        // الوصول إلى الكاميرا
        navigator.mediaDevices.getUserMedia({ video: true })
            .then((stream) => {
                camera.srcObject = stream;
                console.log('تم الوصول إلى الكاميرا بنجاح');
            })
            .catch((error) => {
                console.error('فشل الوصول إلى الكاميرا', error);
            });

        // التأكد من تحميل OpenCV.js
        cv.onRuntimeInitialized = () => {
            console.log('مكتبة OpenCV جاهزة للاستخدام');
        };

        // التقاط الصورة عند الضغط على الزر
        captureButton.addEventListener('click', () => {
            console.log('تم الضغط على زر التقاط الصورة');
            capturedImageCanvas.width = camera.videoWidth;
            capturedImageCanvas.height = camera.videoHeight;
            context.drawImage(camera, 0, 0, capturedImageCanvas.width, capturedImageCanvas.height);

            // عرض الصورة الملتقطة
            const imageDataUrl = capturedImageCanvas.toDataURL('image/png');
            sizeResult.innerHTML = `<img src="${imageDataUrl}" alt="الصورة الملتقطة">`;

            // تحليل الصورة باستخدام OpenCV.js
            cv.onRuntimeInitialized = () => {
    console.log('مكتبة OpenCV جاهزة للاستخدام');

    captureButton.addEventListener('click', () => {
        console.log('تم الضغط على زر التقاط الصورة');
        capturedImageCanvas.width = camera.videoWidth;
        capturedImageCanvas.height = camera.videoHeight;
        context.drawImage(camera, 0, 0, capturedImageCanvas.width, capturedImageCanvas.height);

        // عرض الصورة الملتقطة
        const imageDataUrl = capturedImageCanvas.toDataURL('image/png');
        sizeResult.innerHTML = `<img src="${imageDataUrl}" alt="الصورة الملتقطة">`;

        // بدء معالجة الصورة
        console.log('الانتظار لتحميل OpenCV...');
        let src = cv.imread(capturedImageCanvas);
        let gray = new cv.Mat();
        console.log('تم تحميل الصورة في OpenCV');
        cv.cvtColor(src, gray, cv.COLOR_RGBA2GRAY, 0); // تحويل الصورة إلى تدرجات الرمادي
        console.log('تم تحويل الصورة إلى تدرجات الرمادي');

        let binary = new cv.Mat();
        cv.threshold(gray, binary, 120, 255, cv.THRESH_BINARY); // تحويل الصورة إلى صورة ثنائية اللون
        console.log('تم تحويل الصورة إلى صورة ثنائية اللون');

        let blurred = new cv.Mat();
        cv.GaussianBlur(binary, blurred, new cv.Size(5, 5), 0);
        console.log('تم تطبيق التمويه على الصورة');

        let contours = new cv.MatVector();
        let hierarchy = new cv.Mat();
        cv.findContours(blurred, contours, hierarchy, cv.RETR_EXTERNAL, cv.CHAIN_APPROX_SIMPLE);
        console.log('تم العثور على الأبعاد (contours)');

        // العثور على أكبر contour وحساب الأبعاد
        if (contours.size() > 0) {
            let maxContour = contours.get(0);
            let maxArea = cv.contourArea(maxContour);
            let maxIndex = 0;
            for (let i = 1; i < contours.size(); i++) {
                let area = cv.contourArea(contours.get(i));
                if (area > maxArea) {
                    maxArea = area;
                    maxIndex = i;
                }
            }

            // حساب الأبعاد
            let boundingRect = cv.boundingRect(contours.get(maxIndex));
            let width = boundingRect.width;
            let height = boundingRect.height;
            sizeDimensions.innerHTML = `<p>عرض الشخص: ${width} بكسل</p><p>ارتفاع الشخص: ${height} بكسل</p>`;
            console.log(`عرض الشخص: ${width} بكسل`);
            console.log(`ارتفاع الشخص: ${height} بكسل`);
        } else {
            sizeDimensions.innerHTML = `<p>لم يتم العثور على contours</p>`;
            console.log('لم يتم العثور على contours');
        }

        // عرض الصورة المعالجة
        cv.imshow('captured-image', binary);
        src.delete();
        gray.delete();
        blurred.delete();
        contours.delete();
        hierarchy.delete();
    });
};
        });
    </script>
</body>
</html>
