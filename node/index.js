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
      if (ret.status == 0) {
        openfoodfacts.getProduct(req.body.productCode).then((ret) => {
          res.writeHead(200, head);
          res.end(ret);
          next();
        });
      } else {
        res.writeHead(200, head);
        res.end(ret);
        next();
      }
    });
  } else {
    res.writeHead(404, head);
    res.end(JSON.stringify({ error: "no product code in Request" }));
    next();
  }
});
function send(to, ...data) {
  return new Promise((resolve, reject) => {
    var http = require("http");
    var options = {
      host: "localhost",
      path: `/apiv2.1.3.7/${to}?${data}`,
    };
    var req = http.get(options, function (res) {
      if (res.statusCode != 200) resolve(JSON.stringify({ status: 0, status_verbose: "server Error", code: productCode }));
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
  return new Promise((resolve, reject) => {
    var http = require("http");
    var options = {
      host: "localhost",
      path: `/apiv2.1.3.7/inserter.php?code=${code}`,
    };
    var req = http.get(options, function (res) {
      if (res.statusCode != 200) resolve(JSON.stringify({ status: 0, status_verbose: "server Error", code: productCode }));
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
