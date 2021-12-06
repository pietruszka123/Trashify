const express = require("express");
var app = express();

//const php = require("./test.js")();
//php.phpFolder = `${__dirname}\\php`;
//app.use(express.json());
var server = app.listen(8080, function () {
  console.log("Dziala");
});
app.use("/", express.static("node/public"));

// app.use("*.php", function (request, response, next) {
//   php.parseFile(request.baseUrl, request.url.replace(`/?`, ""), function (phpResult) {
//     response.write(phpResult);
//     response.end();
//   });
// });
