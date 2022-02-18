<!DOCTYPE html>
<html lang="en">

<style>

/* Popup container */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

/* The actual popup (appears on top) */
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class when clicking on the popup container (hide and show the popup) */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User 2 Edit Reservation</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/choices.js/choices.min.css" />

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit reservation</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text"
                                                for="inputGroupSelect01">Date</label>
                                            <select class="form-select" id="inputGroupSelect01">
                                                <option selected>Choose...</option>
                                                <option selected value="1">30/11/21</option>
                                                <option value="2">01/12/21</option>
                                                <option value="3">02/12/21</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text"
                                                for="inputGroupSelect01">Time</label>
                                            <select class="form-select" id="inputGroupSelect01">
                                                <option selected>Choose...</option>
                                                <option value="1">20:00</option>
                                                <option selected value="2">21:30</option>
                                                <option value="3">22:00 </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="basicInput">Name</label>
                                        <input type="text" class="form-control" id="basicInput" value="Giorkos">
                                    </div>
                                    <div class="card">

                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <h6>People</h6>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="basicSelect">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option selected>6</option>
                                                                <option>7</option>
                                                                <option>8</option>
                                                                <option>9</option>
                                                                <option>10</option>
                                                                <option>11</option>
                                                                <option>12</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">

                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    rows="3" >Near the bar</textarea>
                                    </div>
                                    <div class="card">

                                        <h5>Front of House</h5>
                                    <div class="form-group">
                                        <label for="basicInput">Area/Table</label>
                                        <input type="text" class="form-control" id="basicInput" value="15">
                                    </div>


                                    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Edit Reservation</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="stylesheet" href="../assets/css/tables.css">

</head>


<body>
<div class="container-fluid text-center">
    <div class="form-group admin-menu">
      <div class="row">
        <div class="col-sm-3 col-sm-offset-3 form-group">
          <label>Width (px)</label>
          <input type="number" id="width" class="form-control" value="302" />
        </div>
        <div class="col-sm-3 form-group">
          <label>Height (px)</label>
          <input type="number" id="height" class="form-control" value="812" />
        </div>
        <div class="col-sm-2 form-group">
          <label>&nbsp;</label>
          <br />
          <button class="btn btn-primary">Save</button>
        </div>
      </div>
      <div class="btn-group">
        <button class="btn btn-primary rectangle">+ &#9647; Table</button>
        <button class="btn btn-primary circle">+ &#9711; Table</button>
        <button class="btn btn-primary triangle">+ &#9651; Table</button>
        <button class="btn btn-primary chair">+ Chair</button>
        <button class="btn btn-primary bar">+ Bar</button>
        <button class="btn btn-default wall">+ Wall</button>
        <button class="btn btn-danger remove">Remove</button>
        <button class="btn btn-warning customer-mode">Customer mode</button>
      </div>
    </div>

    <div class="form-group customer-menu" style="display: none;">
      <div class="btn-group">
        <button class="btn btn-success submit">Submit reservation</button>
        <button class="btn btn-warning admin-mode">Admin mode</button>
      </div>
      <br />
      <br />
      <div id="slider"></div>
      <div id="slider-value"></div>
    </div>

    <canvas id="canvas" width="302" height="812"></canvas>
  </div>

  <div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
          <p id="modal-table-id"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>




<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>


<script src="../assets/vendors/choices.js/choices.min.js"></script>
<script src="../assets/js/main.js"></script>



</body>

<script src="../assets/js/fabric.min.js"></script>

<script>




let canvas
let number
const grid = 30
const backgroundColor = '#f8f8f8'
const lineStroke = '#ebebeb'
const tableFill = 'rgba(150, 111, 51, 0.7)'
const tableStroke = '#694d23'
const tableShadow = 'rgba(0, 0, 0, 0.4) 3px 3px 7px'
const chairFill = 'rgba(67, 42, 4, 0.7)'
const chairStroke = '#32230b'
const chairShadow = 'rgba(0, 0, 0, 0.4) 3px 3px 7px'
const barFill = 'rgba(0, 93, 127, 0.7)'
const barStroke = '#003e54'
const barShadow = 'rgba(0, 0, 0, 0.4) 3px 3px 7px'
const barText = 'Bar'
const wallFill = 'rgba(136, 136, 136, 0.7)'
const wallStroke = '#686868'
const wallShadow = 'rgba(0, 0, 0, 0.4) 5px 5px 20px'



        var  photoUrlLandscape = 'https://images8.alphacoders.com/292/292379.jpg',
            photoUrlPortrait = 'https://presspack.rte.ie/wp-content/blogs.dir/2/files/2015/04/AMC_TWD_Maggie_Portraits_4817_V1.jpg'



let widthEl = document.getElementById('width')
let heightEl = document.getElementById('height')
let canvasEl = document.getElementById('canvas')



