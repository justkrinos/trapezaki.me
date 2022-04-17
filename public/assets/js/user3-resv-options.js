initCanvas()
// resizeCanvas()


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
    CustomerMode()

    //TI PREPEI NA KAMUME
    //- sto book molis valis imerominia tha kamni
    //      kochina ta trapezia p en full j kanonika ta alla
    //      ta kochina trapezia en prp nan clickable
    //      or aman ginun klick na fkallei table is full for this date

    //- pu katw p tin imerominia na eshi j arithmo atomwn
    //      j to query na ginete mazi me tin imerominia
    //      nan dropdown 2 mexri 16

    //- mesto modal an en guest na dinxi ta stoixeia tu
    //    an den en guest na men ta dixnei
    //- na dixnei episis to description gia tin kratisi

    //- molis tsillas to trapezi enna kamni ajax j na girefkei wres
    //      ena elexei - ta daily settings to time min j max
    //                 - tes kratisi p iparxun idi sto date j time
    //                 - to duration tis kratisis
    //      me vasi tuta enna ipologizi ta time slots
    //      dld ta koumpia

    //- molis gini to reservation stelnei email ta details tu

    //- molis patite to book tha piannei:
    //          - resv date and time
    //          - resv table
    //          - user2 (ena ton kserei pu to wildcard)
    //          - user3 p to auth or guest p to session
    //- na stelnei email ta stoixeia tu resrvation
    //- j na kammei redirect se ena page pu na eshi reservation number
    //      j na lalei success j check your inbox


    //TODO
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

username = $('#username').attr('user')

$(document).ready(function () {
    //CODE TO GET THE FLOORPLAN FROM DATABASE
    $.ajax({
        url: "/api/" + username + "/floor-plan",
        method: 'get',
        dataType: "json",

        success: function (result) {
            if (result) { //an den en null to floor plan
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

var book = document.getElementById("btnBook");
book.addEventListener('click', bookTable);

function bookTable()
{
    alert();
    var date = document.getElementById("resv-date").value;
    var time = document.getElementById("timeSlots").value;
    var url = window.location.pathname;
    var user = url.replace('/user/', '');
    user = user.replace('/book/', '');
    console.log(date)
    console.log(user);
    

    var table = canvas.getActiveObject().id
    console.log(table)
    
    var user3_id = document.getElementById("user3_id").innerHTML;
    console.log(user3_id);
    var data = {
        "date": date,
        "time": time,
        "user": user,
        "table": table,
        "user3_id": user3_id,
    };
    console.log(data);
    $.ajax({
        type: "POST",
        url: "/book",
        data: data,
        success: function(data) {
            console.log(data);
            if(data.status == "success")
            {
                toastr.success(data.message);
                setTimeout(function(){
                    window.location.href = "/";
                }, 2000);
            }
            else
            {
                toastr.error(data.message);
            }
        }
    });
}

