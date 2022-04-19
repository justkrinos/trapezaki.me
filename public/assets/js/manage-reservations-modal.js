$(document).ready(function () {

    $("#mydate").val($("#mydate").attr('value'))

    $("#mydate").change(function(){
        date = $("#mydate").val();
        console.log(date);
        $("#dateInput").trigger('submit');
    })


    modalpop();


    function modalpop(){

    $(document).on("click", ".resvPopup", function() {
        //alert();
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

        $("#myresvTextArea").html(resv_details);
        $("#myresvBusiness").html(resv_id);
        $("#myresvType").html(resv_table);
        $("#myresvTime").html(time);
        $("#customerName").html(customerName);
        $("#phone").html(phone);
        $("#people").html("/"+people);

        $("#FormCancel").append("<input name=\"reservation_id\" value=\"" + resv_id + "\" hidden>")
        $("#resvPopup").modal('show');

    })

    }

})
