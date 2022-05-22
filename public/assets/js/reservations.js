$(document).ready(function () {

    data_resv()

    //Otan ginei click se ena row na emfanistei to modal
    $(".resvPopup").click(function () {
        $("#issueModal").modal('show')
    })

    //Popup a confirmation windows when a reservation is to be cancelled
    $("#modCancel").click(function(){
        $("#confirmModal").modal("show");
    })


    //On click sto modify reservvation tu modal
    $("#modResv").click(function () {
        //get the reservation date
        sessionStorage.setItem("date", $("#mydate").val());
        //change location to the edit page
        window.location.href = "/edit-reservation/?id=" + parseInt($('#myresvBusiness').html(),10)
    })

    //Redirect when add a reservation is clicked
    $("#newRes").click(function () {
        //save the current date
        sessionStorage.setItem("date", $("#mydate").val());
        //change location to the add page
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
