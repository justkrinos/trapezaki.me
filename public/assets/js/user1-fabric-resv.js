// Defaults
let canvas
const grid = 30
const backgroundColor = '#e8ebeb'   //'#ffe4c4' Tuto en to palio
const lineStroke = '#ebebeb'
const tableFill = 'rgba(25, 29, 48, 0.7)' //'rgba(150, 111, 51, 0.7)' Tuto en to palio
const tableStroke = '#151a30' //'#694d23'
const tableShadow = 'rgba(0, 0, 0, 0.4) 3px 3px 7px'
const chairFill = 'rgba(37, 47, 92, 0.7)'  //'rgba(67, 42, 4, 0.7)'
const chairStroke = '#151a30' //'#32230b'
const chairShadow = 'rgba(0, 0, 0, 0.4) 3px 3px 7px'
const barFill = 'rgba(0, 93, 127, 0.7)'
const barStroke = '#003e54'
const barShadow = 'rgba(0, 0, 0, 0.4) 3px 3px 7px'
const barText = 'Bar'
//Entrance and exit added
const entranceFill = 'rgba(0,255,0,0.3)'
const entranceStroke = '#003e54'
const entranceShadow = 'rgba(0, 0, 0, 0.4) 3px 3px 7px'
const entranceText = 'Main Entrance'
const exitFill = 'rgba(255,0,0,0.3)'
const exitStroke = '#003e54'
const exitShadow = 'rgba(0, 0, 0, 0.4) 3px 3px 7px'
const exitText = 'Exit'

//rgba(0,255,0,0.3)

const wallFill = 'rgba(255, 255, 255)' //'rgba(136, 136, 136, 0.7)'
const wallStroke = '#686868'
const wallShadow = 'rgba(0, 0, 0, 0.4) 5px 5px 20px'


let widthEl = document.getElementById('width')
let heightEl = document.getElementById('height')
let canvasEl = document.getElementById('canvas')

var adminMode = true;

// Canvas initialization and methods
function initCanvas() {

  //Clear canvas if exists
  if (canvas) {
    canvas.clear()
    canvas.dispose()
  }

  //Canvas settings
  canvas = new fabric.Canvas('canvas')
  number = 1
  canvas.backgroundColor = backgroundColor
  canvas.uniScaleTransform = true
  canvas.uniformScaling = false
  // canvas.allow
  // canvas.allowTouchScrolling = false;
  canvas.selection = false;

  createLines()

  //Zooming stuff
  canvas.on({

    'mouse:wheel': function (opt) {
      var delta = opt.e.deltaY;
      var zoom = canvas.getZoom();
      zoom *= 0.999 ** delta;

      //Zoom constraints
      if (zoom > 3) zoom = 3;
      if (zoom < 0.3) zoom = 0.3;

      canvas.zoomToPoint({ x: opt.e.offsetX, y: opt.e.offsetY }, zoom);
      opt.e.preventDefault();
      opt.e.stopPropagation();
    },

  });


  //TODO PLS USE THIS https://codepen.io/sabatino/pen/EwJYeO or not?


  var pausePanning = false;
  var lastX, lastY;

  //Otan kleisei to modal na gini unselected to trapezi
  //gia na borei na to ksanaepileksei
  $('#closeResvModal').click(function () {
    canvas.discardActiveObject()
  })

  canvas.on({
    'selection:created': function (o) {
      pausePanning = true;
      if (!adminMode) {
        $('#resvModal').modal('show');
        findTimeSlots();
        pausePanning = false;
      }

    },
    'selection:cleared': function () {
      pausePanning = false;
    },
    'selection:updated': function (o) {
      pausePanning = true;
      if (!adminMode) {
        $('#resvModal').modal('show');
        findTimeSlots();
      }
    },
    'touch:gesture': function (e) {
      if (e.e.touches && e.e.touches.length == 2) {
        pausePanning = true;
        var point = new fabric.Point(e.self.x, e.self.y);
        if (e.self.state == "start") {
          zoomStartScale = canvas.getZoom();
        }
        var delta = zoomStartScale * e.self.scale;
        canvas.zoomToPoint(point, delta);
        pausePanning = false;
      }
    },
    'touch:drag': function (e) {
      this.isDragging = true;
      this.selection = false;

      if (pausePanning == false && undefined != e.self.x && undefined != e.self.x) {
        currentX = e.self.x;
        currentY = e.self.y;
        xChange = currentX - lastX;
        yChange = currentY - lastY;

        if ((Math.abs(currentX - lastX) <= 50) && (Math.abs(currentY - lastY) <= 50)) {
          var delta = new fabric.Point(xChange, yChange);
          canvas.relativePan(delta);
        }

        lastX = e.self.x;
        lastY = e.self.y;
      }
    },
    'object:scaling': function (e) {
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
      e.target.scaleY = e.target.scaleX
    },
    'object:moving': function (e) {
      snapToGrid(e.target)
    }
  })

  function resizeCanvas() {
    const outerCanvasContainer = $('.fabric-canvas-wrapper')[0];

    const ratio = canvas.getWidth() / canvas.getHeight();
    const containerWidth = outerCanvasContainer.clientWidth;
    const containerHeight = outerCanvasContainer.clientHeight;

    const scale = containerWidth / canvas.getWidth();
    const zoom = canvas.getZoom() * scale;
    canvas.setDimensions({ width: containerWidth, height: containerWidth / ratio });
    canvas.setViewportTransform([zoom, 0, 0, zoom, 0, 0]);
  }


  $(window).resize(resizeCanvas);


  resizeCanvas();

}


