window.addEventListener("load", function () {
  let selectedDeviceId;
  const codeReader = new ZXing.BrowserBarcodeReader();
  codeReader.getVideoInputDevices().then((videoInputDevices) => {
    const sourceSelect = document.getElementById("sourceSelect");
    selectedDeviceId = videoInputDevices[0].deviceId;
    if (videoInputDevices.length > 1) {
      videoInputDevices.forEach((element) => {
        const sourceOption = document.createElement("option");
        sourceOption.text = element.label;
        sourceOption.value = element.deviceId;
        sourceSelect.appendChild(sourceOption);
      });
      sourceSelect.hidden = false;
      sourceSelect.onchange = () => {
        selectedDeviceId = sourceSelect.value;
      };
    } else {
      sourceSelect.hidden = false;
    }
  });
  /**
   *
   * @param {string} code kod Produktu
   */
  function GetProduct(code) {
    $.ajax({
      type: "post",
      url: "/api/getProduct.json",
      data: JSON.stringify({ productCode: code }),
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (response) {
        console.log(response);
      },
    });
  }

  //start
  document.getElementById("startvideo").addEventListener("change", function (e) {
    if (this.checked) {
      console.log("start");
      codeReader
        .decodeOnceFromVideoDevice(selectedDeviceId, "video")
        .then((result) => {
          console.log(result);
          document.getElementById("codeInput").value = result.text;
          GetProduct(result.text);
        })
        .catch((err) => {
          console.error(err);
        });
    } else {
      codeReader.reset();
    }
  });
  document.getElementById("submit").addEventListener("click", function (e) {
    var code = document.getElementById("codeInput").value.trim();
    GetProduct(code);
  });
});
