
if(sessionStorage.getItem("date")){
    $('#resv-date').val(sessionStorage.getItem("date"))
    sessionStorage.removeItem('date');
}

//Forward-backward  buttons
$(function () {
    $('.next-day').on('click', function () {
        var date = new Date($('.date-slide').val());

        date.setDate(date.getDate() + 1)

        var month = date.getMonth() + 1;
        var day = date.getDate();
        var year = date.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var newDate = year + '-' + month + '-' + day;

        var maxDate = new Date($('.date-slide').attr('max'))//.toISOString().split('T')[0];
        if(maxDate >= date){
            $('.date-slide').val(newDate)
        }
        updateTableAvailability()
    });
    $('.prev-day').on('click', function () {
        var date = new Date($('.date-slide').val());

        if (Date.now() <= date.getTime()) {
            date.setDate(date.getDate() - 1)
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var year = date.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var newDate = year + '-' + month + '-' + day;
            $('.date-slide').val(newDate)
            updateTableAvailability()
        }
    });
});


$('#resv-date').on('change', updateTableAvailability)

function updateTableAvailability(){
    //send to api the date to find tables with no availability and return them as an array here
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        }
    });

    $.ajax({
        type: "GET",
        url: "/api/" + username + "/availability",
        data: {
            'date' : $('.date-slide').val()
        },
        success: function (result) {
            renderUnavailableTables(result);

        },
        error: function (error) {
            Toastify({ //an exw error fkale toast
                text: 'Oops! Something went wrong',
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#db0f0f",
            }).showToast();
        }
    });

}


function renderUnavailableTables(availability){
    //check for each table if unavailable
    canvas.getObjects().filter(obj => obj.visualType === "table").forEach(obj => {
        //reset its colors
        obj.borderColor = "#38A62E"
        obj._objects[0].set("stroke","#151a30")

        availability.forEach( table_id => {
            if(obj.id == table_id){
                //if unavailable then set red borders
                obj.borderColor = '#cf1d1d'
                obj._objects[0].set("stroke", '#cf1d1d')
            }
        })

      })
    canvas.renderAll();
}
