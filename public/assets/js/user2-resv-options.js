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
                text: "Oops! Something went wrong :(",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#3cc2b4",
            }).showToast();
        },
    });
});

var book = document.getElementById("btnBook");

book.addEventListener("click", bookTable);

function bookTable() {
    var guest = !$("#tab01").attr("class").includes("active");
    console.log(guest);

    var date = $("#resv-date")[0].value;
    var timeSlot = $('input[sel="selected"]').attr("id");
    var table = canvas.getActiveObject().id;
    var pax = document.getElementById("pax").value;

    if (!guest) {
        var user3_username = document.getElementById("user3_username").value;
        var description = document.getElementById("description").value;
        console.log(description)
        var data = {
            date: date,
            time: timeSlot,
            table_id: table,
            user3_username: user3_username,
            details: description,
            pax: pax,
        };
        console.log(data);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('input[name="_token"]').attr("value"),
            },
        });

        $.ajax({
            type: "POST",
            url: "/add-reservation",
            data: data,
            success: function (success) {
                sessionStorage.setItem("success", "The reservation has been added successfully!");
                window.location.href = "/manage-reservations/";
                //window.location.href = "/reservation/" + success.user3_id + "/" + success.id;
                $("#user3_username").removeClass("is-invalid");
                $("#resvModal").modal("hide");
            },
            error: function (error) {
                console.log(error);

                $("#user3_username").removeClass("is-invalid");
                $("#timeSlots").removeClass("is-invalid");
                $("#description").removeClass("is-invalid");

                if (error.responseJSON.errors.user3_username) {
                    $("#user3_username").addClass("is-invalid");
                    $("#user3_username").next().html(error.responseJSON.errors.full_name);
                }

                if (error.responseJSON.errors.time) {
                    $("#timeSlots").addClass("is-invalid");
                    $("#timeSlots").next().html(error.responseJSON.errors.time);
                }

                if (error.responseJSON.errors.details) {
                    $("#description").addClass("is-invalid");
                    $("#description").next().html(error.responseJSON.errors.details);
                }


                // if(success == "success")
                // {
                //     toast.success(data.message);
                //     setTimeout(function(){
                //         window.location.href = "/";
                //     }, 2000);
                // }
                // else
                // {
                //     console.log("lathos");
                //     toast.error(data.message);
                // }
            },
        });
    } else {
        //Guest book by User2
        var guest_fullname = document.getElementById("fullname").value;
        var guest_email = document.getElementById("email").value;
        var guest_phone = document.getElementById("phone").value;
        var description = document.getElementById("description_guest").value;
        var data = {
            guest: 1,
            date: date,
            time: timeSlot,
            table_id: table,
            full_name: guest_fullname,
            email: guest_email,
            phone: guest_phone,
            details: description,
            pax: pax,
        };
        console.log(data);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('input[name="_token"]').attr("value"),
            },
        });

        $.ajax({
            type: "POST",
            url: "/add-reservation",
            data: data,
            success: function (success) {
                sessionStorage.setItem("success", "The reservation has been added successfully!");
                window.location.href = "/manage-reservations/";
            },
            error: function (error) {
                $("#fullname").removeClass("is-invalid");
                $("#email").removeClass("is-invalid");
                $("#phone").removeClass("is-invalid");
                $("#description_guest").removeClass("is-invalid");
                $("#timeSlots2").removeClass("is-invalid");

                //Error handling
                if (error.responseJSON.errors.full_name) {
                    $("#fullname").addClass("is-invalid");
                    $("#fullname").next().html(error.responseJSON.errors.full_name);
                }
                if (error.responseJSON.errors.email) {
                    $("#email").addClass("is-invalid");
                    $("#email").next().html(error.responseJSON.errors.email);
                }

                if (error.responseJSON.errors.phone) {
                    $("#phone").addClass("is-invalid");
                    $("#phone").next().html(error.responseJSON.errors.phone);
                }

                if (error.responseJSON.errors.details) {
                    $("#description_guest").addClass("is-invalid");
                    $("#description_guest").next().html(error.responseJSON.errors.details);
                }

                if (error.responseJSON.errors.time) {
                    $("#timeSlots2").addClass("is-invalid");
                    $("#timeSlots2").next().html(error.responseJSON.errors.time);
                }

                // if(success == "success")
                // {
                //     toast.success(data.message);
                //     setTimeout(function(){
                //         window.location.href = "/";
                //     }, 2000);
                // }
                // else
                // {
                //     console.log("lathos");
                //     toast.error(data.message);
                // }
            },
        });
    }
}

//An klisei to modal tote na fiun ta error messages
$('#resvModal').on('hidden.bs.modal', function () {
    $("#user3_username").removeClass("is-invalid");
    $("#timeSlots").removeClass("is-invalid");
    $("#description").removeClass("is-invalid");
    $("#fullname").removeClass("is-invalid");
    $("#email").removeClass("is-invalid");
    $("#phone").removeClass("is-invalid");
    $("#description_guest").removeClass("is-invalid");
    $("#timeSlots2").removeClass("is-invalid");
  })