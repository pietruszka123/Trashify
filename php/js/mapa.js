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
      source.addFeature(
        new ol.Feature({
          geometry: new ol.geom.Point(ol.proj.fromLonLat([element.location.longitude, element.location.latitude])),
        })
      );
    });
    console.log();
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
// a.setStyle(
//   new ol.style.Style({
//     image: new ol.style.Icon({
//       color: "#8959A8",
//       crossOrigin: "anonymous",

//       imgSize: [20, 20],
//       src: "img/html.png",
//     }),
//   })
// );

const source = new ol.source.Vector({ wrapX: false });
const vector = new ol.layer.Vector({
  source: source,
});

var map = new ol.Map({
  target: "map",
  layers: [
    new ol.layer.Tile({
      source: new ol.source.OSM(),
    }),
    vector,
  ],
  view: view,
});

var draw = new ol.interaction.Draw({
  source: source,
  type: "Point",
});
draw.on("drawend", function (e) {
  //console.log(this);
  sendAddKosz(ol.proj.toLonLat(e.feature.getProperties().geometry.flatCoordinates));
});
map.addInteraction(draw);
function sendAddKosz(location) {
  $.ajax({
    type: "post",
    url: "/apiv2.1.3.7/addKosz.php",
    data: JSON.stringify({ trashCanLocation: { longitude: location[0], latitude: location[1] }, trashCanType: "?", trashCanAcceptance: 1 }),
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function (response) {},
  });
}