function createLines() {
  for (let i = 0; i < (canvas.height / grid); i++) {
    const lineX = new fabric.Line([0, i * grid, canvas.height, i * grid], {
      stroke: lineStroke,
      selectable: false,
      type: 'line'
    })
    const lineY = new fabric.Line([i * grid, 0, i * grid, canvas.height], {
      stroke: lineStroke,
      selectable: false,
      type: 'line'
    })
    sendLinesToBack()
    canvas.add(lineX)
    canvas.add(lineY)
  }
}


//Functions to calculate the next table number
function findFirstMissing(array, start, end) {
  if (start > end)
    return end + 1;
  if (start != array[start - 1]) {
    return start;
  }
  let mid = parseInt((start + end) / 2, 10);
  // Left half has all elements from 0 to mid
  if (array[mid - 1] == mid)
    return findFirstMissing(array, mid + 1, end);
  return findFirstMissing(array, start, mid);
}

function NextTableNo() {
  let newtable = new Array

  //Get table elements from canvas
  canvas.getObjects().filter(obj => obj.visualType === 'table').forEach(obj => {
    newtable.push(obj.number);
  })

  //Pass to function
  if (newtable)
    //Sort before passing
    return findFirstMissing(newtable.sort(function (a, b) { return a - b }), 1, newtable.length)
}


//Function to generate an element ID, this might change when db is done
//???
function generateId() {
  return Math.random().toString(36).substr(2, 8)
}

//Functions for adding elements
function addRect(left, top, width, height, number) {
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

  // num = NextTableNo()
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
    type: 'rect',
    visualType: 'table',
    id: id,
    number: number,
    isGroupped: true
  })

  canvas.add(g)
  return g
}
function addCircle(left, top, radius, number) {
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

  // num = NextTableNo()
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
    type: 'circle',
    visualType: 'table',
    id: id,
    number: number,
    isGroupped: true
  })
  canvas.add(g)
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

  num = NextTableNo()
  const t = new fabric.IText(num.toString(), {
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
    visualType: 'table',
    type: 'triangle',
    id: id,
    number: num,
    isGroupped: true
  })
  canvas.add(g)
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
    visualType: 'chair',
    type: 'rect',
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
    type: 'rect',
    visualType: 'bar',
    isGroupped: true
  })
  canvas.add(g)
  return g
}
//We still need a button to add an entrance, for now this is overhead
function addEntrance(left, top, width, height) {
  const o = new fabric.Rect({
    width: width,
    height: height,
    fill: entranceFill,
    stroke: entranceStroke,
    strokeWidth: 2,
    shadow: entranceShadow,
    originX: 'center',
    originY: 'center',
    id: generateId()
  })
  const t = new fabric.IText(entranceText, {
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
    type: 'rect',
    visualType: 'entrance',
    isGroupped: true
  })
  canvas.add(g)
  return g
}

