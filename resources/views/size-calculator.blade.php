<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Body Measurement with TensorFlow.js</title>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/body-pix"></script>
    <style>
        canvas {
            position: absolute;
            top: 0;
            left: 0;
            pointer-events: none; /* لضمان أن الكاميرا تعمل بشكل طبيعي */
        }
    </style>
</head>
<body>
    <h1>Body Measurements</h1>
    <video id="video" width="640" height="480" autoplay></video>
    <canvas id="canvas" width="640" height="480"></canvas>
    <button id="calculate">Calculate Measurements</button>
    <div id="measurements"></div>

    <script>
        const videoElement = document.getElementById('video');
        const canvasElement = document.getElementById('canvas');
        const ctx = canvasElement.getContext('2d');
        let net;

        async function setupCamera() {
            const stream = await navigator.mediaDevices.getUserMedia({
                video: true
            });
            videoElement.srcObject = stream;
            videoElement.onloadeddata = () => {
                startPoseDetection();
            };
        }

        async function startPoseDetection() {
            net = await bodyPix.load();
            detectPose();
        }

        async function detectPose() {
            const segmentation = await net.segmentPerson(videoElement);
            const coloredPartImage = bodyPix.toMask(segmentation);
            ctx.putImageData(coloredPartImage, 0, 0);

            // إضافة التحقق من وجود الجسم
            if (segmentation.allPoses.length > 0) {
                const bodyParts = segmentation.allPoses[0].pose;

                // التأكد من وجود النقاط مثل الأنف والقدم
                if (bodyParts.nose && bodyParts.leftAnkle && bodyParts.leftShoulder && bodyParts.rightShoulder) {
                    const height = calculateHeight(bodyParts);
                    const chest = calculateChest(bodyParts);
                    const waist = calculateWaist(bodyParts);

                    // عرض القياسات
                    document.getElementById('measurements').innerHTML = `
                        <p>Height: ${height} cm</p>
                        <p>Chest: ${chest} cm</p>
                        <p>Waist: ${waist} cm</p>
                    `;
                } else {
                    console.error('نقاط الجسم غير مكتملة');
                }

                // رسم هيكل الجسم على الفيديو
                drawSkeleton(bodyParts);
            }

            requestAnimationFrame(detectPose); // Keep detecting
        }

        function drawSkeleton(bodyParts) {
            const connections = [
                ['nose', 'leftShoulder'],
                ['nose', 'rightShoulder'],
                ['leftShoulder', 'leftElbow'],
                ['rightShoulder', 'rightElbow'],
                ['leftElbow', 'leftWrist'],
                ['rightElbow', 'rightWrist'],
                ['leftShoulder', 'leftHip'],
                ['rightShoulder', 'rightHip'],
                ['leftHip', 'leftKnee'],
                ['rightHip', 'rightKnee'],
                ['leftKnee', 'leftAnkle'],
                ['rightKnee', 'rightAnkle']
            ];

            connections.forEach(connection => {
                const [startPoint, endPoint] = connection;
                if (bodyParts[startPoint] && bodyParts[endPoint]) {
                    const start = bodyParts[startPoint];
                    const end = bodyParts[endPoint];
                    ctx.beginPath();
                    ctx.moveTo(start.x, start.y);
                    ctx.lineTo(end.x, end.y);
                    ctx.strokeStyle = 'red'; // لون الخط الأحمر
                    ctx.lineWidth = 2;
                    ctx.stroke();
                }
            });

            // رسم النقاط
            Object.keys(bodyParts).forEach(key => {
                if (bodyParts[key]) {
                    const point = bodyParts[key];
                    ctx.beginPath();
                    ctx.arc(point.x, point.y, 5, 0, 2 * Math.PI);
                    ctx.fillStyle = 'red'; // لون النقاط أحمر
                    ctx.fill();
                }
            });
        }

        function calculateHeight(bodyParts) {
            if (bodyParts.nose && bodyParts.leftAnkle) {
                const head = bodyParts.nose;
                const feet = bodyParts.leftAnkle; // أو اليمين حسب الحاجة
                return calculateDistance(head, feet);
            }
            return 0;
        }

        function calculateChest(bodyParts) {
            if (bodyParts.leftShoulder && bodyParts.rightShoulder) {
                const leftShoulder = bodyParts.leftShoulder;
                const rightShoulder = bodyParts.rightShoulder;
                const leftHip = bodyParts.leftHip;
                const rightHip = bodyParts.rightHip;

                const shoulderWidth = calculateDistance(leftShoulder, rightShoulder);
                const chestHeight = calculateDistance(leftShoulder, leftHip);

                return shoulderWidth * chestHeight; 
            }
            return 0;
        }

        function calculateWaist(bodyParts) {
            if (bodyParts.leftHip && bodyParts.rightHip) {
                const leftHip = bodyParts.leftHip;
                const rightHip = bodyParts.rightHip;
                return calculateDistance(leftHip, rightHip) * 1.5; 
            }
            return 0;
        }

        function calculateDistance(point1, point2) {
            if (point1 && point2) {
                const dx = point2.x - point1.x;
                const dy = point2.y - point1.y;
                return Math.sqrt(dx * dx + dy * dy) * 100; // تحويل المسافة إلى سنتيمتر
            }
            return 0;
        }

        document.getElementById('calculate').addEventListener('click', async () => {
            if (!net) return;
            const segmentation = await net.segmentPerson(videoElement);
            const bodyParts = segmentation.allPoses;

            let height = calculateHeight(bodyParts);
            let chest = calculateChest(bodyParts);
            let waist = calculateWaist(bodyParts);

            document.getElementById('measurements').innerHTML = `
                <p>Height: ${height} cm</p>
                <p>Chest: ${chest} cm</p>
                <p>Waist: ${waist} cm</p>
            `;
        });

        setupCamera();
    </script>
</body>
</html>
