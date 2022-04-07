
data_resv();
modalpop();


function modalpop(){
$(".probPopup").click(function () {
    //otan fernw ta data me ajax or laravel prp na fernw j to id etsi wste kathe fora
    //pu kamnei run tunto function na kamnw query to id j na allassw ta data tu modal

    $descriptionProblem = $(this).siblings(".problem-description").html();
    $typeProblem = $(this).siblings(".problem-type").html();


    $("#issueTextArea").html($descriptionProblem);
    $("#issueType").html($typeProblem);

    $("#probModal").modal('show');

})

}


function data_resv() {
    let table = document.querySelector('#probTable');
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
        modalpop();
    });

}

