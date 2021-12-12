var Canvas = document.getElementById("Canvas");
var ctx = Canvas.getContext("2d");
var size = {
  x: 32,
  y: 32,
};
var speed = 1000;
var Play = false;
//ctx.canvas.width  = window.innerWidth;
//ctx.canvas.height = window.innerHeight;
var Grid = [];
var GridCopy = [];
var gridHeight = Canvas.height / size.y;
var gridWidth = Canvas.width / size.x;
console.log(`${gridWidth * size.x} ${gridHeight * size.y} ${ctx.canvas.width} ${ctx.canvas.height}`);
for (let i = 0; i < gridHeight * gridWidth; i++) {
  Grid.push(0);
}
function getNeighbours(X, Y) {
  var neighbours = 0;
  for (var y = -1; y <= 1; y++) {
    for (var x = -1; x <= 1; x++) {
      if (x == 0 && y == 0) continue;

      var checkX = X + x;
      var checkY = Y + y;
      if (checkX >= 0 && checkX < gridWidth && checkY >= 0 && checkY < gridHeight && Grid[checkY * gridWidth + checkX] != 0) {
        //Grid[checkY * gridWidth + checkX] = 2
        neighbours++;
      }
    }
  }
  return neighbours;
}
function Update(index, X, Y) {
  var neighbours = getNeighbours(X, Y);
  if ((Grid[index] == 0) & (neighbours == 3)) {
    GridCopy[index] = 1;
  } else if (Grid[index] != 0 && neighbours != 2 && neighbours != 3) {
    GridCopy[index] = 0;
  } /*else if(Grid[index] > 1){
        Grid[index] -= 1 
    }*/ else {
    GridCopy[index] = Grid[index];
  }
  //console.log(`${X} ${Y} ${neighbours}`)
}
console.log(Grid);
console.log(`${gridWidth} ${gridHeight}`);
GridCopy = Grid.slice();
function DrawGrid(update = true) {
  ctx.fillStyle = "#ffffff";
  ctx.fillRect(0, 0, ctx.canvas.width, ctx.canvas.height);
  if (update) {
    Grid = GridCopy.slice();
    GridCopy.fill(0, 0, Grid.length);
  }
  for (let i = 0; i < gridHeight; i++) {
    for (let j = 0; j < gridWidth; j++) {
      if (update) Update(i * gridWidth + j, j, i);
      switch (Grid[i * gridWidth + j]) {
        case 0:
          ctx.fillStyle = "#000000";
          ctx.strokeRect(j * size.x, i * size.y, size.x, size.y);
          break;
        case 1:
          ctx.fillStyle = "#000000";
          ctx.fillRect(j * size.x, i * size.y, size.x, size.y);
          break;
        case 2:
          ctx.fillStyle = "#ff0000";
          ctx.fillRect(j * size.x, i * size.y, size.x, size.y);
          break;
        case 3:
          ctx.fillStyle = "#00ff00";
          ctx.fillRect(j * size.x, i * size.y, size.x, size.y);
          break;
      }
      /*if(ctx.fillStyle != "#000000"){
                ctx.fillStyle ="#000000"
                ctx.strokeRect(j *size.x,i * size.y,size.x,size.y)
            }*/
    }
  }
  setTimeout(() => {
    if (Play && update) DrawGrid();
  }, speed);
}
function Clamp(value, min, max) {
  return value > max ? max : value < min ? min : value;
}
var mouseDown = false;
Canvas.addEventListener("mousedown", (e) => {
  //console.log(e)
  mouseDown = true;
  var x = Clamp(e.offsetX, 0, ctx.canvas.width);
  var y = Clamp(e.offsetY, 0, ctx.canvas.height);
  var gy = Math.floor(y / size.y);
  var gx = Math.floor(x / size.x);
  if (!EditedCells.includes(gy * gridWidth + gx)) {
    var a = Grid[gy * gridWidth + gx] != 0 ? 0 : 1;
    Grid[gy * gridWidth + gx] = a;
    GridCopy[gy * gridWidth + gx] = a;
    EditedCells.push(gy * gridWidth + gx);
  }
  DrawGrid(false);
});
var EditedCells = [];
Canvas.addEventListener("mousemove", (e) => {
  if (mouseDown) {
    var x = Clamp(e.offsetX, 0, ctx.canvas.width);
    var y = Clamp(e.offsetY, 0, ctx.canvas.height);
    var gy = Math.floor(y / size.y);
    var gx = Math.floor(x / size.x);
    if (!EditedCells.includes(gy * gridWidth + gx)) {
      var a = Grid[gy * gridWidth + gx] != 0 ? 0 : 1;
      Grid[gy * gridWidth + gx] = a;
      GridCopy[gy * gridWidth + gx] = a;
      EditedCells.push(gy * gridWidth + gx);
    }
    DrawGrid(false);
  }
});
Canvas.addEventListener("mouseup", (e) => {
  EditedCells = [];
  mouseDown = false;
});
var Buttopn = document.getElementById("play");
Buttopn.addEventListener("click", (e) => {
  Play = !Play;
  e.target.value = Play ? "pause" : "play";
  if (Play) {
    DrawGrid();
  }
});
document.getElementById("speed").addEventListener("change", function () {
  speed = this.value;
});
DrawGrid(false);
