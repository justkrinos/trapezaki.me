//otan allaksi i mera p to dropdown
$("#day").change(function () {
    //piasto value p eshi to sigkekrimeno p epilektike
    day_id = $(this).val()
    if (day_id == undefined) {
        day_id = $(this).html()
    }
    //svise to first last p iparxei
    $('.day').not('hidden.setting').addClass("hidden-setting")
    //vale to first last tis meras p epilextike
    $('#day-' + day_id).removeClass("hidden-setting")
})
