var canvas = document.querySelectorAll('canvas');
canvas.forEach(function (item) {
    var ctx = item.getContext("2d");
    item.width = 50;
    item.height = 40;
ctx.beginPath();
ctx.strokeStyle = "#00CC66";
ctx.fillStyle = "#00CC66";
ctx.moveTo(0,0);
ctx.lineTo(20,20);
ctx.lineTo(0,40);
ctx.fill();
});

// ctx.stroke();