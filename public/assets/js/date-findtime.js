
//getTimeSlots()

//if we are modifying then we have an old date to select


var timeSlots = []


//Function to find time slots
function findTimeSlots() {
    $("#timeSlots").fadeOut('fast').promise().done(function () {
        $("#timeSlots").empty();
        getTimeSlots() //Ajax call, edw mesa kaleite kai to setTimeSlots
        setPeople();
        $("#timeSlots").fadeIn('slow')
    })
}


function setTimeSlots($timeslots) {
    //If we have time slots
    if ($timeslots.length) {
        $timeslots.forEach($time => {
            //Create an element for each time slot
            $("#timeSlots").append(
                "<input type=\"radio\" onClick=\"getTime(this)\" class=\"btn-check justify-content-center\" name=\"options\" id=\""
                + $time
                + "\" autocomplete=\"off\"/><label class=\"btn btn-sm btn-outline-info m-1\" for=\""
                + $time + "\">"
                + $time + "</labell>"
            )
        })

        //if we are on the modification page
        if (("#reservation_id").length) {
            $('#btnBook').html("<button type=\"button\" class=\"btn btn-primary\"><span class=\"d-sm-block\">Apply</span></button>")
        } else
            //Create a book button
            $('#btnBook').html("<button type=\"button\" class=\"btn btn-primary\"><span class=\"d-sm-block\">Book Now</span></button>")
    }
    else {
        //No availability, delete book button if exists
        $("#timeSlots").append("<div class=\"text-danger text-nowrap\">No availability for this date</div>")
        $('#btnBook').empty()
    }
}

function getTime(element) {
    var a = element;
    a.setAttribute("sel", "selected");
}


$('#resvModal').on('hidden.bs.modal', function () {
    $("#pax").empty()
  })

function setPeople()
{
    if ($("#pax").length == 0) {
        $("#pax").empty()
        for (i = 2; i <= canvas.getActiveObject().capacity; i++)
            $("#pax").append("<option value=\"" + i + "\">" + i + "</option>")
    }
   else if($("#pax").val()>canvas.getActiveObject().capacity)
   {
        $("#pax").empty()
        for (i = 2; i <= canvas.getActiveObject().capacity; i++)
            $("#pax").append("<option value=\"" + i + "\">" + i + "</option>")
       Toastify({
        text: 'This table has a capacity of only ' + canvas.getActiveObject().capacity + ' people',
        duration: 5000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "#ba0b0b",
    }).showToast()
   }
   else
   {
         for (i = 2; i <= canvas.getActiveObject().capacity; i++)
         {
              if($("#pax").val() == i)
              {
                  break;
              }
              $("#pax").append("<option value=\"" + i + "\">" + i + "</option>")
         }
   }
}


function getTimeSlots(table) {
    if (table == undefined) {
        table_id = canvas.getActiveObject().id
    }
    else
        table_id = table

    date = $("#resv-date")[0].value;
    var data = {
        "date": date,
        "table_id": table_id,
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        }
    });

    if (("#reservation_id").length) {
        content = { 'table_id': table_id, 'date': date, 'id': $("#reservation_id").val() }
    } else {
        content = { 'table_id': table_id, 'date': date }
    }

    $.ajax({
        type: "GET",
        url: "/api/" + username + "/time-slots",
        data: content,
        success: function (timeSlots) {
            //TODO NA FIGEI APO EDW
            setTimeSlots(timeSlots); //eprepe na ferw edw to call sto setTimeSlots gia na fkei pu tin 1i fora
        },

        //TODO toast error colors nan idio se ulla
        error: function (error) {
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
}



if($('#footer').length){
    $('#footer').attr('id','')
}
