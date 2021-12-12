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
  req.socket.on("error", function () {});
  res.socket.on("error", function () {});
  if (req.body && req.body.productCode) {
    getProduct(req.body.productCode).then((ret) => {
      //console.log(`baa ${ret}`);
      if (ret.status == false) {
        openfoodfacts.getProduct(req.body.productCode).then((ret) => {
          ret = JSON.parse(ret);
          if (ret.status != 0) {
            res.writeHead(200, head);
            var r = {
              status: ret.status,
              data: { productCode: ret.code, productInfo: { name: ret.product.abbreviated_product_name, image_url: ret.product.image_url, rec: "", packagingType: "", binType: "" } },
            };
            Insert(r.data);

            res.end(JSON.stringify(r));
          } else {
            res.writeHead(200, head);
            ret.status = false;
            res.end(
              JSON.stringify({
                status: ret.status,
                data: { productCode: ret.code, productInfo: {} },
              })
            );
          }
          next();
        });
      } else {
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

function Insert(r) {
  var d = JSON.stringify(r);
  return new Promise((resolve, reject) => {
    var http = require("http");
    var options = {
      host: "localhost",
      path: `/apiv2.1.3.7/inserter.php`,
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
