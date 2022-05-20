initCanvas()
// resizeCanvas()
// addDefaultObjects()

var noReservationsOnTables = false;

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
    if (noReservationsOnTables) {
        //TODO: na mpi sta eggrafa tuto to popup p kamni clear all sto floorplan editor
        Swal.fire({
            title: 'Are you sure you want to delete everything?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, clear all.'
        }).then((result) => {
            if (result.isConfirmed) {
                canvas.clear();
                initCanvas();
                Swal.fire(
                    'Deleted',
                    'The floor plan has been deleted.',
                    'success'
                )
            }
        })

    } else {
        Toastify({
            text: "You can't clear the floor plan because there are tables with upcoming reservations!",
            duration: 3000,
            close: true,
            backgroundColor: "#b30511",
        }).showToast();
    }

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
        'isGroupped',
        'scaleX',
        'scaleY'
    ])

    //Vale ulla ta table mesa se ena array
    tablesArray = []

    //Gia kathe table kame ena json object
    floorplan.objects.forEach(object => {
        if (object.visualType == "table") {
            tablesArray.push({
                'id': object.id,
                'table_no': object.number,
                'capacity': parseInt(object.capacity)
            })
        }
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
            'tables': tablesArray,
            'save': true
        },

        success: function (result) {
            toast.options.text = "Your changes have been saved successfully!"
            toast.options.backgroundColor = "#3cc2b4"
            toast.showToast()
            // console.log(result)
        },
        error: function (err) {
            if (err.responseJSON.errors != undefined && err.responseJSON.errors.hasOwnProperty('tables')) {
                toast.options.text = 'You must have at least one table!'
                toast.showToast()
            } else {
                toast.options.text = 'Oops! Something went wrong'
                toast.options.backgroundColor = "#db0f0f"
                toast.showToast()
            }
            console.log(err)

        }
    });
    // console.log('export done')
})

$('.export').click(function () {
    toast.options.text = "File exported, check your downloads!"
    toast.showToast()
    today = new Date().toJSON().slice(0, 10).replace(/-/g, '/')
    downloadJSON(floorplan, today + "_" + username + '_floorplan' + '.json')
})



$('.import').click(function (func) {
    if (noReservationsOnTables) {
        readFile = function (e) {
            var file = e.target.files[0];
            if (!file) {
                return;
            }
            var reader = new FileReader();
            reader.onload = function (e) {
                var contents = e.target.result;
                //console.log(contents)
                var jsonContents = JSON.parse(contents)
                console.log(jsonContents)
                jsonContents.objects.forEach(object => {
                    if (object.visualType == "table") {
                        capacity = object.capacity;
                        table_no = object.number
                        shape = object.type

                        giveId(capacity, table_no, shape).then(function (id) {
                            object.id = id
                            loadFloorPlan(jsonContents) //kamnei kathe lio floorplan
                        })

                    }
                })


                document.body.removeChild(fileInput)
            }
            reader.readAsText(file)
        }
        fileInput = document.createElement("input")
        fileInput.type = 'file'
        fileInput.style.display = 'none'
        fileInput.onchange = readFile
        fileInput.func = func
        document.body.appendChild(fileInput)
        clickElem(fileInput)
    } else {
        Toastify({
            //TODO: add this message sta eggrafa
            text: "You can't import a floorplan because some tables have upcoming reservations!",
            duration: 3000,
            close: true,
            backgroundColor: "#b30511",
        }).showToast();
    }
}
)


function giveId(capacity, table_no, shape) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('[name="_token"]').attr("value"),
        },
    });

    return new Promise(function (resolve, reject) {
        $.ajax({
            url: "/user/" + username + "/floor-plan",
            method: "post",
            // dataType: "json",
            data: {
                'capacity': capacity,
                'table_no': table_no,
                'getId': true,
            },
            success: function (tableID) {
                return resolve(tableID)

            },
            error: function (err) {
                Toastify({
                    //an exw error fkale toast
                    text: "Oops! Something went wrong.",
                    duration: 5000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#db0f0f",
                }).showToast();
            },
        })
    })
}


function clickElem(elem) {
    // Thx user1601638 on Stack Overflow (6/6/2018 - https://stackoverflow.com/questions/13405129/javascript-create-and-save-file )
    var eventMouse = document.createEvent("MouseEvents")
    eventMouse.initMouseEvent("click", true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null)
    elem.dispatchEvent(eventMouse)
}



function loadFloorPlan(floorplan) {
    canvas.loadFromJSON(floorplan)

    //Evre jina p itan groupped pu mesto json j kame ta recreate
    canvas.getObjects().filter(obj => obj.isGroupped === true).forEach(obj => {
        floorplan.objects.forEach(notpulled => {
            if (notpulled.id === obj.id && obj.id !== undefined) {
                recreateGrouppedObjects(obj, notpulled)
                // console.log(notpulled.objects[0])
            }
        })
    })

    canvas.renderAll();

}

function disableReservedTables(tables) {
    //gia kathe table mesto floorplan
    canvas.getObjects().filter(obj => obj.visualType === 'table').forEach(obj => {
        //gia kathe table mesta trapezia p exun kratisi
        tables.forEach(table => {
            //check an en ta idia
            if (obj.id == table['table_id']) {
                //if true kame to table na mennen selectable
                obj.hasControls = false
                obj.lockMovementX = true
                obj.lockMovementY = true
                obj.lockScalingX = true
                obj.lockScalingY = true
                obj.lockRotation = true
                obj.borderColor = '#d40404'
                obj.borderScaleFactor = 1.5
                obj.hoverCursor = 'not-allowed'
                obj._objects[0].set('stroke', '#d40404')
                obj._objects[0].set('strokeWidth', 3)
                obj.isDisabled = true
            }
        });
    })
    canvas.renderAll()
}


function recreateGrouppedObjects(obj, notpulled) {

    //Create the items using the old data
    var o

    if (obj.type == "rect") {

        o = new fabric.Rect({
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

    } else if (obj.type == "circle") {
        o = new fabric.Circle({
            radius: notpulled.objects[0].radius,
            fill: notpulled.objects[0].fill,
            stroke: notpulled.objects[0].stroke,
            strokeWidth: notpulled.objects[0].strokeWidth,
            shadow: notpulled.objects[0].shadow,
            originX: notpulled.objects[0].originX,
            originY: notpulled.objects[0].originY,
            centeredRotation: notpulled.objects[0].centeredRotation
        })
    }

    const t = new fabric.IText("No." + notpulled.number.toString() + "\n Capacity: " + notpulled.capacity.toString(), {
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
        isGroupped: true,
        scaleX: notpulled.scaleX,
        scaleY: notpulled.scaleY,
        capacity: notpulled.capacity,
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
                //get the floorplan from the result
                floorplan = JSON.parse(result['floorplan']);
                tablesWithReservations = result['tablesWithReservations']
                loadFloorPlan(floorplan)//kame run to import floorplan function
                disableReservedTables(tablesWithReservations); //kame disable ta tables p exun kratisis

                //an den eshi kratisis se trapezia
                //tote ginete allow to import
                //alios en default disabled so fkalli popup error
                //mesto listener tu koumpiou checkari tin metavliti noReservationsOnTables
                if (tablesWithReservations.length == 0) {
                    noReservationsOnTables = true;
                }
            }
        },
        error: function (err) {
            Toastify({ //an exw error fkale toast
                text: 'Oops! Something went wrong.',
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#db0f0f",
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
