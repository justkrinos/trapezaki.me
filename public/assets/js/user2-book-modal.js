var book = document.getElementById("btnBook");

book.addEventListener("click", bookTable);

function bookTable() {
    var guest = !$("#tab01").attr("class").includes("active");
    console.log(guest);

    var date = $("#resv-date")[0].value;
    var timeSlot = $('input[sel="selected"]').attr("id");
    var table = canvas.getActiveObject().id;
    var pax = document.getElementById("pax").value;

    if (!guest) {
        var user3_username = document.getElementById("user3_username").value;
        var description = document.getElementById("description").value;
        console.log(description)
        var data = {
            date: date,
            time: timeSlot,
            table_id: table,
            user3_username: user3_username,
            details: description,
            pax: pax,
        };
        console.log(data);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('input[name="_token"]').attr("value"),
            },
        });

        $.ajax({
            type: "POST",
            url: "/add-reservation",
            data: data,
            success: function (success) {
                sessionStorage.setItem("success", "The reservation has been added successfully.");
                window.location.href = "/manage-reservations/";
                //window.location.href = "/reservation/" + success.user3_id + "/" + success.id;
                $("#user3_username").removeClass("is-invalid");
                $("#resvModal").modal("hide");
            },
            error: function (error) {
                console.log(error);

                $("#user3_username").removeClass("is-invalid");
                $("#timeSlots").removeClass("is-invalid");
                $("#description").removeClass("is-invalid");

                if (error.responseJSON.errors.user3_username) {
                    $("#user3_username").addClass("is-invalid");
                    $("#user3_username").next().html(error.responseJSON.errors.full_name);
                }

                if (error.responseJSON.errors.time) {
                    $("#timeSlots").addClass("is-invalid");
                    $("#timeSlots").next().html(error.responseJSON.errors.time);
                }

                if (error.responseJSON.errors.details) {
                    $("#description").addClass("is-invalid");
                    $("#description").next().html(error.responseJSON.errors.details);
                }


                // if(success == "success")
                // {
                //     toast.success(data.message);
                //     setTimeout(function(){
                //         window.location.href = "/";
                //     }, 2000);
                // }
                // else
                // {
                //     console.log("lathos");
                //     toast.error(data.message);
                // }
            },
        });
    } else {
        //Guest book by User2
        var guest_fullname = document.getElementById("fullname").value;
        var guest_email = document.getElementById("email").value;
        var guest_phone = document.getElementById("phone").value;
        var description = document.getElementById("description_guest").value;
        var guest_pax = document.getElementById("guest_pax").value;
        var data = {
            guest: 1,
            date: date,
            time: timeSlot,
            table_id: table,
            full_name: guest_fullname,
            email: guest_email,
            phone: guest_phone,
            details: description,
            pax: guest_pax,
        };
        console.log(data);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('input[name="_token"]').attr("value"),
            },
        });

        $.ajax({
            type: "POST",
            url: "/add-reservation",
            data: data,
            success: function (success) {
                sessionStorage.setItem("success", "The reservation has been added successfully.");
                window.location.href = "/manage-reservations/";
            },
            error: function (error) {
                $("#fullname").removeClass("is-invalid");
                $("#email").removeClass("is-invalid");
                $("#phone").removeClass("is-invalid");
                $("#description_guest").removeClass("is-invalid");
                $("#timeSlots2").removeClass("is-invalid");

                //Error handling
                if (error.responseJSON.errors.full_name) {
                    $("#fullname").addClass("is-invalid");
                    $("#fullname").next().html(error.responseJSON.errors.full_name);
                }
                if (error.responseJSON.errors.email) {
                    $("#email").addClass("is-invalid");
                    $("#email").next().html(error.responseJSON.errors.email);
                }

                if (error.responseJSON.errors.phone) {
                    $("#phone").addClass("is-invalid");
                    $("#phone").next().html(error.responseJSON.errors.phone);
                }

                if (error.responseJSON.errors.details) {
                    $("#description_guest").addClass("is-invalid");
                    $("#description_guest").next().html(error.responseJSON.errors.details);
                }

                if (error.responseJSON.errors.time) {
                    $("#timeSlots2").addClass("is-invalid");
                    $("#timeSlots2").next().html(error.responseJSON.errors.time);
                }
W
            },
        });
    }
}

//An klisei to modal tote na fiun ta error messages
$('#resvModal').on('hidden.bs.modal', function () {
    $("#user3_username").removeClass("is-invalid");
    $("#timeSlots").removeClass("is-invalid");
    $("#description").removeClass("is-invalid");
    $("#fullname").removeClass("is-invalid");
    $("#email").removeClass("is-invalid");
    $("#phone").removeClass("is-invalid");
    $("#description_guest").removeClass("is-invalid");
    $("#timeSlots2").removeClass("is-invalid");
  })
