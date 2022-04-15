initCanvas()
// resizeCanvas()
// addDefaultObjects()

toast = Toastify({ // kamnw ena toast na exume gia meta
    text: '',
    duration: 5000,
    close: true,
    gravity: "top",
    position: "right",
    backgroundColor: "#3cc2b4",
})

username = $('#username').attr('user')


$('.clear').click(function () {
    canvas.clear();
    initCanvas();
    //TODO: -WARNING Reservations ENA XATHUN
    //      -j na men bori na to kamei an eshi locked trapezia
})

var floorplan

$('#save').click(function () {

    //Afaira tes grammes na men ginun save
    canvas.getObjects().filter(obj => obj.type === 'line').forEach(obj => {
        canvas.remove(obj)
    })

    //Metetrepse se json ta data j varta sto variable floorplan
    floorplan = canvas.toObject(['lockMovementX',
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

    //Vale ulla ta table mesa se ena array
    tablesArray = []

    //Gia kathe table kame ena json object
    floorplan.objects.forEach(object => {
        tablesArray.push({
            'id'      : 2,
            'table_no': object.number,
            'capacity': parseInt(object.capacity)
        })
    })

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('[name="_token"]').attr("value"),
        },
    });

    $.ajax({
        url: "/user/" + username + "/floor-plan",
        method: 'post',
        data: {
            'floorplan': JSON.stringify(floorplan),
            'tables' : tablesArray
        },

        success: function (result) {
            toast.options.text = "Your changes have been saved successfully!"
            toast.showToast()
            console.log(result)
        },
        error: function (err) {
            toast.options.text ='Oops! Something went wrong :('
            toast.showToast()
            console.log(err);
        }
    });
    // console.log('export done')
})

$('.export').click(function(){
    toast.options.text = "File exported, check your downloads!"
    toast.showToast()
   downloadJSON(floorplan, 'floorplan.json')
})



// $('.import').click(function(){
//     loadFloorPlan(floorplan)
// })

function loadFloorPlan(floorplan) {
    canvas.loadFromJSON(floorplan)

    //Evre jina p itan groupped pu mesto json j kame ta recreate
    canvas.getObjects().filter(obj => obj.isGroupped === true).forEach(obj => {
        floorplan.objects.forEach(notpulled => {
            if (notpulled.id === obj.id && obj.id !== undefined) {
                recreateGrouppedObjects(obj, notpulled)
            }
        })
    })

    canvas.renderAll();

    //TODO:
    //na eshi kapia parameters kapio trapezi
    //analoga an eshi kratisi na men bori na taraksi nan locked
    //na checkari o server prin ta vali mesa an e taraksan
    //kathe trapezi p ginete generate prp na eshi id pu to database

    //na kamw export to trapezi
    //na thori me kapio tropo tin kratisi tu se svg?

    // console.log('import done')


}


function recreateGrouppedObjects(obj, notpulled) {

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

    const g = new fabric.Group([o, t], {
        left: obj.left,
        top: obj.top,
        capacity: obj.capacity,
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




$(document).ready(function () {
    //CODE TO GET THE FLOORPLAN FROM DATABASE
    $.ajax({
        url: "/api/" + username + "/floor-plan",
        method: 'get',
        dataType: "json",

        success: function (result) {
            if (result.length != 0) { //an den en null to floor plan
                floorplan = result
                loadFloorPlan(result)//kame run to import function
            }
        },
        error: function (err) {
            Toastify({ //an exw error fkale toast
                text: 'Oops! Something went wrong :(',
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#3cc2b4",
            }).showToast();
        }
    });

})





//download file
function downloadJSON(data, filename) {

    if (!data) {
        console.error('No data')
        return;
    }

    if (!filename) filename = 'console.json'

    if (typeof data === "object") {
        data = JSON.stringify(data, undefined, 4)
    }

    var blob = new Blob([data], { type: 'text/json' }),
        e = document.createEvent('MouseEvents'),
        a = document.createElement('a')

    a.download = filename
    a.href = window.URL.createObjectURL(blob)
    a.dataset.downloadurl = ['text/json', a.download, a.href].join(':')
    e.initMouseEvent('click', true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null)
    a.dispatchEvent(e)
}
