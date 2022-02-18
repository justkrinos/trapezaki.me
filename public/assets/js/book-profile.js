$(document).ready(function() {

    //Go back button
    $("#btnBack").click(function() {
        history.go(-1)
    })

    $("#btnBook").click(function() {
        //TODO: check if logged in
        // if not then open modal
        $("#inlineForm").modal('show')
        
        //TODO: after log in redirect
    })

    $("#resvMenu").click(function(){
        alert("TODO");
        window.open("/TODO", '_blank').focus();
    })
})