//TODO: aman patisis add reservation pu ton u2
//      prp na dia sto epomeno page tin imerominia p ishe


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

    //add new classes depending on the color of the row
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


//Event on modal closed, send the ajax request
$('#resvModal').on('hidden.bs.modal', function () {
    //get the attended number from modal
    modal_attendance = $("#attendance").val()

    //get the reservation id
    id = parseInt($("#myresvBusiness").html(),10)

    //If there is a change
    //NOTE: unchanged_attendance is a DOM element
    //      it is initialized on click to the modal
    if(modal_attendance != parseInt(unchanged_attendance.html(),10)){
        //apply the chanfes
        applyAttendanceChanges(modal_attendance, id);
    }

  })


//Function to pop the modal
function modalpop() {
    $(document).on("click", ".resvPopup", function () {


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

        $("#resvModal").modal("show");
    });
}


//function to apply the changes in attendance
function applyAttendanceChanges(attendance,id){
    //use the csrf token to prevent csrf attacks
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('[name="_token"]').attr("value"),
        },
    });
    //make the ajax request
    $.ajax({

        //the url is an api that accepts two parameters
        url: "/api/apply-attendance",
        type: "post",

        //use the reservation id and new attendance
        //these are taken from the function arguments
        data: {
            'reservation_id': id,
            'attendance': attendance,
        },

        //on success make the changes
        success: function (result) {
            //we should get a string message "success"
            //from the controller
            if(result == "success"){
                //change the attendance from the table row
                unchanged_attendance.html(attendance)
                //recolorize table due to the new attendance
                colorizeTable()
            }
        },
        //on error show a toast
        error: function (data) {
            Toastify({
                //we shouldnt have an error
                //but if we do, inform the user
                text: "Oops! Something went wrong.",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#db0f0f",
            }).showToast();
        },
    })
}

