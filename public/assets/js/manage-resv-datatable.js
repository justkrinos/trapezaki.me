// Datatable documentation on this is in
// https://github.com/fiduswriter/Simple-DataTables/wiki/

function data_resv(){
let table = document.querySelector('#resTable');
let dataTable = new simpleDatatables.DataTable(table, {
    searchable: false,
    layout: {
        top: "",
    },
    columns: [
        {
            select: 1,
            type: "date",
            format: "DD/MM/YYYY"
        }
    ]
});

dataTable.on('datatable.sort', function(column, direction) {
    colorizeTable()

    //Epd an to valume poupote allou en tha kamnei meta pu sort
    $(".resvPopup").click(function () { $("#issueModal").modal('show')})
});

}



//This function is used to colorize the table
function colorizeTable() {

    //TODO: Remove any previous formatting
    $("tr").each(function () {
        $(this).removeClass("table-info")
        $(this).removeClass("table-danger")
        $(this).removeClass("table-success")
    })

    trigger_time = 2000; //because max time is 24*60 + 59 = 1499

    //Get Current Time and change to minutes
    now = new Date();
    curr_time = now.getHours() * 60 + now.getMinutes()

    //Select all td elements with class=time
    $("tr > td.time").each(function () {

        //Change resv time to minutes
        resv_time = parseInt($(this).text().split(':')[0], 10) * 60 + parseInt($(this).text().split(':')[1], 10)

        //Get attendance
        attendance = parseInt($(this).siblings("td").children("span.attendance").text(), 10)

        //Get people pu enartoun
        people = parseInt($(this).siblings("td").children("span.people").text(), 10)

        //////Check if any reservations have a passed time and no attendance
        if (curr_time >= resv_time && !attendance) {
            // this <tr>'s father na allaksi class se danger
            $(this).parent().addClass("table-danger")

            //else if attendance is < people
        } else if (attendance > 0 && attendance < people) {
            // this <tr>'s father na allaksi class se info
            $(this).parent().addClass("table-info")

            //else if attendance is equal to people
        } else if (attendance == people) {
            // this <tr>'s father na allaksi class se success
            $(this).parent().addClass("table-success")
        }


        //check if its the smallest so far
        if (!attendance && (curr_time < resv_time) && (resv_time < trigger_time)) {
            trigger_time = resv_time;
        }
    })

    //If the trigger is the default, dont set a trigger
    if (trigger_time != 2000) {
        triggerSet(trigger_time - curr_time);
    }

}




//Triggers colorize everytime the closest reservation is due
//colorize function sets the trigger time again to the next closest
function triggerSet(trigger_time) {
    setInterval(colorizeTable, trigger_time * 60 * 1000); // 60 * 1000milisec = 1 minute so we calculate the minutes
}