function addExit(left, top, width, height) {
  const o = new fabric.Rect({
    width: width,
    height: height,
    fill: exitFill,
    stroke: exitStroke,
    strokeWidth: 2,
    shadow: exitShadow,
    originX: 'center',
    originY: 'center',
    id: generateId()
  })
  const t = new fabric.IText(exitText, {
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
    type: 'rect',
    visualType: 'exit',
    isGroupped: true
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
    type: 'rect',
    visualType: 'wall',
    id: generateId()
  })
  canvas.add(o)
  return o
}





//Help function for element modification
function snapToGrid(target) {
  target.set({
    left: Math.round(target.left / (grid / 2)) * grid / 2,
    top: Math.round(target.top / (grid / 2)) * grid / 2
  })
}

//Help function for element modification
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

//Gridlines help function
function sendLinesToBack() {
  canvas.getObjects().map(o => {
    if (o.type === 'line') {
      canvas.sendToBack(o)
    }
  })
}



document.querySelectorAll('.triangle')[0].addEventListener('click', function () {
  const o = addTriangle(0, 0, 30)
  canvas.setActiveObject(o)
})

document.querySelectorAll('.chair')[0].addEventListener('click', function () {
  const o = addChair(0, 0)
  canvas.setActiveObject(o)
})

document.querySelectorAll('.bar')[0].addEventListener('click', function () {
  const o = addBar(0, 0, 180, 60)
  canvas.setActiveObject(o)
})


document.querySelectorAll('.wall')[0].addEventListener('click', function () {
  const o = addWall(0, 0, 60, 180)
  canvas.setActiveObject(o)
})




//Remove button listener
document.querySelectorAll('.remove')[0].addEventListener('click', function () {
  // if (canvas.getActiveGroup()) {
  //   canvas.getActiveGroup().forEachObject(function (o) { canvas.remove(o) });
  //   canvas.discardActiveGroup().renderAll();
  // } else {
  if (canvas.getActiveObject())
    canvas.remove(canvas.getActiveObject());
  else {
    Toastify({
      text: "You must select something to remove!",
      duration: 3000,
      close: true,
      backgroundColor: "#b30511",
    }).showToast();
  }
  // }
})


//Customer mode button listener
document.querySelectorAll('.customer-mode')[0].addEventListener('click', function () {
  adminMode = false;
  canvas.getObjects().map(o => {
    o.hasControls = false
    o.lockMovementX = true
    o.lockMovementY = true
    o.lockScalingX = true
    o.lockScalingY = true
    o.lockRotation = true

    if (o.visualType === 'chair' || o.visualType === 'bar' || o.visualType === 'wall' || o.visualType === 'entrance'
      || o.visualType === 'exit') {
      o.selectable = false
    }
    o.borderColor = '#38A62E'
    o.borderScaleFactor = 2.5
    o.hoverCursor = ''
  })
  canvas.selection = false
  canvas.hoverCursor = 'pointer'
  canvas.discardActiveObject()
  canvas.renderAll()
  document.querySelectorAll('.admin-menu')[0].style.display = 'none'
  document.querySelectorAll('.customer-menu')[0].style.display = 'block'
})


//Admin mode button listener
document.querySelectorAll('.admin-mode')[0].addEventListener('click', function () {
  adminMode = true;
  canvas.getObjects().map(o => {
    o.hasControls = true
    o.lockMovementX = false
    o.lockMovementY = false
    o.lockScalingX = false
    o.lockScalingY = false
    o.lockRotation = false


    if (o.visualType === 'chair' || o.visualType === 'bar' || o.visualType === 'wall' || o.visualType === 'entrance'
      || o.visualType === 'exit') {
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


//The objects that adds when the screen is ready
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

  // addBar(120, 0, 180, 60)

  // addEntrance(600, 0, 180, 60)

  // addExit(400, 0, 180, 60)

  addWall(120, 510, 60, 60)
}
