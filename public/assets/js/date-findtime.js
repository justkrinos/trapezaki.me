//When date is changed, update time slots
$('input[type=date].popdate').on('change', findTimeSlots)

//JUST TO MAKE RANDOM TIMES DELETE LATER
function rand(min, max) { // min and max included 
    return Math.floor(Math.random() * (max - min + 1) + min)
}

//Function to find time slots
function findTimeSlots() {
    //TODO fetch available time for date $('input[type=date]').val()
    $dummyData = { time: [rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00', rand(0, 24) + ':00',] };
    // $dummyData = { time: []};
    $("#timeSlots").fadeOut('fast').promise().done(function () {
        $("#timeSlots").empty();
        setTimeSlots($dummyData.time);
        $("#timeSlots").fadeIn('slow')
    })

}


function setTimeSlots($timeslots) {
    //If we have time slots
    if (!$timeslots.empty) {
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

