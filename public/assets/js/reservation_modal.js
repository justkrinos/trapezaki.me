modalpop();


function modalpop(){

$("body").on("click", ".resvPopup", function() {
    //alert();
    //console.log($(".details").html())
    //otan fernw ta data me ajax or laravel prp na fernw j to id etsi wste kathe fora
    //pu kamnei run tunto function na kamnw query to id j na allassw ta data tu modal
    $resv_details = $(this).children(".details").html();
    $resv_id = $(this).children(".res_id").html();
    $resv_table = $(this).children(".table_no").html();
    $time = $(this).children(".timeSlot").html();

    $("#myresvTextArea").html($resv_details);
    $("#myresvBusiness").html($resv_id);
    $("#myresvType").html($resv_table);
    $("#myresvTime").html($time);

    $("#myresvModal").modal('show');

})

}


