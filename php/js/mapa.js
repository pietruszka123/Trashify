class Kosz {
  constructor() {
    this.pos = [0, 0];
    this.image = "";
    this.type = "";
    this.acceptance = 0;
  }
  saveToDataBase() {
    $.ajax({
      type: "post",
      url: "/apiv2.1.3.7/addKosz.php",
      data: JSON.stringify({ trashCanLocation: { longitude: this.pos[0], latitude: this.pos[1] }, trashCanType: this.type, trashCanAcceptance: this.acceptance }),
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (response) {},
    });
  }
}
class geo {
  constructor() {
    this.geo = new ol.Geolocation({
      // enableHighAccuracy must be set to true to have the heading value.
      trackingOptions: {
        enableHighAccuracy: true,
      },
      projection: view.getProjection(),
    });
    this.geo.setTracking(true);
    this.geo.on("change:position", () => {
      const coordinates = this.geo.getPosition();
      this.positionFeature.setGeometry(coordinates ? new ol.geom.Point(coordinates) : null);
    });
    this.accuracyFeature = new ol.Feature();
    this.geo.on("change:accuracyGeometry", () => {
      this.accuracyFeature.setGeometry(this.geo.getAccuracyGeometry());
    });
    this.positionFeature = new ol.Feature();
    this.positionFeature.setStyle(
      new ol.style.Style({
        image: new ol.style.Circle({
          radius: 6,
          fill: new ol.style.Fill({
            color: "#3399CC",
          }),
          stroke: new ol.style.Stroke({
            color: "#fff",
            width: 2,
          }),
        }),
      })
    );
  }
  start() {
    source.addFeature(this.positionFeature);
    source.addFeature(this.accuracyFeature);
    view.animate({
      center: this.geo.getPosition(),
      duration: 500,
    });
  }
  stop() {
    source.removeFeature(this.positionFeature);
    source.removeFeature(this.accuracyFeature);
  }
}
class Location extends ol.control.Control {
  constructor(opt_options) {
    const options = opt_options || {};

    const button = document.createElement("button");
    button.innerHTML = "P";

    const element = document.createElement("div");
    element.className = "LocationBtn ol-unselectable ol-control";
    element.appendChild(button);

    super({
      element: element,
      target: options.target,
    });
    this.geo = new geo();
    this.state = false;
    button.addEventListener("click", this.handleRotateNorth.bind(this), false);
  }

  handleRotateNorth() {
    if (this.state) {
      this.geo.stop();
    } else {
      this.geo.start();
    }
    this.state = !this.state;
    //this.getMap().getView().setRotation(0);
  }
}
var cords = { lon: 21.168062, lan: 49.677148 };
$.ajax({
  type: "post",
  url: "/apiv2.1.3.7/Koszee.php",
  data: JSON.stringify({ a: false }),
  contentType: "application/json; charset=utf-8",
  dataType: "json",
  success: function (response) {
    console.log(response);
    response.data.forEach((element) => {
      var a = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([element.location.longitude, element.location.latitude])),
      });
      //   a.setStyle(
      //     new ol.style.Style({
      //       image: new ol.style.Icon({
      //         color: "#8959A8",
      //         crossOrigin: "anonymous",

      //         imgSize: [20, 20],
      //         src: "img/bin.png",
      //       }),
      //     })
      //   );
      source.addFeature(a);
    });
  },
});
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(
    (cor) => {
      cords.lon = cor.coords.longitude;
      cords.lan = cor.coords.latitude;

      view.animate({
        center: ol.proj.fromLonLat([cords.lon, cords.lan]),
        duration: 500,
      });
    },
    (err) => {}
  );
}
//widok
const view = new ol.View({
  center: ol.proj.fromLonLat([cords.lon, cords.lan]),
  zoom: 10,
});

const source = new ol.source.Vector({ wrapX: false });
const vector = new ol.layer.Vector({
  source: source,
});
const currentSource = new ol.source.Vector({ wrapX: false });
const currentVector = new ol.layer.Vector({
  source: currentSource,
});
var map = new ol.Map({
  controls: ol.control.defaults().extend([new Location()]),
  target: "map",
  layers: [
    new ol.layer.Tile({
      source: new ol.source.OSM(),
    }),
    vector,
    currentVector,
  ],
  view: view,
});

var draw = new ol.interaction.Draw({
  source: currentSource,
  type: "Point",
});
var point = false;
draw.on("drawend", function (e) {
  //console.log(this);
  //sendAddKosz(ol.proj.toLonLat(e.feature.getProperties().geometry.flatCoordinates));
});
var currentKosz = new Kosz();
draw.on("drawstart", function (e) {
  if (point) {
    var features = currentSource.getFeatures();
    var lastFeature = features[features.length - 1];
    currentSource.removeFeature(lastFeature);
  }
  point = true;
  currentKosz.pos = ol.proj.toLonLat(e.feature.getProperties().geometry.flatCoordinates);
  longitude.value = currentKosz.pos[0];
  latitude.value = currentKosz.pos[1];
});

$("#add").change(function (e) {
  e.preventDefault();
  if (this.checked) {
    map.addInteraction(draw);
  } else {
    map.removeInteraction(draw);
    currentSource.clear();
    point = false;
  }
});

//Form
var longitude = document.getElementById("longitude");
var latitude = document.getElementById("latitude");
var type = document.getElementById("type");
function invalid(element) {
  element.style = "background-color:red";
  setTimeout(() => {
    element.style = "";
  }, 500);
}
$("#save").click(function (e) {
  e.preventDefault();
  console.log("?");
  console.log(latitude.checkValidity());
  var valid = true;
  if (!longitude.checkValidity()) {
    valid = false;
    invalid(longitude);
    longitude.setCustomValidity("a");
  } else {
    currentKosz.pos[0] = longitude.value;
  }
  if (!latitude.checkValidity()) {
    valid = false;
    invalid(latitude);
    latitude.setCustomValidity("a");
  } else {
    currentKosz.pos[1] = latitude.value;
  }
  if (!type.checkValidity()) {
    valid = false;
    invalid(type);
    type.setCustomValidity("a");
  } else {
    currentKosz.type = type.value;
  }
  if (valid) {
    currentKosz.saveToDataBase();
    var features = currentSource.getFeatures();
    var lastFeature = features[features.length - 1];
    currentSource.removeFeature(lastFeature);
    new ol.Feature({
      geometry: new ol.geom.Point(ol.proj.fromLonLat([currentKosz.pos[0], currentKosz.pos[1]])),
    });
    source.addFeature();
    point = false;
  }
});
