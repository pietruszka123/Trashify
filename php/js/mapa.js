function addBin(pos, type) {
  var a = new ol.Feature({
    geometry: new ol.geom.Point(ol.proj.fromLonLat([pos[0], pos[1]])),
  });
  a.Bin = true;
  setStyleE(a, type);
  source.addFeature(a);
}
function parseURLParams(url) {
  var queryStart = url.indexOf("?") + 1,
    queryEnd = url.indexOf("#") + 1 || url.length + 1,
    query = url.slice(queryStart, queryEnd - 1),
    pairs = query.replace(/\+/g, " ").split("&"),
    parms = {},
    i,
    n,
    v,
    nv;

  if (query === url || query === "") return;

  for (i = 0; i < pairs.length; i++) {
    nv = pairs[i].split("=", 2);
    n = decodeURIComponent(nv[0]);
    v = decodeURIComponent(nv[1]);

    if (!parms.hasOwnProperty(n)) parms[n] = [];
    parms[n].push(nv.length === 2 ? v : null);
  }
  return parms;
}
function GetBins(type, location) {
  $.ajax({
    type: "post",
    url: "/apiv2.1.3.7/Koszee.php",
    data: JSON.stringify({ type: type, location: location }),
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function (response) {
      console.log(response);
      var min = 0;
      var e = response.data[0];
      response.data.forEach((element) => {
        var a = new ol.Feature({
          geometry: new ol.geom.Point(ol.proj.fromLonLat([element.location.longitude, element.location.latitude])),
        });
        if (type && location) {
          var dis = Math.sqrt(Math.pow(element.location.longitude - location[0], 2) + Math.pow(element.location.latitude - location[1], 2));
          if (min > dis) {
            min = dis;
            e = element;
          }
        }
        addBin([element.location.longitude, element.location.latitude], element.type);
      });
      if (type && location) {
        view.animate({
          center: ol.proj.fromLonLat([e.location.longitude, e.location.latitude]),
          duration: 500,
          zoom: 17,
        });
      }
    },
  });
}

function setStyleE(a, t) {
  switch (t) {
    case "mieszane":
      setStyle(a, "#000000");
      break;
    case "plastik":
      setStyle(a, "#fde047");
      break;
    case "papier":
      setStyle(a, "#1e40af");
      break;
    case "szklo":
      setStyle(a, "#16a34a");
      break;
    case "bio":
      setStyle(a, "#713f12");
    case "baterie":
      a.setStyle(
        new ol.style.Style({
          image: new ol.style.Icon({
            color: "#ffffff",
            crossOrigin: "anonymous",
            imgSize: [20, 20],
            src: "img/baterie.svg",
          }),
        })
      );
      break;
    case "leki":
      console.log("leki");
      a.setStyle(
        new ol.style.Style({
          image: new ol.style.Icon({
            color: "#ffffff",
            crossOrigin: "anonymous",
            imgSize: [20, 20],
            src: "img/leki.svg",
          }),
        })
      );
      break;
    default:
      //console.log(t);
      setStyle(a, "#ff0000");
      break;
  }
}
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
  }
  goTo() {
    view.animate({
      center: this.geo.getPosition(),
      duration: 500,
      zoom: 17,
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
    //this.state = false;
    button.addEventListener("click", this.handleRotateNorth.bind(this), false);
    this.geo.start();
  }

  handleRotateNorth() {
    this.geo.goTo();
    //this.state = !this.state;
    //this.getMap().getView().setRotation(0);
  }
}
function setStyle(element, color) {
  element.setStyle(
    new ol.style.Style({
      image: new ol.style.Circle({
        radius: 6,
        fill: new ol.style.Fill({
          color: color,
        }),
        stroke: new ol.style.Stroke({
          color: "#fff",
          width: 2,
        }),
      }),
    })
  );
}
var cords = { lon: 21.168062, lan: 49.677148 };
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
map.once("postrender", function (event) {
  $("#Loading").remove();
  map.getViewport().addEventListener("click", function (e) {
    map.forEachFeatureAtPixel(map.getEventPixel(e), function (feature, layer) {
      if (layer == vector) {
        console.log(feature.Bin);
        console.log("tak");
      }
    });
  });
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
  console.log(point);
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
    $("#showAllBins").remove();
    console.log(this.checked);
    GetBins();
    map.addInteraction(draw);
  } else {
    map.removeInteraction(draw);
    currentSource.clear();
    point = false;
  }
  $("#AddBinCont").toggle(this.checked);
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
    addBin(currentKosz.pos, currentKosz.type);
    point = false;
  }
});
var args = parseURLParams(window.location.href);
if (args && args.data) {
  $("#showAllBins").click(function (e) {
    console.log(this);
    source.clear();
    GetBins();
    $(this).remove();
  });
  console.log(JSON.parse(atob(args.data)));

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (cor) => {
        //cords.lon = cor.coords.longitude;
        //cords.lan = cor.coords.latitude;
        GetBins(JSON.parse(atob(args.data)).type, [cor.coords.longitude, cor.coords.latitude]);
        // view.animate({
        //   center: ol.proj.fromLonLat([cords.lon, cords.lan]),
        //  duration: 500,
        //   zoom: 17,
        //});
      },
      (err) => {}
    );
  }
} else {
  GetBins();
}