function initCanvas() {
  if (canvas) {
    canvas.clear()
    canvas.dispose()
  }



  canvas = new fabric.Canvas('canvas')
  number = 1
  canvas.backgroundColor = backgroundColor
        canvas.setBackgroundImage('https://p0resspack.rte.ie/wp-content/blogs.dir/2/files/2015/04/AMC_TWD_Maggie_Portraits_4817_V1.jpg', canvas.renderAll.bind(canvas));



  for (let i = 0; i < (canvas.height / grid); i++) {
    const lineX = new fabric.Line([ 0, i * grid, canvas.height, i * grid], {
      stroke: lineStroke,
      selectable: false,
      type: 'line'
    })
    const lineY = new fabric.Line([ i * grid, 0, i * grid, canvas.height], {
      stroke: lineStroke,
      selectable: false,
      type: 'line'
    })
    sendLinesToBack()
    canvas.add(lineX)
    canvas.add(lineY)
  }



  canvas.on('object:moving', function(e) {
    snapToGrid(e.target)
  })



  canvas.on('object:scaling', function(e) {
    if (e.target.scaleX > 5) {
      e.target.scaleX = 5
    }
    if (e.target.scaleY > 5) {
      e.target.scaleY = 5
    }
    if (!e.target.strokeWidthUnscaled && e.target.strokeWidth) {
      e.target.strokeWidthUnscaled = e.target.strokeWidth
    }
    if (e.target.strokeWidthUnscaled) {
      e.target.strokeWidth = e.target.strokeWidthUnscaled / e.target.scaleX
      if (e.target.strokeWidth === e.target.strokeWidthUnscaled) {
          e.target.strokeWidth = e.target.strokeWidthUnscaled / e.target.scaleY
      }
    }
  })

  canvas.on('object:modified', function(e) {
    e.target.scaleX = e.target.scaleX >= 0.25 ? (Math.round(e.target.scaleX * 2) / 2) : 0.5
    e.target.scaleY = e.target.scaleY >= 0.25 ? (Math.round(e.target.scaleY * 2) / 2) : 0.5
    snapToGrid(e.target)
    if (e.target.type === 'table') {
      canvas.bringToFront(e.target)
    }
    else {
      canvas.sendToBack(e.target)
    }
    sendLinesToBack()
  })

  /*canvas.observe('object:moving', function (e)
  {
    checkBoudningBox(e)
  })
  canvas.observe('object:rotating', function (e)
  {
    checkBoudningBox(e)
  })
  canvas.observe('object:scaling', function (e)
  {
    checkBoudningBox(e)
  })*/
}

initCanvas()

function resizeCanvas() {
  widthEl = document.getElementById('width')
  heightEl = document.getElementById('height')
  canvasEl.width = widthEl.value ? widthEl.value : 302
  canvasEl.height = heightEl.value ? heightEl.value : 812
  const canvasContainerEl = document.querySelectorAll('.canvas-container')[0]
  canvasContainerEl.style.width = canvasEl.width
  canvasContainerEl.style.height = canvasEl.height
}
resizeCanvas()

widthEl.addEventListener('change', () => {
  resizeCanvas()
  initCanvas()
  addDefaultObjects()
})
heightEl.addEventListener('change', () => {
  resizeCanvas()
  initCanvas()
  addDefaultObjects()
})

function generateId() {
  return Math.random().toString(36).substr(2, 8)
}

function addRect(left, top, width, height) {
  const id = generateId()
  const o = new fabric.Rect({
    width: width,
    height: height,
    fill: tableFill,
    stroke: tableStroke,
    strokeWidth: 2,
    shadow: tableShadow,
    originX: 'center',
    originY: 'center',
    centeredRotation: true,
    snapAngle: 45,
    selectable: true
  })
  const t = new fabric.IText(number.toString(), {
    fontFamily: 'Calibri',
    fontSize: 14,
    fill: '#fff',
    textAlign: 'center',
    originX: 'center',
    originY: 'center'
  })
  const g = new fabric.Group([o, t], {
    left: left,
    top: top,
    centeredRotation: true,
    snapAngle: 45,
    selectable: true,
    type: 'table',
    id: id,
    number: number
  })
  canvas.add(g)
  number++
  return g
}

function addCircle(left, top, radius) {
  const id = generateId()
  const o = new fabric.Circle({
    radius: radius,
    fill: tableFill,
    stroke: tableStroke,
    strokeWidth: 2,
    shadow: tableShadow,
    originX: 'center',
    originY: 'center',
    centeredRotation: true
  })
  const t = new fabric.IText(number.toString(), {
    fontFamily: 'Calibri',
    fontSize: 14,
    fill: '#fff',
    textAlign: 'center',
    originX: 'center',
    originY: 'center'
  })
  const g = new fabric.Group([o, t], {
    left: left,
    top: top,
    centeredRotation: true,
    snapAngle: 45,
    selectable: true,
    type: 'table',
    id: id,
    number: number
  })
  canvas.add(g)
  number++
  return g
}

