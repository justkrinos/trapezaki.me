$(document).ready(function () {
    var back = document.referrer
    if (window.location.hash.match("login")) {
        $("#inlineForm").modal('show')
    }

    //Go back button
    $("#btnBack").click(function () {
        window.location.href = back;
    })

    //An ise logged in fkenni tunto button
    $("#btnBook").click(function () {
        var username = $(this).attr('user')
        window.location.href = '/user/' + username + '/book/';
    })

    //An den ise logged in fkenni tunto button
    $("#btnPop").click(function () {
        $("#inlineForm").modal('show')
    })

    $("#resvMenu").click(function () {
        alert("TODO");
        window.open("/TODO", '_blank').focus();
    })


    //Verify login
    $(document).on('click', '#btnLogin', function (e) {

        //Check if fields are empty
        if ($('#username').val() === "") {
            $('#login-error').html("Username cannot be empty");
            return
        }

        if ($('#password').val() === "") {
            $('#login-error').html("Password cannot be empty");
            return
        }
        //Prevent html5 from sending the request
        e.preventDefault();

        //Prepare the csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').attr('value')
            }
        });

        //Send the request
        $.ajax({
            url: "/login_popup",
            method: 'post',
            data: {
                username: $('#username').val(),
                password: $('#password').val()
            },
            success: function (result) {
                //if success then continue
                if (result === 'success'){
                    var business = $('#btnPop').attr("user")
                    window.location.href = "/user/" + business + "/book";
                }
                //if fail then show error msg
                else
                    $('#login-error').html(result);
            },
        });

    });

    //Verify guest
    $(document).on('click', '#btnGuest', function (e) {

        //Prevent html5 from sending the request
        e.preventDefault();

        //Prepare the csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').attr('value')
            }
        });

        //Send the request
        $.ajax({
            url: "/guest_popup",
            method: 'post',
            data: {
                full_name: $('#full_name').val(),
                phone: $('#phone').val(),
                email: $('#email').val()
            },
            success: function (result) {
                //if success then continue
                if (result === 'success'){
                    var business = $('#btnPop').attr("user")
                    window.location.href = "/" + business + "/book";
                }
            },

            //aman ginete me javascript to request
            //tote erkete piso me status 422 je san json dia ta messages
            //ta messages tuta piannw ta mesto blade mesw javascript
            error: function(data){
                if( data.status === 422 ) {
                    var errors = $.parseJSON(data.responseText)

                    $('#full_name').removeClass("is-invalid")
                    $('#phone').removeClass("is-invalid")
                    $('#email').removeClass("is-invalid")


                    $.each(errors.errors, function (key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key + "-error").html(value);
                    });
                }
            }
        });

    });

})
