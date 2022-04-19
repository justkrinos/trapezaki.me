//When date is changed, update time slots

//getTimeSlots()

var timeSlots = []
$('input[type=date].popdate').on('change', findTimeSlots)


//JUST TO MAKE RANDOM TIMES DELETE LATER
function rand(min, max) { // min and max included 
    return Math.floor(Math.random() * (max - min + 1) + min)
}


//Function to find time slots
function findTimeSlots() {
    //TODO fetch available time for date $('input[type=date]').val()
   // $dummyData = { time: [rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00',] };
    // $dummyData = { time: []};
    $("#timeSlots").fadeOut('fast').promise().done(function () {
        console.log(timeSlots)
        $("#timeSlots").empty();
        getTimeSlots() //Ajax call, edw mesa kaleite kai to setTimeSlots
        //getTimeSlots(timeSlots);
        $("#timeSlots").fadeIn('slow')
    })
}


function setTimeSlots($timeslots) {
    //If we have time slots
    console.log($timeslots)
    console.log($timeslots.length)
    if (!$timeslots.length == 0) {
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
        //Create a book button
        $('#btnBook').html("<button type=\"button\" class=\"btn btn-primary\"><span class=\"d-sm-block\">Book Now</span></button>")
    }
    else {
        //No availability, delete book button if exists
        $("#timeSlots").append("<div class=\"text-danger text-nowrap\">No availability for this date</div>")
        $('#btnBook').empty()
    }
}

function getTime(element)
{
    var a = element;
    a.setAttribute("sel", "selected");
}


//FOR LATER USE ON SUBMITTING

// //Submit button functionality
// document.querySelectorAll('.submit')[0].addEventListener('click', function () {
//     const obj = canvas.getActiveObject()
//     $('#modal').modal('show')
//     let modalText = 'You have not selected anything'
//     if (obj) {
//       modalText = 'You have selected table ' + obj.number + ', time: ' + formatTime(slider.noUiSlider.get())
//     }
//     document.querySelectorAll('#modal-table-id')[0].innerHTML = modalText
//   })



function getTimeSlots(){
    table_id = canvas.getActiveObject().id
    date = $("#resv-date")[0].value;
    var data = {
        "date": date,
        "table_id": table_id,
    };
    console.log(data);
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        }
      });

    $.ajax({
        type: "GET",
        url: "/api/" + username + "/time-slots",
        data: {
            'table_id': table_id,
            'date': date
        },
        success: function(success) {
            timeSlots = success
            //TODO NA FIGEI APO EDW
            setTimeSlots(timeSlots); //eprepe na ferw edw to call sto setTimeSlots gia na fkei pu tin 1i fora
        },
        error: function(error) {
            console.log(error);
            Toastify({ //an exw error fkale toast
                text: 'Oops! Something went wrong :(',
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#ba0b0b",
            }).showToast();
        }
    });
}