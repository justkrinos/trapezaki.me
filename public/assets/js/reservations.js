$(document).ready(function () {

    data_resv()

    $(".resvPopup").click(function () {
        //otan fernw ta data me ajax or laravel prp na fernw j to id etsi wste kathe fora
        //pu kamnei run tunto function na kamnw query to id j na allassw ta data tu modal
        $("#issueModal").modal('show')
    })

    //Popup a confirmation windows when a reservation is to be cancelled
    $("#modCancel").click(function(){
        $("#confirmModal").modal("show");
    })


    //On click sto modify reservvation tu modal
    $("#modResv").click(function () {
        //change location to the edit page
        // console.log("/edit-reservation/?id=" + parseInt($('#myresvBusiness').html(),10))

        window.location.href = "/edit-reservation/?id=" + parseInt($('#myresvBusiness').html(),10)
    })

    //Redirect when add a reservation is clicked
    $("#newRes").click(function () {
        window.location.href = "/add-reservation";
    })



    //run the colorize function stin arxi tu load
    colorizeTable()

    //Colorize runs when:
    //DATE changed
    //attendance changed
    //trigger time has passed
    //the document is loaded (stin arxi)

    $("#mydate").change(function () {
        // run the colorize function
        colorizeTable()
    })

    //If attendance changes in the modal
    $("#attendance").change(function () {
        //TODO: update the table and the database

        colorizeTable();
    })

});
