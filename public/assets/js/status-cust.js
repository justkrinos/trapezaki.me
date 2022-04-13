//On click j on document ready na ginunte

//TODO:

// On click active -> change text to active
//                   -> remove class btn-success or btn-danger or btn-secondary
//                   -> add class btn-success
//                   -> if disabled, enable button

// On click disabled -> change text to disabled
//                   -> remove class btn-success or btn-danger or btn-secondary
//                   -> add class btn-danger
//                   -> if disabled, enable button

// On pending        -> change text to pending
//                   -> remove class btn-success or btn-danger or btn-secondary
//                   -> add class btn-secondary
//                   -> disable button


$(document).ready(function(){

    //Check if its a pending customer and disable the button
    if ($("#dropdownMenuButton").text().trim() === "Pending"){
        $("#dropdownMenuButton").prop('disabled',true);
        $("#dropdownMenuButton").removeClass("btn-danger");
        $("#dropdownMenuButton").removeClass("btn-success");
        $("#dropdownMenuButton").addClass("btn-secondary");
    }

    $("#cust-disabled").click(function(){
        $("#dropdownMenuButton").text("Disabled")
        $("#dropdownMenuButton").removeClass("btn-secondary");
        $("#dropdownMenuButton").removeClass("btn-success");
        $("#dropdownMenuButton").addClass("btn-danger");
    });

    $("#cust-active").click(function(){
        $("#dropdownMenuButton").text("Active")
        $("#dropdownMenuButton").removeClass("btn-secondary");
        $("#dropdownMenuButton").removeClass("btn-danger");
        $("#dropdownMenuButton").addClass("btn-success");
    });


 });


$('#btnFloorPlan').click(function(){
    username = $(this).attr('username')
    window.location.replace('/user/' + username + '/floor-plan');
});
