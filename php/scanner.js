window.addEventListener("load", function () {
  let selectedDeviceId;
  const codeReader = new ZXing.BrowserBarcodeReader();
  console.log("ZXing code reader initialized");
  codeReader.getVideoInputDevices().then((videoInputDevices) => {
    //const sourceSelect = document.getElementById("sourceSelect");
    selectedDeviceId = videoInputDevices[0].deviceId;
    codeReader
      .decodeOnceFromVideoDevice(selectedDeviceId, "video")
      .then((result) => {
        console.log(result);
      })
      .catch((err) => {
        console.error(err);
      });
  });
});
window.addEventListener("resize", (e) => {
  //var v = document.getElementById("video");
  //v.width = v.clientWidth;
  //console.trace(v);
});
