initCanvas()
// resizeCanvas()
addDefaultObjects()
CustomerMode()

$("#save").click(function () {
  //Todo
})

$('.clear').click(function () {
  canvas.clear();
  initCanvas();
  //WARNING Reservations ENA XATHUN
})



// // set scaleratio where fits card pixels?
// function scl(scaleRatio){
// canvas.setDimensions({ width: canvas.getWidth() * scaleRatio, height: canvas.getHeight() * scaleRatio });
// canvas.setZoom(scaleRatio)
// return 1
// }

// function scl2(val){
//   canvas.setZoom(val);
//   console.log(canvas.getZoom())
//   canvas.setWidth(canvas.getWidth() * canvas.getZoom());
//   canvas.setHeight(canvas.getHeight() * canvas.getZoom());

//   const canvasContainerEl = document.querySelectorAll('.canvas-container')[0]
//   canvasContainerEl.style.width = canvas.getWidth() * canvas.getZoom()
//   canvasContainerEl.style.height = canvas.getHeight() * canvas.getZoom()
// }
