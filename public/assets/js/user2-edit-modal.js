var selectedTable = 0

//change the date to the one thats in the reservation
if ($('#old-date').length) {
    $("#resv-date").val($('#old-date').val())
}

//Show the modal apefthias
$(document).ready(function () {
    // console.log()
    getTimeSlots($("#table_id").val())
    $('#resvModal').modal('show')
})


$("#btnBook").click(modifyBooking)

function modifyBooking() {
    var date = $("#resv-date")[0].value;
    var timeSlot = $('input[sel="selected"]').attr("id");
    var pax = $("#people").val()
    var resv = $("#reservation_id").val()
    var details =  $("#description").val()


    var data = {
        'date': date,
        'time': timeSlot,
        'id': resv,
        'pax': pax,
        'details': details
    };


    //an exw selected table (den en 0)
    //stelnw to
    if(selectedTable){
        data['table_id'] = selectedTable
    }

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('input[name="_token"]').attr("value"),
        },
    });
    console.log(data)

    $.ajax({
        type: "POST",
        url: "/edit-reservation",
        data: data,
        success: function (success) {
            sessionStorage.setItem("success", "The reservation has been modified successfully.");
            window.location.href = "/manage-reservations/";
            // window.location.href = "/reservation/" + success.user3_id + "/" + success.id;
        },
         error: function (error) {
            $("#people").removeClass("is-invalid");
            $("#timeSlots").removeClass("is-invalid");
            $("#description").removeClass("is-invalid");

            if (error.responseJSON.errors.pax) {
                $("#people").addClass("is-invalid");
                $("#peopleError").html(error.responseJSON.errors.pax);
            }

            if (error.responseJSON.errors.time) {
                $("#timeSlots").addClass("is-invalid");
                $("#timeSlots").next().html(error.responseJSON.errors.time);
            }

            if (error.responseJSON.errors.details) {
                $("#description").addClass("is-invalid");
                $("#description").next().html(error.responseJSON.errors.details);
            }

        },
    });
}

//An klisei to modal tote na fiun ta error messages
$('#resvModal').on('hidden.bs.modal', function () {
    canvas.discardActiveObject().renderAll();
    $("#timeSlots").removeClass("is-invalid");
    $("#description").removeClass("is-invalid");
    $("#people").removeClass("is-invalid");
    $("#timeSlots2").removeClass("is-invalid");
    $("#peopleError").prev().removeClass("is-invalid")
})



function changePeople() {


    //get max capacity of table
    capacity = canvas.getActiveObject().capacity

    htmlInside = ""
    selected = false

    //create the options based on capacity
    for (i = 2; i <= capacity; i++) {
        htmlInside += "<option value=\"" + i + "\""
        if (i == current) {
            selected = true
            htmlInside += "selected"
        }
        htmlInside += ">" + i + "</option>"
    }
    //put the options inside the html
    $('#people').html(htmlInside)

    //check if any is selected and show is invalid
    if (selected == false) {
        $("#people").val(current)
        $("#people").addClass("is-invalid")
        $("#peopleError").prev().addClass("is-invalid")
        $("#peopleError").html("Table capacity is not enough.");

    }



}

//get current value of pax
current = 0
current = $('#people').val()

//otan patithi ena table na fkennun ta antistoixa stoixeia sto modal
canvas.on({
    'selection:created': function (o) {
        $("#people").removeClass("is-invalid")
        $("#peopleError").prev().removeClass("is-invalid")
        selectedTable = canvas.getActiveObject().id
        $("#table").val(canvas.getActiveObject().number)
        changePeople()
    }
})


//when the pax changes remove the errors
$("#people").change(function(){
    $("#peopleError").prev().removeClass("is-invalid")
})
