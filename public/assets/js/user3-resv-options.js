initCanvas()
// resizeCanvas()
//Get today's date
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;
//Today's date as default value
$("#resv-date").attr("min", today)

if(!$("#resv-date").val()){
    $('#resv-date').val(today);
}


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
    updateTableAvailability()
    CustomerMode()

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


username = $('#username').attr('user')

$(document).ready(function () {
    //CODE TO GET THE FLOORPLAN FROM DATABASE
    $.ajax({
        url: "/api/" + username + "/floor-plan",
        method: 'get',
        dataType: "json",

        success: function (result) {
            if (result) { //an den en null to floor plan
                floorplan = JSON.parse(result["floorplan"])
                loadFloorPlan(floorplan)//kame run to import function
            }
        },
        error: function (err) {
            Toastify({ //an exw error fkale toast
                text: 'Oops! Something went wrong',
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#db0f0f",
            }).showToast();
        }
    });

})


var book = document.getElementById("btnBook");
book.addEventListener('click', bookTable);

function bookTable()
{
    var date = $("#resv-date")[0].value;
    var timeSlot = $('input[sel="selected"]').attr('id');
    var username = $('#username').attr('user');
    var table = canvas.getActiveObject().id
    var description = document.getElementById("description").value;
    var pax = document.getElementById("pax").value;
    var data = {
        "date": date,
        "time": timeSlot,
        "table_id": table,
        "details": description,
        "pax": pax
    };

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        }
      });

    $.ajax({
        type: "POST",
        url: "/user/" + username + "/book",
        data: data,
        success: function(success) {
            //Create session that tells the user that the reservation was successful
            //and redirect to make a reservation page
            sessionStorage.setItem("reservation", "success");
            window.location.href = "/";
        },
        error: function(errors) {
            $('#description').removeClass("is-invalid")
            $('#timeSlots').removeClass("is-invalid")
            $.each(errors.responseJSON.errors, function (key, value) {
                if(key == 'time')
                    $('#timeSlots').addClass('is-invalid');
                if(key == 'details')
                    $('#description').addClass('is-invalid');
            });

            Toastify({ //an exw error fkale toast
                text: 'Please fill out all the details!',
                duration: 700,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#db0f0f",
            }).showToast();
        }
    });
}

