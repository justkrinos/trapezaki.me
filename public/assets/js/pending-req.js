$(document).ready(function () {

    // Click on table row
    $(".clicktoCust").click(function () {
        window.location.href = "user1-manage_customer.html"
    })

});



// Datatable
// Documentation on this is in
// https://github.com/fiduswriter/Simple-DataTables/wiki/

let table2 = document.querySelector('#tableSort');
let dataTable2 = new simpleDatatables.DataTable(table2, {
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