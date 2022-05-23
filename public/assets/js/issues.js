$(document).ready(function () {

    $(document).on("click", ".issueName", function () {
        //otan fernw ta data me ajax or laravel prp na fernw j to id etsi wste kathe fora
        //pu kamnei run tunto function na kamnw query to id j na allassw ta data tu modal
        $description = $(this).siblings(".issue-description").html();
        $issuer = $(this).siblings(".issue-business").html();
        $type = $(this).siblings(".issue-type").html();

        $("#issueTextArea").html($description);
        $("#issueBusiness").html($issuer);
        $("#issueType").html($type);

        $("#issueModal").modal('show');
    })

    $("#issueBusiness").click(function () {
        window.location.href = "/user" + "/" + $(this).html();
    })


    //When a key is pressed in the input field, run the function
    $("#SearchIssue").keyup(SearchIssue);

    //When the Solved  button is checked run the function
    $("#checkSolved").click(SolCheckbox);

    //When the Cant' ... button is checked run the function
    $("#checkCant").click(CantCheckbox);

    //When the Not Flagged button is checked run the function
    $("#checkNot").click(NotCheckbox);




    //Search with first priority the search bar an then the check boxes
    function SearchIssue() {
        var table, tr, filter, tdFilter, tdCheck, i, checkSol, checkCant, filterAct, filterDis, txtCheck, txtFilter, checkNot;
        checkSol = document.getElementById("checkSolved");
        checkCant = document.getElementById("checkCant");
        checkNot = document.getElementById("checkNot");

        table = document.getElementById("issueTable");
        tr = table.getElementsByTagName("tr");

        filter = document.getElementById("SearchIssue").value.toUpperCase();

        for (i = 0; i < tr.length; i++) {
            tdFilter = tr[i].getElementsByTagName("td")[0];
            tdCheck = tr[i].getElementsByTagName("td")[6];

            //Start filtering the search box
            if (tdFilter) {
                txtFilter = tdFilter.textContent || tdFilter.innerText;

                if (txtFilter.toUpperCase().indexOf(filter) > -1)
                    tr[i].style.display = "";
                else
                    tr[i].style.display = "none";
            }

            //Start filtering the check boxes
            if (checkCant.checked || checkSol.checked || checkNot.checked) {

                if (tdCheck) {

                    tdCheck = tdCheck.getElementsByTagName("button");
                    if (tr[i].style.display != "none") {
                        if (
                            (tdCheck[0].classList.contains("active") && checkSol.checked) ||
                            (tdCheck[1].classList.contains("active") && checkCant.checked) ||
                            ((!tdCheck[0].classList.contains("active") && !tdCheck[1].classList.contains("active")) && checkNot.checked)
                        )
                            tr[i].style.display = "";
                        else
                            tr[i].style.display = "none";
                    }
                }
            }
        }
    }


    //If checked to active, uncheck to allo j search issue
    function SolCheckbox() {
        checkCant = document.getElementById("checkCant");
        checkSol = document.getElementById("checkSolved");
        checkNot = document.getElementById("checkNot");
        // console.log(checkSol);
        if (checkCant.checked == true)
            checkCant.checked = false
        if (checkNot.checked == true)
            checkNot.checked = false
        SearchIssue()
    }

    //If checked to disabled, uncheck to allo j search issue
    function CantCheckbox() {
        checkSol = document.getElementById("checkSolved");
        checkCant = document.getElementById("checkCant");
        checkNot = document.getElementById("checkNot");

        if (checkSol.checked == true)
            checkSol.checked = false
        if (checkNot.checked == true)
            checkNot.checked = false
        SearchIssue()
    }


    function NotCheckbox() {
        checkSol = document.getElementById("checkSolved");
        checkCant = document.getElementById("checkCant");
        checkNot = document.getElementById("checkNot");

        if (checkCant.checked == true)
            checkCant.checked = false
        if (checkSol.checked == true)
            checkSol.checked = false
        SearchIssue()
    }

});



// Datatable
// Documentation on this is in
// https://github.com/fiduswriter/Simple-DataTables/wiki/

let table3 = document.querySelector('#issueTable');
let dataTable3 = new simpleDatatables.DataTable(table3, {
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

dataTable3.on("datatable.sort", function (column, direction) {
    if ($("#checkSolved").is(":checked"))
        SolCheckbox()

    if ($("#checkCant").is(":checked"))
        CantCheckbox()

    if ($("#checkNot").is(":checked"))
        NotCheckbox()
});

//Ana allaksi selida pale na eshi listeners
dataTable3.on("datatable.page", function () {
    //Listeners gia na stili to request
    $(".notSolved-flag").click(sendFlag)
    $(".solved-flag").click(sendFlag)
})




//Listeners gia na stili to request
$(".notSolved-flag").click(sendFlag)
$(".solved-flag").click(sendFlag)


//function gia na stili to request
function sendFlag() {
    //An en active to button kame to na gini not active
    if ($(this).hasClass("active"))
        issueFlag = 0;
    else
    //An denen active tote kame to na gini active
        issueFlag = $(this).val();


    issueId = $(this).parent().siblings("[name='id']").val()

    buttonPressed = $(this)

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('[name="_token"]').attr("value"),
        },
    });

    //Send the flag
    $.ajax({
        url: "/issues",
        method: "post",
        data: {
            'id': issueId,
            'status': issueFlag
        },
        success: function (result) {
            //fie to active p to allo to button (an eshi)
            buttonPressed.siblings(".active").removeClass("active")
            //vale to active to button p epatithike
            buttonPressed.toggleClass("active")
        }
    });
}

