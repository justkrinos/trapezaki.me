approvedToast = Toastify({
    text: "The user is activated!",
    duration: 5000,
    close: true,
    gravity: "top",
    position: "right",
    backgroundColor: "#3cc2b4",
});

declinedToast = Toastify({
    text: "The user is disabled!",
    duration: 5000,
    close: true,
    gravity: "top",
    position: "right",
    backgroundColor: "#db0f0f",
});

$(document).ready(function () {
    var parts = window.location.href.split("/");
    var lastSegment = parts.pop() || parts.pop(); // handle potential trailing slash

    $(document).on("click", ".changeStatus", function (e) {
        e.preventDefault();
        //Get the last 2 segments of URL
        var butt = $("button#dropdownMenuButton").get();

        if ($(butt).hasClass("btn-danger")) {
            //an en to disable button
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('[name="_token"]').attr("value"),
                },
            });

            var user = lastSegment;
            //Send the request
            $.ajax({
                url: "/user/" + lastSegment,
                method: "post",
                data: {
                    username: user, //piase to username attribute
                    action: "disable",
                },
                success: function (result) {
                    //if success then continue
                    // console.log(result);
                    //approvedToast.showToast();
                    // declinedToast.showToast();
                },
            });
        } else if ($(butt).hasClass("btn-success")) {
            //an en to activate button
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('[name="_token"]').attr("value"),
                },
            });

            var user = lastSegment;
            //Send the request
            $.ajax({
                url: "/user/" + lastSegment,
                method: "post",
                data: {
                    username: user, //piase to username attribute
                    action: "activate",
                },
                success: function (result) {
                    //if success then continue

                    // console.log(result);
                    //approvedToast.showToast();
                    // approvedToast.showToast();
                },
            });
        }
    });
});


//TODO: na sasun ta console logs j na mpei oops something went wrong ama eshi prob