function addTriangle(left, top, radius) {
  const id = generateId()
  const o = new fabric.Triangle({
    radius: radius,
    fill: tableFill,
    stroke: tableStroke,
    strokeWidth: 2,
    shadow: tableShadow,
    originX: 'center',
    originY: 'center',
    centeredRotation: true
  })
  const t = new fabric.IText(number.toString(), {
    fontFamily: 'Calibri',
    fontSize: 14,
    fill: '#fff',
    textAlign: 'center',
    originX: 'center',
    originY: 'center'
  })
  const g = new fabric.Group([o, t], {
    left: left,
    top: top,
    centeredRotation: true,
    snapAngle: 45,
    selectable: true,
    type: 'table',
    id: id,
    number: number
  })
  canvas.add(g)
  number++
  return g
}

function addChair(left, top, width, height) {
  const o = new fabric.Rect({
    left: left,
    top: top,
    width: 30,
    height: 30,
    fill: chairFill,
    stroke: chairStroke,
    strokeWidth: 2,
    shadow: chairShadow,
    originX: 'left',
    originY: 'top',
    centeredRotation: true,
    snapAngle: 45,
    selectable: true,
    type: 'chair',
    id: generateId()
  })
  canvas.add(o)
  return o
}

function addBar(left, top, width, height) {
  const o = new fabric.Rect({
    width: width,
    height: height,
    fill: barFill,
    stroke: barStroke,
    strokeWidth: 2,
    shadow: barShadow,
    originX: 'center',
    originY: 'center',
    type: 'bar',
    id: generateId()
  })
  const t = new fabric.IText(barText, {
    fontFamily: 'Calibri',
    fontSize: 14,
    fill: '#fff',
    textAlign: 'center',
    originX: 'center',
    originY: 'center'
  })
  const g = new fabric.Group([o, t], {
    left: left,
    top: top,
    centeredRotation: true,
    snapAngle: 45,
    selectable: true,
    type: 'bar'
  })
  canvas.add(g)
  return g
}

function addWall(left, top, width, height) {
  const o = new fabric.Rect({
    left: left,
    top: top,
    width: width,
    height: height,
    fill: wallFill,
    stroke: wallStroke,
    strokeWidth: 2,
    shadow: wallShadow,
    originX: 'left',
    originY: 'top',
    centeredRotation: true,
    snapAngle: 45,
    selectable: true,
    type: 'wall',
    id: generateId()
  })
  canvas.add(o)
  return o
}

function snapToGrid(target) {
  target.set({
    left: Math.round(target.left / (grid / 2)) * grid / 2,
    top: Math.round(target.top / (grid / 2)) * grid / 2
  })
}

function checkBoudningBox(e) {
  const obj = e.target

  if (!obj) {
    return
  }
  obj.setCoords()

  const objBoundingBox = obj.getBoundingRect()
  if (objBoundingBox.top < 0) {
    obj.set('top', 0)
    obj.setCoords()
  }
  if (objBoundingBox.left > canvas.width - objBoundingBox.width) {
    obj.set('left', canvas.width - objBoundingBox.width)
    obj.setCoords()
  }
  if (objBoundingBox.top > canvas.height - objBoundingBox.height) {
    obj.set('top', canvas.height - objBoundingBox.height)
    obj.setCoords()
  }
  if (objBoundingBox.left < 0) {
    obj.set('left', 0)
    obj.setCoords()
  }
}

function sendLinesToBack() {
  canvas.getObjects().map(o => {
    if (o.type === 'line') {
      canvas.sendToBack(o)
    }
  })
}

document.querySelectorAll('.rectangle')[0].addEventListener('click', function() {
  const o = addRect(0, 0, 60, 60)
  canvas.setActiveObject(o)
})

document.querySelectorAll('.circle')[0].addEventListener('click', function() {
  const o = addCircle(0, 0, 30)
  canvas.setActiveObject(o)
})

document.querySelectorAll('.triangle')[0].addEventListener('click', function() {
  const o = addTriangle(0, 0, 30)
  canvas.setActiveObject(o)
})

document.querySelectorAll('.chair')[0].addEventListener('click', function() {
  const o = addChair(0, 0)
  canvas.setActiveObject(o)
})

document.querySelectorAll('.bar')[0].addEventListener('click', function() {
  const o = addBar(0, 0, 180, 60)
  canvas.setActiveObject(o)
})

document.querySelectorAll('.wall')[0].addEventListener('click', function() {
  const o = addWall(0, 0, 60, 180)
  canvas.setActiveObject(o)
})

