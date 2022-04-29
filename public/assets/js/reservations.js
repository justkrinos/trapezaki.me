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

    $("#confirmed").click(function(){
        //TODO: send data to the database
        //TODO: remove the record from the table, ajax?
        //TODO: send email pu ton server
        $("#issueModal").modal('hide')
        alert("TODO THIS (in reservations.js)")
    })

    //On click sto modify reservvation tu modal
    $("#modResv").click(function () {
        //change location to the edit page
        console.log("/edit-reservation/?id=" + parseInt($('#myresvBusiness').html(),10))
        
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
        //TODO: get data if date changed

        // run the colorize function
        colorizeTable()
    })

    //If attendance changes in the modal
    $("#attendance").change(function () {
        //TODO: update the table and the database

        colorizeTable();
    })

});
