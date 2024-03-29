<!DOCTYPE html>
<html lang="en"  manifest="http://localhost/sbtourism/index.php/scanner/guest">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>QR Code Scanner</title>
  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>
  <h1>QR Code Scanner</h1>
  <video id="preview"></video>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
  let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

  scanner.addListener('scan', function (content) {
    alert('QR Code scanned: ' + content);
    // You can perform additional actions with the scanned content here
  });

  Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
    } else {
      console.error('No cameras found.');
      alert('No cameras found.');
    }
  }).catch(function (e) {
    console.error(e);
  });
});

  </script>
</body>
</html>