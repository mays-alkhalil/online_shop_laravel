@extends('front.master')

@section('thanks-active', 'active') 
@section('title', 'Shirt Size Calculator')

@section('content')
  <div class="container py-5">
    <h1 class="text-center mb-4"> Size Calculator</h1>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <video id="camera" autoplay class="w-100" style="display: none;"></video>
        <img id="uploadedImage" alt="Uploaded" class="w-100" style="display: none; ">
        <input type="file" id="imageInput" accept="image/*" style="display: none;">
        
        <!-- Camera button (hidden initially) -->
        <button id="startCamera" class="btn btn-primary w-100 mb-3" style="display: none;">Use Camera</button>
        
        <!-- Upload Image Button -->
        <button id="uploadImage" class="btn btn-primary w-100 mb-3 mt-2">Upload Image</button>
        
        <!-- Calculate Size Button (hidden initially) -->
        <button id="calculateSize" class="btn btn-success w-100 mb-3" style="display: none;">Calculate Size</button>

        <div class="manual-input mt-5">
          <h3 class="text-center">Or enter your details manually:</h3>
          <div class="form-group">
            <label for="height">Height (cm):</label>
            <input type="number" id="height" class="form-control" min="0">
          </div>
          <div class="form-group">
            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" class="form-control" min="0">
          </div>
          <div class="form-group">
            <label for="FootLength">Foot Length (cm):</label>
            <input type="number" id="FootLength" class="form-control" min="0">
          </div>
          <button id="manualCalculate" class="btn btn-primary w-100 mt-3">Calculate Size Manually</button>
        </div>

        <div id="result" class="mt-4 text-center"></div>
      </div>
    </div>

    <div class="size-table mt-5">
      <h3 class="text-center mb-4">Size Chart</h3>
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th>Size</th>
            <th>Weight (kg)</th>
            <th>Height (cm)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>S</td>
            <td>45-55</td>
            <td>150-164</td>
          </tr>
          <tr>
            <td>M</td>
            <td>56-70</td>
            <td>164-173</td>
          </tr>
          <tr>
            <td>L</td>
            <td>70-85</td>
            <td>174-179</td>
          </tr>
          <tr>
            <td>XL</td>
            <td>+85</td>
            <td>+180</td>
          </tr>
        </tbody>
      </table>

      <h3 class="text-center mb-4">T-shirt Measurements (CM)</h3>
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th>Size</th>
            <th>Length</th>
            <th>Sleeve</th>
            <th>Chest</th>
            <th>Shoulders</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>S</td>
            <td>70</td>
            <td>24.5</td>
            <td>56.5</td>
            <td>57.5</td>
          </tr>
          <tr>
            <td>M</td>
            <td>74.5</td>
            <td>25.5</td>
            <td>59</td>
            <td>58.7</td>
          </tr>
          <tr>
            <td>L</td>
            <td>78.25</td>
            <td>27</td>
            <td>62.75</td>
            <td>60.5</td>
          </tr>
          <tr>
            <td>XL</td>
            <td>82</td>
            <td>28.5</td>
            <td>66.5</td>
            <td>62.3</td>
          </tr>
        </tbody>
      </table>

      <h3 class="text-center mb-4">Shorts/Pants Measurements (CM)</h3>
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th>Size</th>
            <th>Length</th>
            <th>Waist</th>
            <th>Hips</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>S</td>
            <td>53</td>
            <td>32</td>
            <td>51</td>
          </tr>
          <tr>
            <td>M</td>
            <td>54.5</td>
            <td>35</td>
            <td>54</td>
          </tr>
          <tr>
            <td>L</td>
            <td>55.5</td>
            <td>37</td>
            <td>56</td>
          </tr>
          <tr>
            <td>XL</td>
            <td>57</td>
            <td>40</td>
            <td>58</td>
          </tr>
        </tbody>
      </table>

      <h3 class="text-center mb-4">Shoe Size Chart (CM)</h3>
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th>Foot Length (CM)</th>
            <th>Size</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>22.5</td>
            <td>35</td>
          </tr>
          <tr>
            <td>23</td>
            <td>36</td>
          </tr>
          <tr>
            <td>23.5</td>
            <td>37</td>
          </tr>
          <tr>
            <td>24</td>
            <td>38</td>
          </tr>
          <tr>
            <td>24.5</td>
            <td>39</td>
          </tr>
          <tr>
            <td>25</td>
            <td>40</td>
          </tr>
          <tr>
            <td>25.5</td>
            <td>41</td>
          </tr>
          <tr>
            <td>26</td>
            <td>42</td>
          </tr>
          <tr>
            <td>26.5</td>
            <td>43</td>
          </tr>
          <tr>
            <td>27</td>
            <td>44</td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/posenet"></script>
  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    let net;

    async function loadPoseNet() {
      net = await posenet.load({
        architecture: 'MobileNetV1',
        outputStride: 16,
        inputResolution: { width: 320, height: 240 },
        multiplier: 0.75,
      });
      console.log('PoseNet model loaded');
    }

    function handleImageUpload(event) {
      const uploadedImage = document.getElementById('uploadedImage');
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
          uploadedImage.src = e.target.result;
          uploadedImage.style.display = 'block';
          document.getElementById('camera').style.display = 'none';
          document.getElementById('calculateSize').style.display = 'inline-block';
        };
        reader.readAsDataURL(file);
      }
    }

    async function calculateSize() {
      const resultDiv = document.getElementById('result');
      const video = document.getElementById('camera');
      const uploadedImage = document.getElementById('uploadedImage');
      let pose;

      if (uploadedImage.style.display === 'block') {
        const img = new Image();
        img.src = uploadedImage.src;
        pose = await net.estimateSinglePose(img, { flipHorizontal: false });
      } else {
        resultDiv.textContent = 'Please Upload a new image';
        return;
      }

      const leftShoulder = pose.keypoints.find((kp) => kp.part === 'leftShoulder');
      const rightShoulder = pose.keypoints.find((kp) => kp.part === 'rightShoulder');
      const leftHip = pose.keypoints.find((kp) => kp.part === 'leftHip');
      const rightHip = pose.keypoints.find((kp) => kp.part === 'rightHip');

      if (!leftShoulder || !rightShoulder || !leftHip || !rightHip) {
        resultDiv.textContent = 'Could not detect keypoints. Please make sure you are visible and try again.';
        return;
      }

      const shoulderWidth = Math.abs(leftShoulder.position.x - rightShoulder.position.x);
      const waistWidth = Math.abs(leftHip.position.x - rightHip.position.x);
      

      let shirtSize = '';
let pantSize = '';
if (shoulderWidth > 60.5 && waistWidth > 37) {
  shirtSize = 'Large (L)';
} else if (shoulderWidth > 58.5 && waistWidth > 34) {
  shirtSize = 'Medium (M)';
} else if (shoulderWidth <= 58.5 && waistWidth <= 34) {
  shirtSize = 'Small (S)';
} else {
  shirtSize = 'Undefined'; // إذا كانت القياسات غير كافية
}

// تحديد حجم الـ Pants
if (waistWidth > 37) {
  pantSize = 'Large (L)';
} else if (waistWidth > 34) {
  pantSize = 'Medium (M)';
} else if (waistWidth <= 34) {
  pantSize = 'Small (S)';
} else {
  pantSize = 'Undefined'; // إذا كانت القياسات غير كافية
}





      Swal.fire({
        title: 'Calculated Size',
        text: `Based on your image, your estimated sizes are:
  Shirt: ${shirtSize}
  Pants: ${pantSize}
  `,
          icon: 'success',
      });
    }

    function handleManualCalculate() {
      const height = parseFloat(document.getElementById('height').value);
      const weight = parseFloat(document.getElementById('weight').value);
      const FootLength = parseFloat(document.getElementById('FootLength').value);
      const resultDiv = document.getElementById('result');

      if (!height || !weight || !FootLength) {
        resultDiv.textContent = 'Please enter valid height , weight and foot length.';
        return;
      }

      let size = '';
  let pantSize = '';
  let shoeSize = '';
  let shirtSize = '';

     // تحديد حجم الشيرت
  if (height >= 160 && weight >= 70) {
    shirtSize = 'Large (L)';
  } else if (height >= 150 && weight >= 50) {
    shirtSize = 'Medium (M)';
  } else {
    shirtSize = 'Small (S)';
  }

  // تحديد حجم البانت
  if (weight >= 70 && height >= 175) {
    pantSize = 'Large (L)';
  } else if (weight >= 50 && height >= 160) {
    pantSize = 'Medium (M)';
  } else {
    pantSize = 'Small (S)';
  }

  // تحديد حجم الشوز بناءً على طول القدم
// تحديد حجم الشوز بناءً على طول القدم
if (FootLength >= 22.5 && FootLength < 23) {
    shoeSize = '35';
  } else if (FootLength >= 23 && FootLength < 23.5) {
    shoeSize = '36';
  } else if (FootLength >= 23.5 && FootLength < 24) {
    shoeSize = '37';
  } else if (FootLength >= 24 && FootLength < 24.5) {
    shoeSize = '38';
  } else if (FootLength >= 24.5 && FootLength < 25) {
    shoeSize = '39';
  } else if (FootLength >= 25 && FootLength < 25.5) {
    shoeSize = '40';
  } else if (FootLength >= 25.5 && FootLength < 26) {
    shoeSize = '41';
  } else if (FootLength >= 26 && FootLength < 26.5) {
    shoeSize = '42';
  } else if (FootLength >= 26.5 && FootLength < 27) {
    shoeSize = '43';
  } else if (FootLength >= 27) {
    shoeSize = '44';
  } else {
    shoeSize = 'Invalid foot length';
  }
      Swal.fire({
        title: 'Calculated Size',
      
        text: `Your calculated Shirt size is: ${shirtSize} and Pant size is: ${pantSize} and Shoe size is: ${shoeSize}`,
        icon: 'success',
      });
    }

    document.getElementById('uploadImage').addEventListener('click', () => {
      document.getElementById('imageInput').click();
    });

    document.getElementById('imageInput').addEventListener('change', handleImageUpload);
    document.getElementById('startCamera').addEventListener('click', startCamera);
    document.getElementById('calculateSize').addEventListener('click', calculateSize);
    document.getElementById('manualCalculate').addEventListener('click', handleManualCalculate);

    loadPoseNet();
  </script>
@endsection
