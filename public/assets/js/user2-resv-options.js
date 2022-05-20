initCanvas();
// resizeCanvas()
//Get today's date
var today = new Date();
var dd = String(today.getDate()).padStart(2, "0");
var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + "-" + mm + "-" + dd;
//Today's date as default value
$("#resv-date").attr("min", today);
$("#resv-date").val(today);

function loadFloorPlan(floorplan) {
    canvas.loadFromJSON(floorplan);

    //Evre jina p itan groupped pu mesto json j kame ta recreate
    canvas
        .getObjects()
        .filter((obj) => obj.isGroupped === true)
        .forEach((obj) => {
            floorplan.objects.forEach((notpulled) => {
                if (notpulled.id === obj.id && obj.id !== undefined) {
                    recreateGrouppedObjects(obj, notpulled);
                }
            });
        });

    canvas.renderAll();
    CustomerMode();
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
        selectable: notpulled.objects[0].selectable,
    });

    const t = new fabric.IText(notpulled.number.toString(), {
        fontFamily: notpulled.objects[1].fontFamily,
        fontSize: notpulled.objects[1].fontSize,
        fill: notpulled.objects[1].fill,
        textAlign: notpulled.objects[1].textAlign,
        originX: notpulled.objects[1].originX,
        originY: notpulled.objects[1].originY,
    });

    const g = new fabric.Group([o, t], {
        left: obj.left,
        top: obj.top,
        centeredRotation: obj.centeredRotation,
        snapAngle: obj.snapAngle,
        selectable: obj.selectable,
        type: obj.type,
        visualType: obj.visualType,
        number: notpulled.number,
        id: obj.id,
        isGroupped: true,
        capacity: notpulled.capacity
    });

    //Remove the black object that was pulled
    canvas.remove(obj);
    //Add the new object that is the same as before
    canvas.add(g);
}



username = $("#username").attr("user");

$(document).ready(function () {
    //CODE TO GET THE FLOORPLAN FROM DATABASE
    $.ajax({
        url: "/api/floor-plan",
        method: "get",
        dataType: "json",

        success: function (result) {
            if (result) {
                //an den en null to floor plan
                floorplan = result;
                loadFloorPlan(result); //kame run to import function
            }
        },
        error: function (err) {
            Toastify({
                //an exw error fkale toast
                text: "Oops! Something went wrong",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#db0f0f",
            }).showToast();
        },
    });
});
