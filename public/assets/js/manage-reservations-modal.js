$(document).ready(function () {
    $("#mydate").val($("#mydate").attr("value"));

    $("#mydate").change(function () {
        date = $("#mydate").val();
        $("#dateInput").trigger("submit");
    });

    var unchanged_attendance =0
    modalpop();

    if (sessionStorage.getItem("success")) {
        Toastify({
            text: sessionStorage.getItem("success"),
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#3cc2b4",
        }).showToast();
        sessionStorage.removeItem("success");
    }


})


function setStatus(that){
    //remove all classes
    $('#status').removeClass('text-info')
    $('#status').removeClass('text-danger')
    $('#status').removeClass('text-success')
    $('#status').removeClass('text-warning')

    if($(that).hasClass('table-info')){
        $('#status').addClass('text-info')
        $('#statusText').html('Incomplete')
    }else if($(that).hasClass('table-danger')){
        $('#status').addClass('text-danger')
        $('#statusText').html('Canceled')
    }else if($(that).hasClass('table-success')){
        $('#status').addClass('text-success')
        $('#statusText').html('Completed')
    }else if($(that).hasClass('table-warning')){
        $('#status').addClass('text-warning')
        $('#statusText').html('Unattended')
    }else{
        $('#statusText').html('Upcoming')
    }
}


//Event on modal closed na stelnei sto ajax to number an allakse
$('#resvPopup').on('hidden.bs.modal', function () {
    //get the attended number from modal and row

    modal_attendance = $("#attendance").val()

    //get the reservation id
    id = parseInt($("#myresvBusiness").html(),10)

    //If there is a change
    if(modal_attendance != parseInt(unchanged_attendance.html(),10)){
        applyAttendanceChanges(modal_attendance, id);
    }
    //an en ok tote allassw to p to row j kamnw ksana colorize

  })


//Function to pop the modal
function modalpop() {
    $(document).on("click", ".resvPopup", function () {
        
        //console.log($(".details").html())
        //TODO
        //otan fernw ta data me ajax or laravel prp na fernw j to id etsi wste kathe fora
        //pu kamnei run tunto function na kamnw query to id j na allassw ta data tu modal

        resv_details = $(this).children(".details").html();
        resv_id = $(this).children(".res_id").html();
        resv_table = $(this).children(".table_no").html();
        time = $(this).children(".time").html();
        customerName = $(this).children(".customerName").html();
        phone = $(this).children(".phone").html();
        people = $(this).children().children(".people").html();
        cancelled = parseInt($(this).children().children(".cancelled").html(),10)
        reason = $(this).children(".customerName").html()
        attendance = $(this).children().children(".attendance").html();
        unchanged_attendance = $(this).children().children(".attendance") //set the global variable to use it when modal is closed

        // Show the buttons modify j cancel epd bori na itan hidden prin
        $("#modCancel").show();
        $("#modResv").show();
        //Enable the attendance epd bori nan disabled pou prin
        $("#attendance").prop("disabled", false).attr("type","number")
        //Delete the cancel reason epd bori nan shown p prin
        $("#cancelContent").remove()

        date = $("#mydate").attr("value");
        date = new Date(date);
        date.setHours(0, 0, 0, 0); //set hours to prepare check for date equality


        //Get Current Time and change to minutes
        now = new Date();
        now.setHours(0, 0, 0, 0); //set hours to prepare check for date equality

        //If date ennen simera na men bori na kami modify or cancel
        //j na men bori na kami modify to attendance
        //same gia cancelled
        if (now.valueOf() > date.valueOf() || cancelled) {
            $("#modCancel").hide();
            $("#modResv").hide();
            $("#attendance").prop("disabled", true).attr("type","text").addClass("bg-white")
        }
        if(cancelled){
            $("#modalContent").append("<div class=\"card\" id=\"cancelContent\"><h6 for=\"reasonTextArea\">Cancellation Reason</h6><label class=\"form-control\" id=\"reasonTextArea\">" + reason + "</label></div>")
        }

        //Set the status icon and text in modal
        setStatus(this)

        $("#myresvTextArea").html(resv_details);
        $("#myresvBusiness").html(resv_id);
        $("#myresvType").html(resv_table);
        $("#myresvTime").html(time);
        $("#customerName").html(customerName);
        $("#phone").html(phone);
        $("#people").html("/" + people);
        $("#attendance").val(attendance);
        $("#attendance").attr('max',people);


        $("#FormCancel").append(
            '<input name="reservation_id" value="' + resv_id + '" hidden>'
        );
        $("#resvPopup").modal("show");
    });
}


function applyAttendanceChanges(attendance,id){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('[name="_token"]').attr("value"),
        },
    });

    $.ajax({
        url: "/api/apply-attendance",
        type: "post",
        data: {
            'reservation_id': id,
            'attendance': attendance,
        },
        success: function (result) {
            console.log(result)
            if(result == "success"){
                //an en ok tote allakse sto datatable to value
                unchanged_attendance.html(attendance)
                colorizeTable()
            }
        },
        error: function (data) {
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
    })
}

//TODO: an en cancelled episis na men allassetai to attendance (ute an eperase i mera)
