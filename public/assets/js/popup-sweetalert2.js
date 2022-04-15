document.getElementsByClassName("rectangle")[0].addEventListener("click", (e) => {
        popup = Swal.fire({
            title: "Enter the table details",
            html:
                '<label class="me-3">Table Capacity</label>' +
                '<input id="capacity" class="swal2-input" type="number" min=2 max=16 >' +
                '<label class="me-3">Table Number</label>' +
                '<input id="table_no" class="swal2-input" type="number" min=1 >',
            focusConfirm: false,
            inputValidator: (value) => {
                return new Promise((resolve) => {
                    resolve("okokok");
                });
            },
            preConfirm: () => {
                //piasta values pu ta elements me javascript j kame ta int
                capacity = parseInt(document.getElementById("capacity").value);
                table_no = parseInt(document.getElementById("table_no").value);

                //Check capacity in range of 2-16 and tabe no in range >0
                if (
                    capacity <= 16 &&
                    capacity >= 2 &&
                    typeof capacity == "number"
                ) {
                    //check an to trapezi en tulaxisto 1 j en arithmos
                    if (table_no > 0 && typeof table_no == "number") {
                        return { 'capacity': capacity, 'table_no': table_no };
                    } else
                        Swal.showValidationMessage(
                            "The table number must be atleast 1"
                        ); //show error gia to table
                } else
                    Swal.showValidationMessage(
                        "You need to select a number between 2 and 16"
                    ); //shwo error gia to capacity
            },
        }).then((result) => {
            //If they clicked ok
            if (result.isConfirmed) {
                //generate id for the table and save it to the db
                saveAndGetId(result.value.capacity, result.value.table_no, 'rect');
            }
        });
    });

//For circles
document.getElementsByClassName("circle")[0].addEventListener("click", (e) => {
  popup = Swal.fire({
    title: "Enter the table details",
    html:
        '<label class="me-3">Table Capacity</label>' +
        '<input id="capacity" class="swal2-input" type="number" min=2 max=16 >' +
        '<label class="me-3">Table Number</label>' +
        '<input id="table_no" class="swal2-input" type="number" min=1 >',
    focusConfirm: false,
    inputValidator: (value) => {
        return new Promise((resolve) => {
            resolve("okokok");
        });
    },
    preConfirm: () => {
        //piasta values pu ta elements me javascript j kame ta int
        capacity = parseInt(document.getElementById("capacity").value);
        table_no = parseInt(document.getElementById("table_no").value);

        //Check capacity in range of 2-16 and tabe no in range >0
        if (
            capacity <= 16 &&
            capacity >= 2 &&
            typeof capacity == "number"
        ) {
            //check an to trapezi en tulaxisto 1 j en arithmos
            if (table_no > 0 && typeof table_no == "number") {
                return { 'capacity': capacity, 'table_no': table_no };
            } else
                Swal.showValidationMessage(
                    "The table number must be atleast 1"
                ); //show error gia to table
        } else
            Swal.showValidationMessage(
                "You need to select a number between 2 and 16"
            ); //shwo error gia to capacity
    },
}).then((result) => {
    //If they clicked ok
    if (result.isConfirmed) {
        //generate id for the table and save it to the db
        saveAndGetId(result.value.capacity, result.value.table_no, 'circle');
    }
});
});

function saveAndGetId(capacity, table_no, shape) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('[name="_token"]').attr("value"),
        },
    });

    $.ajax({
        url: "/user/" + username + "/floor-plan",
        method: "post",
        // dataType: "json",
        data: {
            'capacity': capacity,
            'table_no': table_no,
            'getId': true,
        },
        success: function (tableID) {
            var o
            //Create the table and set its capacity and table no
            if (shape =="rect"){
              o = addRect(0, 0, 60, 60, table_no);
            }else if(shape == "circle"){
              o = addCircle(0, 0, 60, table_no);
            }            
            o.set("capacity", capacity);
            o.set("number", table_no);
            o.set("id", tableID);

            //show it in canvas
            canvas.setActiveObject(o);
        },
        error: function (err) {
            Toastify({
                //an exw error fkale toast
                text: "Oops! Something went wrong :(",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#3cc2b4",
            }).showToast();
        },
    });
}