document.querySelectorAll('.remove')[0].addEventListener('click', function() {
  const o = canvas.getActiveObject()
  if (o) {
    o.remove()
    canvas.remove(o)
    canvas.discardActiveObject()
    canvas.renderAll()
  }
})

document.querySelectorAll('.customer-mode')[0].addEventListener('click', function() {
  canvas.getObjects().map(o => {
    o.hasControls = false
    o.lockMovementX = true
    o.lockMovementY = true
    if (o.type === 'chair' || o.type === 'bar' || o.type === 'wall') {
      o.selectable = false
    }
    o.borderColor = '#38A62E'
    o.borderScaleFactor = 2.5
  })
  canvas.selection = false
  canvas.hoverCursor = 'pointer'
  canvas.discardActiveObject()
  canvas.renderAll()
  document.querySelectorAll('.admin-menu')[0].style.display = 'none'
  document.querySelectorAll('.customer-menu')[0].style.display = 'block'
})

document.querySelectorAll('.admin-mode')[0].addEventListener('click', function() {
  canvas.getObjects().map(o => {
    o.hasControls = true
    o.lockMovementX = false
    o.lockMovementY = false
    if (o.type === 'chair' || o.type === 'bar' || o.type === 'wall') {
      o.selectable = true
    }
    o.borderColor = 'rgba(102, 153, 255, 0.75)'
    o.borderScaleFactor = 1
  })
  canvas.selection = true
  canvas.hoverCursor = 'move'
  canvas.discardActiveObject()
  canvas.renderAll()
  document.querySelectorAll('.admin-menu')[0].style.display = 'block'
  document.querySelectorAll('.customer-menu')[0].style.display = 'none'
})

function formatTime(val) {
  const hours =  Math.floor(val / 60)
  const minutes = val % 60
  const englishHours = hours > 12 ? hours - 12 : hours

  const normal = hours + ':' + minutes + (minutes === 0 ? '0' : '')
  const english = englishHours + ':' + minutes + (minutes === 0 ? '0' : '') + ' ' + (hours > 12 ? 'PM' : 'AM')

  return normal + ' (' + english + ')'
}

document.querySelectorAll('.submit')[0].addEventListener('click', function() {
  const obj = canvas.getActiveObject()
  $('#modal').modal('show')
  let modalText = 'You have not selected anything'

  document.querySelectorAll('#modal-table-id')[0].innerHTML = modalText
})

// <div id="slider"></div>
var slider = document.getElementById('slider');




function addDefaultObjects() {
  addChair(15, 105)
  addChair(15, 135)
  addChair(75, 105)
  addChair(75, 135)
  addChair(225, 75)
  addChair(255, 75)
  addChair(225, 135)
  addChair(255, 135)
  addChair(225, 195)
  addChair(255, 195)
  addChair(225, 255)
  addChair(255, 255)
  addChair(15, 195)
  addChair(45, 195)
  addChair(15, 255)
  addChair(45, 255)
  addChair(15, 315)
  addChair(45, 315)
  addChair(15, 375)
  addChair(45, 375)
  addChair(225, 315)
  addChair(255, 315)
  addChair(225, 375)
  addChair(255, 375)
  addChair(15, 435)
  addChair(15, 495)
  addChair(15, 555)
  addChair(15, 615)
  addChair(225, 615)
  addChair(255, 615)
  addChair(195, 495)
  addChair(195, 525)
  addChair(255, 495)
  addChair(255, 525)
  addChair(225, 675)
  addChair(255, 675)

  addRect(30, 90, 60, 90)
  addRect(210, 90, 90, 60)
  addRect(210, 210, 90, 60)
  addRect(0, 210, 90, 60)
  addRect(0, 330, 90, 60)
  addRect(210, 330, 90, 60)
  addRect(0, 450, 60, 60)
  addRect(0, 570, 60, 60)
  addRect(210, 480, 60, 90)
  addRect(210, 630, 90, 60)

  addBar(120, 0, 180, 60)

  addWall(120, 510, 60, 60)
}
addDefaultObjects()

</script>

                                    </div>
                                </div>

                            </div>
                            <div class="popup">
                              <div class="popup" onclick="myFunction()">
                                <form >
                                  <input type="button" value="Edit reservation" />
                                </form>
                                <span class="popuptext" id="myPopup">Succesfully edited! Resv ID = #818181</span>
                              </div>


                            </div>
                            <form action="user2-manage_reservations.html">
                              <input type="submit" value="Go Back" />
                           </form>


                        </div>

                    </div>
                </section>



            </div>


            <footer>

            </footer>
        </div>
    </div>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/main.js"></script>

    <script src="../assets/vendors/choices.js/choices.min.js"></script>

    <script src="../assets/js/main.js"></script>

    <script>
      // When the user clicks on <div>, open the popup
      function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
      }
      </script>


</body>

</html>
