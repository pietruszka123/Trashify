/**
 *
 */
class ExecPHP {
  /**
   *
   */
  constructor() {
    this.phpPath = "php.exe";
    this.phpFolder = "";
  }
  /**
   *
   */
  parseFile(fileName, get, callback) {
    var realFileName = this.phpFolder + fileName;
    console.log(get);
    get = get.split("?");
    var g = "";
    for (let i = 0; i < get.length; i++) {
      const element = get[i];
      g += element + " ";
    }
    console.log("parsing file: " + realFileName);

    var exec = require("child_process").exec;
    var cmd = this.phpPath + " -f " + realFileName + " " + g;
    console.log(cmd);
    exec(cmd, function (error, stdout, stderr) {
      callback(stdout);
    });
  }
}
module.exports = function () {
  return new ExecPHP();
};
