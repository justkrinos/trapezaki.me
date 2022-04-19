$(document).ready(function () {

    $(".tabs").click(function () {
        $(".tabs").removeClass("active");
        //$("#inputSlots")

        $(".tabs h5").removeClass("font-weight-bold");
        $(".tabs h5").addClass("text-muted");
        $(this).children("h5").removeClass("text-muted");
        $(this).children("h5").addClass("font-weight-bold");
        $(this).addClass("active");
        current_fs = $(".active");
        next_fs = $(this).attr("id");
        next_fs = "#" + next_fs + "1";
        $("fieldset").removeClass("show");
        $(next_fs).addClass("show");
        //findTimeSlots();
        
        //remove selection from one and take it to the other
        if($(this)[0].id == "tab02"){
            var slots = $("#timeSlots")[0];
            $("#timeSlots2").html(slots.innerHTML);
            $("#timeSlots").empty();
        }
        else if($(this)[0].id == "tab01"){
            var slots = $("#timeSlots2")[0];
            $("#timeSlots").html(slots.innerHTML);
            $("#timeSlots2").empty();
        }
        
        current_fs.animate(
            {},
            {
                step: function () {
                    current_fs.css({
                        display: "none",
                        position: "relative",
                    });
                    next_fs.css({
                        display: "block",
                    });
                },
            }
        );
    });
});
