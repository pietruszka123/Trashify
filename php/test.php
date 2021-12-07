<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <!-- <script src="/api/qr-scanner-worker.min.js"></script> -->
  <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
  <script src="./t.js"></script>
</head>

<body>
  <div id="qr-reader" style="width: 600px"></div>
  <!-- <video id="video"></video> -->
  <script type="module">
    //import QrScanner from "./qr-scanner.min.js";
    // do something with QrScanner
    //var videoElem = document.getElementById("video");
    //const qrScanner = new QrScanner(videoElem, (result) => console.log("decoded qr code:", result));
    //qrScanner.start();
    // function onScanSuccess(decodedText, decodedResult) {
    //   console.log(`Code scanned = ${decodedText}`, decodedResult);
    // }
    // var html5QrcodeScanner = new Html5QrcodeScanner(
    //   "qr-reader", {
    //     fps: 10,
    //     qrbox: 250,
    //     formatsToSupport: [Html5QrcodeSupportedFormats.EAN_13, Html5QrcodeSupportedFormats.QR_CODE]

    //   });
    // html5QrcodeScanner.render(onScanSuccess);
  </script>

  <main class="wrapper" style="padding-top:2em">

    <section class="container" id="demo-content">
      <h1 class="title">Scan barcode from Video Camera</h1>

      <p>
        <a class="button-small button-outline" href="../../index.html">HOME 🏡</a>
      </p>

      <p>
        This example shows how to scan a barcode with ZXing javascript library from the device video camera. If more
        than one video input devices are available (for example front and back camera) the example shows how to read
        them and use a select to change the input device.
      </p>

      <div>
        <a class="button" id="startButton">Start</a>
        <a class="button" id="resetButton">Reset</a>
      </div>

      <div>
        <video id="video" width="600" height="400" style="border: 1px solid gray"></video>
      </div>

      <div id="sourceSelectPanel" style="display:none">
        <label for="sourceSelect">Change video source:</label>
        <select id="sourceSelect" style="max-width:400px">
        </select>
      </div>

      <label>Result:</label>
      <pre><code id="result"></code></pre>

      <p>See the <a href="https://github.com/zxing-js/library/tree/master/docs/examples/barcode-camera/">source code</a> for this example.</p>

    </section>

    <footer class="footer">
      <section class="container">
        <p>ZXing TypeScript Demo. Licensed under the <a target="_blank" href="https://github.com/zxing-js/library#license" title="MIT">MIT</a>.</p>
      </section>
    </footer>

  </main>

  <script type="text/javascript" src="https://unpkg.com/@zxing/library@0.18.6/umd/index.min.js"></script>
  <script type="text/javascript">
    window.addEventListener('load', function() {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserBarcodeReader()
      console.log('ZXing code reader initialized')
      codeReader.getVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length > 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            }

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeOnceFromVideoDevice(selectedDeviceId, 'video').then((result) => {
              console.log(result)
              document.getElementById('result').textContent = result.text
            }).catch((err) => {
              console.error(err)
              document.getElementById('result').textContent = err
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            document.getElementById('result').textContent = '';
            codeReader.reset();
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })
  </script>
  <?php
  echo phpversion();
  echo print_r($_GET);
  echo print_r($argv)
  ?>
</body>

</html>