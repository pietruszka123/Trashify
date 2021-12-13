var currentP = null;
function ShowError(err) {
  $("#errorMessageS").text(err);
  $("#errorMessageS").show();
  setTimeout(() => {
    $("#errorMessageS").hide();
  }, 5000);
}
window.addEventListener("load", function () {
  var EditMode = false;
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
        //sourceOption.classList = "truncate";
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
  function resetEdit() {
    document.getElementById("productImageEA").value = null;
    document.getElementById("ProductImageE").src = "";
    document.getElementById("packagingTypeE").value = null;
    document.getElementById("recyclingE").value = null;
    document.getElementById("Rec").value = "mieszane";
    document.getElementById("ProductnameE").value = "";
  }
  function setInfo(response) {
    var productInfoCode = document.getElementById("productInfoCode");
    var recycling = document.getElementById("recycling");
    var packagingType = document.getElementById("packagingType");
    var ProductImage = document.getElementById("ProductImage");
    var Productname = document.getElementById("Productname");
    $("#productInfoCodeE").val(response.data.productCode);
    currentP = response;
    console.log(response.data.productCode);
    console.log(response);
    if (response.status == false) {
      console.log("?");
      EditMode = true;
      resetEdit();
      $("#productInfo").hide();
      $("#productInfoEdit").show();

      return;
    }
    EditMode = false;
    $("#productInfo").show();
    $("#productInfoEdit").hide();
    if (!response.data.productInfo.name || response.data.productInfo.name.trim().length == 0) {
      Productname.textContent = "brak informacji";
    } else {
      Productname.textContent = response.data.productInfo.name;
      //$("ProductnameE").text(response.data.productInfo.name);
      document.getElementById("ProductnameE").value = response.data.productInfo.name;
    }

    if (!response.data.productInfo.packagingType || response.data.productInfo.packagingType.trim().length == 0) {
      packagingType.textContent = "brak informacji";
    } else {
      packagingType.textContent = response.data.productInfo.packagingType;
      $("#packagingTypeE").text(response.data.productInfo.packagingType);
    }
    if (!response.data.productInfo.rec || response.data.productInfo.rec.trim().length == 0) {
      recycling.textContent = "brak informacji";
    } else {
      recycling.textContent = response.data.productInfo.rec;
      $("#recyclingE").text(response.data.productInfo.rec);
    }
    productInfoCode.textContent = response.data.productCode;
    if (response.data.image && response.data.image.length != 0) {
      ProductImage.src = `data:image/png;base64,${response.data.image}`;
      document.getElementById("ProductImageE").src = `data:image/png;base64,${response.data.image}`;
    } else {
      ProductImage.src = response.data.productInfo.image_url;
      document.getElementById("ProductImageE").src = response.data.productInfo.image_url;
    }
    var binB = document.getElementById("clossetBin");
    if (!response.data.productInfo.binType || response.data.productInfo.binType.length == 0) {
      binB.disabled = true;
    } else {
      binB.disabled = false;
      binB.binType = response.data.productInfo.binType;
      binB.addEventListener("click", function (e) {
        console.log(this.binType);
        var base = btoa(JSON.stringify({ type: this.binType }));
        window.location = `/mapa.php?data=${base}`;
      });
    }
  }
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
        $("#ExampleP").hide();
        console.log(response);
        console.log(response.data);
        setInfo(response);
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
          ShowError(err);
        });
    } else {
      codeReader.reset();
    }
  });
  document.getElementById("submit").addEventListener("click", function (e) {
    var code = document.getElementById("codeInput").value.trim();
    if (code.length >= 12) {
      if (currentP.data.productCode != code) {
        GetProduct(code);
      }
    } else {
      ShowError("kod produktu musi mieć przynajmniej 12 znaków");
    }
  });
  $.ajax({
    type: "post",
    url: "/api/getProduct.json",
    data: JSON.stringify({ productCode: "random" }),
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function (response) {
      console.log(response);
      console.log(response.data);
      setInfo(response);
    },
  });
  //edit
  function checUpdate(d) {
    if (d.productInfo.name != currentP.data.productInfo.name) return true;
    if (d.productCode != currentP.data.productCode) return true;
    if (d.productInfo.rec != currentP.data.productInfo.rec) return true;
    if (d.productInfo.packagingType != currentP.data.productInfo.packagingType) return true;
    if (d.productInfo.binType != currentP.data.productInfo.binType) return true;
    return false;
  }
  function a() {
    var productImageEA = document.getElementById("productImageEA");
    var productImageE = document.getElementById("ProductImageE");
    var productInfoCodeE = document.getElementById("productInfoCodeE");
    var packagingTypeE = document.getElementById("packagingTypeE");
    var recyclingE = document.getElementById("recyclingE");
    var Rec = document.getElementById("Rec");
    var ProductnameE = document.getElementById("ProductnameE");
    var f = null;
    productImageEA.addEventListener("change", function (e) {
      const [file] = this.files;
      console.log(file);
      if (file) {
        productImageE.src = URL.createObjectURL(file);
        var reader = new FileReader();
        reader.addEventListener("load", function (e) {
          f = this.result;
        });
        reader.readAsBinaryString(file);
      }
    });
    $("#saveChanges").click(function (e) {
      if (productInfoCodeE.value.trim().length != 0) {
        var r = {
          productCode: productInfoCodeE.value,
          productInfo: { name: ProductnameE.value.trim(), rec: recyclingE.value.trim(), packagingType: packagingTypeE.value.trim(), binType: Rec.value },
        };
        if (!currentP.data.productInfo.image_url || !currentP.data.productInfo.image_url == productImageE.src) {
          r.image = `${btoa(f)}`;
          //r.imageUpdate = true;
        } else {
          r.productInfo.image_url = currentP.data.productInfo.image_url;
        }
        //if (checUpdate(r)) r.update = true;
        //else
        $.ajax({
          type: "post",
          url: "/apiv2.1.3.7/inserter.php",
          data: JSON.stringify(r),
          dataType: "json",
          success: function (response) {
            console.log(response);
            alert("Zapisano Pomyślnie");
          },
        });
      }
    });
  }
  a();
  $("#editProduct").click(function (e) {
    $("#productInfo").hide();
    $("#productInfoEdit").show();
  });
  $("#cancelChanges").click(() => {
    resetEdit();
    $("#productInfo").show();
    $("#productInfoEdit").hide();
  });
});
