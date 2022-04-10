
// Datatable
// Documentation on this is in
// https://github.com/fiduswriter/Simple-DataTables/wiki/


approvedToast = Toastify({
    text: 'The request has been approved! You can now see them in the Manage Customers page.',
    duration: 5000,
    close:true,
    gravity:"top",
    position: "right",
    backgroundColor: "#3cc2b4",
})

declinedToast = Toastify({
    text: 'The request has been rejected!',
    duration: 5000,
    close:true,
    gravity:"top",
    position: "right",
    backgroundColor: "#3cc2b4",
})


let table = document.querySelector("#tableSort");
let dataTable = new simpleDatatables.DataTable(table, {
    searchable: false,
    layout: {
        top: "",
    },
    columns: [
        {
            select: 1,
            type: "date",
            format: "DD/MM/YYYY",
        },
    ],
});


$(document).ready(function () {

    //TODO: na dulepsi tuto opos dulefki j sta issues

    // Click on table row
    $(".clicktoCust").click(function () {
        //fuck javascript
        //window.location.href = "/user/";
    });


    //an tsilliseis koumpi
    // $("button").click(function(e){
    $(document).on('click', 'button', function (e) {
        e.preventDefault();
        user = $(this).parents(".user") //piase to element p en ullo to row


        if ($(this).hasClass('accept')) { //an en to accept button
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').attr('value')
                }
            });

            //Send the request
            $.ajax({
                url: "/pending-requests",
                method: 'post',
                data: {
                    username: user.attr('username'), //piase to username attribute
                    action: 'accept'
                },
                success: function (result) {
                    //if success then continue
                    if (result === 'success'){
                        console.log(result)
                        index = user.index() //piase to row index
                        user.fadeOut(400, function () {
                            dataTable.rows().remove(index) //diegrapse to pu to datatable me vasi to index
                        }) //kame to fade out
                        approvedToast.showToast();
                    }else
                        console.log(result)
                }
            });

        } else if ($(this).hasClass('decline')) {
            //TODO: are you sure you want to decline?
            //The whole registretion will be deleted and they will have to make the account again
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').attr('value')
                }
            });

            //Send the request
            $.ajax({
                url: "/pending-requests",
                method: 'post',
                data: {
                    username: user.attr('username'), //piase to username attribute
                    action: 'decline'
                },
                success: function (result) {
                    //if success then continue
                    if (result === 'success'){
                        console.log(result)
                        index = user.index() //piase to row index
                        user.fadeOut(400, function () {
                            dataTable.rows().remove(index) //diegrapse to pu to datatable me vasi to index
                        }) //kame to fade out
                        declinedToast.showToast();
                    }else
                        console.log(result)
                }
            });
        }
    })
});



