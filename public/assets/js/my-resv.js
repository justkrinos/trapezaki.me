var resv_id, raterow;

$(document).ready(function () {

//Update notifications
notification_update()


//When user clicks on Rate Now!
$(".rate").click(function (e) {
    //Show the rating modal
    $("#small").modal('show')

    //Get the element clicked
    resv_id = $(this).parents("div").attr("resv")
    raterow = $(this).parents("td")
})



//When user confirms rating
$("#rateConfirm").click(function(){

    //Update the notification
    notification_update()

    //Get the row id that is selected (useful for db)
    //raterow.parent().attr("id")
})


//If a row is clicked
$(".resvPopup").click(function(){
    id = $(this).children(".resvID").html()

    //Give the details to the modal
    $("#myresvNumber").html(id)
    $("#myresvTable").html($(this).children(".resvTable").html())
    $("#myresvPeople").html($(this).children(".resvPeople2").html())
    console.log($(this).children(".resvTable").html())
    $("#myresvTime").html($(this).children(".resvTime").html())
    $("#myresvDetails").html($(this).children(".resvDetails").html())

    //Give the id to the cancel modal
    $("#FormCancel").append("<input name=\"reservation_id\" value=\"" +id + "\" hidden>")

    //Show the modal
    $("#myresvModal").modal('show');
})

//If cancel modal is clicked, show it
$("#modCancel").click(function(){
    $("#confirmModal").modal('show')
})

$("#submitCancel").click(function(e){
    e.preventDefault();
    // console.log($('#cancellationReason').val())
    // console.log($('#myresvNumber').html())
    id = $('#myresvNumber').html();
    $('#FormCancel').append("<input type='hidden' name='reservation_id' value='"+id+"' />");
    $('#FormCancel').append("<input type='hidden' name='cancel'/>");
    if($('#cancellationReason').val()){
        $("#confirmModal").modal('hide');
        $('#FormCancel').trigger('submit');
    }


})

})


//Function to show the number of pending ratings
function notification_update(){
    var num;
    //Find number of buttons shown
    num = $("td > div > button").length

    //Check if >0
    if (num>0){
        //Find the span and replace the number and turn to shown
        $("#notification").html(num);
        $("#notification").show()
    }
    else{
        //Else turn to hidden
        $("#notification").hide()
    }


}

//Rater spawn
var rater = window.raterJs({
    element: document.querySelector("#rating"),
    starSize: 42,
    rateCallback:function rateCallback(rating, done) {
        //This will be called when the rating is set
        this.setRating(rating)
        done()
    }
});


//Function when rating is confirmed
$("#rateConfirm").click(function(){
    //TODO: send to db

    //This will return the rating submitted
    pushRating(rater.getRating())

})

//This will clear the rating from the modal when closed
//(because it gets stuck to the previous rating)
$("#small").on('hidden.bs.modal', function(){
    rater.clear()
})


//TODO na ginete sort p tin arxi by date
//j na liturgi to sorting tu date p to datatable
let upcomingTable = document.querySelector('#upcomingTable');
let dataTableUp = new simpleDatatables.DataTable(upcomingTable, {
    searchable: false,
    layout: {
        top: "",
    },
    columns: [
        {
            select: 3,
            type: "datetime",
            format: "DD-MM-YYYY"
        }
    ]
});

let pasttable = document.querySelector('#pastTable');
let dataTablePast = new simpleDatatables.DataTable(pasttable, {
    searchable: false,
    layout: {
        top: "",
    },
    columns: [
        {
            select: 1,
            type: "date",
            format: "DD-MM-YYYY"
        }
    ]
});


function pushRating(rating){

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        }
      });


    $.ajax({
        url: "/my-reservations",
        type: "post",
        data: {
            'reservation_id': resv_id,
            'rate': null,
            'rating': rating,
        },
         // added data type
        success: function (data) {
            if(data == 'success'){
            //Replace button with text "Rating added"
            raterow.html("Completed")
            notification_update()
            }
        },
        error: function (data) {
            console.log(data)
            Toastify({
                text: "Oops! Something went wrong",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#3cc2b4",
            }).showToast();
        },
    });
}
