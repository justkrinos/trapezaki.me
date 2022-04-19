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
        $('.date-slide').val(newDate)
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

    //TODO send to api the date to find tables with no availability and return them as an array here
    canvas.getObjects("table").filter(obj => obj.type === 'table').forEach(obj => {
        //TODO gia kahe table checkarw an to id (obj.id) tu en idio me kapia pu to array p epiasa
        //     tote na kamw kochino to border tou

        //Me tuta ginete kochino to border j to selection
        // obj.borderColor = '#cf1d1d'
        // obj._objects[0].set("stroke", '#cf1d1d')

        //To set custom or non-custom parameters
        // obj.set('krinos',100)
        // obj.get('krinos')
      })
    canvas.renderAll() //me tuto ginunte apply oi allages
}