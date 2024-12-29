@extends('front.master')

@section('thanks-active', 'active') 
@section('title', 'Shirt Size Calculator')

@section('content')
  <div class="container py-5">
    <h1 class="text-center mb-4">Shirt Size Calculator</h1>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <video id="camera" autoplay class="w-100" style="display: none;"></video>
        <img id="uploadedImage" alt="Uploaded" class="w-100" style="display: none; ">
        <input type="file" id="imageInput" accept="image/*" style="display: none;">
        
        <!-- Camera button (hidden initially) -->
        <button id="startCamera" class="btn btn-primary w-100 mb-3" style="display: none;">Use Camera</button>
        
        <!-- Upload Image Button -->
        <button id="uploadImage" class="btn btn-primary w-100 mb-3">Upload Image</button>
        
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

    async function startCamera() {
      const video = document.getElementById('camera');
      try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;
        video.style.display = 'block';
        document.getElementById('uploadedImage').style.display = 'none';
        document.getElementById('calculateSize').style.display = 'inline-block';
      } catch (error) {
        console.error('Error accessing the camera: ', error);
      }
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

      if (video.style.display === 'block') {
        pose = await net.estimateSinglePose(video, { flipHorizontal: false });
      } else if (uploadedImage.style.display === 'block') {
        const img = new Image();
        img.src = uploadedImage.src;
        pose = await net.estimateSinglePose(img, { flipHorizontal: false });
      } else {
        resultDiv.textContent = 'Please select an input method first.';
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

      let size = '';
      if (shoulderWidth > 60.5 && waistWidth > 37) {
        size = 'Large (L)';
      } else if (shoulderWidth > 58.7 && waistWidth > 35) {
        size = 'Medium (M)';
      } else {
        size = 'Small (S)';
      }

      // SweetAlert2 Alert
      Swal.fire({
        title: 'Your Shirt Size',
        text: `Your shirt size is: ${size}`,
        icon: 'success',
        confirmButtonText: 'OK',
        width: '300px', // Set the alert size
      });
    }

    function calculateManualSize() {
      const height = parseInt(document.getElementById('height').value);
      const weight = parseInt(document.getElementById('weight').value);
      const resultDiv = document.getElementById('result');

      let size = '';
      if (height >= 150 && height <= 164 && weight >= 45 && weight <= 55) {
        size = 'S';
      } else if (height >= 164 && height <= 173 && weight >= 56 && weight <= 70) {
        size = 'M';
      } else if (height >= 174 && height <= 179 && weight >= 70 && weight <= 85) {
        size = 'L';
      } else if (height >= 180 && weight >= 85) {
        size = 'XL';
      } else {
        size = 'Unable to determine size based on the entered data.';
      }

      // SweetAlert2 Alert
      Swal.fire({
        title: 'Your Shirt Size',
        text: `Your size is: ${size}`,
        icon: 'success',
        confirmButtonText: 'OK',
        width: '300px', // Set the alert size
      });
    }

    window.onload = () => {
      loadPoseNet();

      document.getElementById('uploadImage').addEventListener('click', () => {
        document.getElementById('imageInput').click();
      });
      document.getElementById('imageInput').addEventListener('change', handleImageUpload);
      document.getElementById('calculateSize').addEventListener('click', calculateSize);
      document.getElementById('manualCalculate').addEventListener('click', calculateManualSize);
    };
  </script>
@endsection
