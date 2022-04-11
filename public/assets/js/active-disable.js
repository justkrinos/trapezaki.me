approvedToast = Toastify({
    text: 'User is activated!',
    duration: 5000,
    close:true,
    gravity:"top",
    position: "right",
    backgroundColor: "#3cc2b4",
})

declinedToast = Toastify({
    text: 'User is disabled!',
    duration: 5000,
    close:true,
    gravity:"top",
    position: "right",
    backgroundColor: "#db0f0f",
})
$(document).ready(function () {
    var parts = window.location.href.split('/');
    var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash

    console.log(lastSegment);

    $(document).on('click', '.dropdown', function (e) {
    e.preventDefault();
    //Get the last 2 segments of URL
    console.log($("button#dropdownMenuButton").get());
    var butt = $("button#dropdownMenuButton").get();
    console.log($(butt).hasClass("btn-danger"));
    
        if ($(butt).hasClass("btn-danger")) { //an en to disable button
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').attr('value')
                }
            });
            
            var user = lastSegment;
            //Send the request
            $.ajax({
                url: "/user/"+lastSegment,
                method: 'post',
                data: {
                    username: user, //piase to username attribute
                    action: 'disable'
                },
                success: function (result) {
                    //if success then continue
                    console.log(result)
                    //approvedToast.showToast();
                    declinedToast.showToast();
                 
                }
            });
        }
        else if($(butt).hasClass("btn-success")){ //an en to activate button
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').attr('value')
                }
            });
            
            var user = lastSegment;
            //Send the request
            $.ajax({
                url: "/user/"+lastSegment,
                method: 'post',
                data: {
                    username: user, //piase to username attribute
                    action: 'activate'
                },
                success: function (result) {
                    //if success then continue
                   
                    console.log(result)
                    //approvedToast.showToast();
                    approvedToast.showToast();
                 
                }
            });
        }
});
});