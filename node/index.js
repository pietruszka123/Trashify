const express = require("express");
const openfoodfacts = require("./openFoodFacts");
const config = require("./config.json");
var head = {
  "Content-Type": "application/json",
  "X-Powered-By": config["x-Powered-By"],
};
var app = express();
app.use(express.json());
var server = app.listen(8080, function () {
  console.log("Dziala");
});
app.use("/", express.static("node/public"));
//server app.use("/api", express.static("node/public"));
//Produkty
app.post("/getProduct.json", (req, res, next) => {
  if (req.body && req.body.productCode) {
    getProduct(req.body.productCode).then((ret) => {
      console.log(ret);
      if (ret.status == true) {
        openfoodfacts.getProduct(req.body.productCode).then((ret) => {
          res.writeHead(200, head);
          var r = { status: ret.status, data: { ProductCode: ret.code, productInfo: ret.product.abbreviated_product_name } };
          console.log(r);
          res.end(JSON.stringify(r));
          next();
        });
      } else {
        console.log(ret.status);
        res.writeHead(200, head);
        res.end(JSON.stringify(ret));
        next();
      }
    });
  } else {
    res.writeHead(404, head);
    res.end(JSON.stringify({ error: "no product code in Request" }));
    next();
  }
});
app.get("/MapScript", (req, ress, next) => {
  //https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&v=weekly
  var options = {
    host: "maps.googleapis.com",
    path: `/maps/api/js?key=${"AIzaSyA_qeyK1I3H1OzVty6WmMbtUQMI0JwWxdw"}&callback=initMap&v=weekly`,
  };
  var http = require("http");
  var req = http.get(options, function (res) {
    console.log(res.statusCode);
    if (res.statusCode != 200) {
      JSON.stringify({ status: false, status_verbose: "server Error" });
    }
    var bodyChunks = [];
    res
      .on("data", function (chunk) {
        bodyChunks.push(chunk);
      })
      .on("end", function () {
        var body = Buffer.concat(bodyChunks);
        ress.writeHead(200, head);
        ress.end(body);
        next();
      });
  });

  req.on("error", function (e) {
    console.log("ERROR: " + e.message);
    ress.writeHead(503, head);
    ress.end(E);
    next();
  });
});
function Insert() {
  return new Promise((resolve, reject) => {
    var http = require("http");
    var options = {
      host: "localhost",
      path: `/apiv2.1.3.7/inserter.php?code=${code}`,
    };
    var req = http.get(options, function (res) {
      if (res.statusCode != 200) resolve(JSON.stringify({ status: false, status_verbose: "server Error", code: productCode }));
      var bodyChunks = [];
      res
        .on("data", function (chunk) {
          bodyChunks.push(chunk);
        })
        .on("end", function () {
          var body = Buffer.concat(bodyChunks);
          resolve(body);
        });
    });

    req.on("error", function (e) {
      console.log("ERROR: " + e.message);
      reject(e);
    });
  });
}
function getProduct(code) {
  var d = JSON.stringify({ productCode: code });
  return new Promise((resolve, reject) => {
    var http = require("http");
    var options = {
      host: "localhost",
      path: `/apiv2.1.3.7/getter.php`,
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Content-Length": d.length,
      },
    };
    var req = http.request(options, function (res) {
      if (res.statusCode != 200) resolve(JSON.stringify({ status: false, status_verbose: "server Error", code: productCode }));
      var bodyChunks = [];
      res
        .on("data", function (chunk) {
          bodyChunks.push(chunk);
        })
        .on("end", function () {
          var body = Buffer.concat(bodyChunks);

          resolve(JSON.parse(body));
        });
    });
    req.write(d);
    req.end();
    req.on("error", function (e) {
      console.log("ERROR: " + e.message);
      reject(e);
    });
  });
}
