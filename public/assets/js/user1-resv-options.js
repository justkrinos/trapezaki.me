initCanvas()
// resizeCanvas()
addDefaultObjects()


$("#save").click(function () {
  //Todo
})

$('.clear').click(function () {
  canvas.clear();
  initCanvas();
  //WARNING Reservations ENA XATHUN
})

var ok

$('.export').click(function () {

  //Afaira tes grammes na men ginun save
  canvas.getObjects().filter(obj => obj.type === 'line').forEach(obj => {
    canvas.remove(obj)
  })

  //Metetrepse se json ta data j varta sto variable ok
  ok = canvas.toObject(['lockMovementX',
    'lockMovementY',
    'lockRotation',
    'lockScalingX',
    'lockScalingY',
    'lockUniScaling',
    'hasBorders',
    'capacity',
    'hasControls',
    'targetFindTolerance',
    'perPixelTargetFind',
    'selectable',
    'snapAngle',
    'meta',
    'id',
    'number',
    'prototype',
    'visualType',
    'isGroupped'
  ])
  console.log(ok)
})

$('.import').click(function () {

  canvas.loadFromJSON(ok)

  //Evre jina p itan groupped pu mesto json j kame ta recreate
  canvas.getObjects().filter(obj => obj.isGroupped === true).forEach(obj => {
    ok.objects.forEach(notpulled => {
      if (notpulled.id === obj.id && obj.id !== undefined) {
        recreateGrouppedObjects(obj,notpulled)
      }
    })
  })

  canvas.renderAll();

})


function recreateGrouppedObjects(obj,notpulled){ 

  //Create the items using the old data
  const o = new fabric.Rect({
    width: notpulled.objects[0].width,
    height: notpulled.objects[0].height,
    fill: notpulled.objects[0].fill,
    stroke: notpulled.objects[0].stroke,
    strokeWidth: notpulled.objects[0].strokeWidth,
    shadow: notpulled.objects[0].shadow,
    originX: notpulled.objects[0].originX,
    originY: notpulled.objects[0].originY,
    centeredRotation: notpulled.objects[0].centeredRotation,
    snapAngle: notpulled.objects[0].snapAngle,
    selectable: notpulled.objects[0].selectable
  })

  const t = new fabric.IText(notpulled.number.toString(), {
    fontFamily: notpulled.objects[1].fontFamily,
    fontSize: notpulled.objects[1].fontSize,
    fill: notpulled.objects[1].fill,
    textAlign: notpulled.objects[1].textAlign,
    originX: notpulled.objects[1].originX,
    originY: notpulled.objects[1].originY
  })

  const g = new fabric.Group([o,t], {
    left: obj.left,
    top: obj.top,
    centeredRotation: obj.centeredRotation,
    snapAngle: obj.snapAngle,
    selectable: obj.selectable,
    type: obj.type,
    visualType: obj.visualType,
    number: notpulled.number,
    id: obj.id,
    isGroupped: true
  })

  //Remove the black object that was pulled
  canvas.remove(obj)
  //Add the new object that is the same as before
  canvas.add(g)
}


