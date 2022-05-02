$(document).ready(function () {
    $("#chooseCity").modal('show')
})

$(".city-option").click(function () {
    option = $(this).attr("id")
    switch (option) {
        case 'Limassol':
            $("#citySelect").prop('selectedIndex', 0);
            break;
        case 'Paphos':
            $("#citySelect").prop('selectedIndex', 1);
            break;
        case 'Larnaca':
            $("#citySelect").prop('selectedIndex', 2);
            break;
        case 'Nicosia':
            $("#citySelect").prop('selectedIndex', 3);
            break;
        case 'Famagusta':
            $("#citySelect").prop('selectedIndex', 4);
            break;
    }

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('[name="_token"]').attr("value"),
        },
    });

    $.ajax({
        url: "/api/change-city",
        method: "post",
        data: {
            'city': option
        }
    });
})
