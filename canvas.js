function logme(data) {
  if (typeof console != 'undefined') {
    /* Commenter la ligne suivante pour faire taire tous les logme ;o) */
    console.log(data);
  }
}

var size = 200;
function rand() {
  return Math.round(Math.random() * size);
}
function randColor() {
  return Math.round(Math.random() * 255);
}
function draw() {
  var canvas = document.getElementById("canvas1");
  var ctx = canvas.getContext("2d");

  var randomColor = "rgb(" + randColor() + ", " + randColor() + ", " + randColor() + ")";
  ctx.fillStyle = randomColor;

  ctx.beginPath();
  ctx.moveTo(rand(), rand());
  ctx.lineTo(rand(), rand());
  ctx.bezierCurveTo(rand(), rand(), rand(), rand(), rand(), rand());
  ctx.lineTo(rand(), rand());
  ctx.fill();
}
window.onload = function() {
  var canvasElements = document.getElementsByTagName("canvas");
  logme(canvasElements);
  for ( var index = 0; index < canvasElements.length; index++) {
    var element = canvasElements.item(index);
    element.height = size;
    element.width = size;
  }
  drawAll();
}
function drawAll() {
  draw();
  setTimeout("drawAll()", 500);
}
