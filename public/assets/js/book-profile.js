$(document).ready(function () {
    if (window.location.hash.match("login")) {
        $("#inlineForm").modal('show')
    }

    //Go back button
    $("#btnBack").click(function () {
        history.go(-1)
    })

    //An ise logged in fkenni tunto button
    $("#btnBook").click(function () {
        window.open('/seven-seas/book');
    })

    //An den ise logged in fkenni tunto button
    $("#btnPop").click(function () {
        $("#inlineForm").modal('show')
    })

    $("#resvMenu").click(function () {
        alert("TODO");
        window.open("/TODO", '_blank').focus();
    })

    // $("#btnLogin").click(function (e) {
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //     alert("ok");
    //     $.ajax({
    //         url: "/login_popup",
    //         method: 'post',
    //         data: {
    //             username: $('#username').val(),
    //             password: $('#password').val()
    //         },
    //         success: function (result) {
    //             console.log(result);
    //         }
    //     });

    // });

    //Post sto /login
    //when success -> redirect sto /seven-seas/book
    //when fail    -> return fail message stin idia selida xoris refresh


})
