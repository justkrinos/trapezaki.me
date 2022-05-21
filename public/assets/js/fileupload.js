//Ajax call otan kamneis delete mia photo
$("ul.images").on("click", "li span.del", function () {
    var photo = $(this).parent();

    var photo = $(this).parent();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('[name="_token"]').attr("value"),
        },
    });
    //TODO: MESA STO deleteData prepei kapws na mpainei kai to path.
    deleteData = {
        user_id: $(".user_id").attr("value"),
        action: "delete",
        photo_path: photo.attr("img")
    }
    console.log(deleteData);
    $.ajax({
        url: "/api/photo-modify",
        type: "post",
        data: deleteData,
        dataType: "json", // added data type
        success: function (data) {
            //console.log(data)
            Toastify({
                text: "Photo deleted.",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #f6d365 0%, #fda085 100%)",
            }).showToast()

            photo.fadeOut(300, function () {
                photo.remove();
            });
        },
        error: function (data) {
            //console.log(data)
            Toastify({
                text: "You can't delete the last photo!",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #f5210a 0%, #c40000 100%)",
            }).showToast()
        }
    });
});

$("ul.images").on("click", "li span.view", function () {
    var photo = $(this).parent();
    // Get the modal
    var modal = document.getElementById("photo-popup");

    var modalImg = document.getElementById("img01");

    modal.style.display = "block";
    modalImg.src = "../assets/images/uploads/" + photo.attr("img");
});

function loadPhotos() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('[name="_token"]').attr("value"),
        },
    });

    $.ajax({
        url: "/api/photo-paths",
        type: "GET",
        data: {
            user_id: $(".user_id").attr("value"),
        },
        dataType: "json", // added data type
        success: function (photos) {
            $(".images").empty();
            for (const photo of photos) {
                $(".images").append(
                    '<li style="background-image: url(../assets/images/uploads/' +
                        photo.photo_path +
                        ');"  img="' +
                        photo.photo_path +
                        '" class="aimg"><span class="view">VIEW</span><span class="del">DELETE</span></li>'
                );
            }
        },
        error: function (data) {
            console.log(data.responseText);
        },
    });
}
loadPhotos();


//Ajax call otan kamneis upload mia photo
$("#image-upload-form").on("submit", function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('[name="_token"]').attr("value"),
        },
    });

    //Get file
    var myfile = document.getElementById("upload_photo");
    var files = myfile.files;
    var formData = new FormData();
    var file = files[0];
    formData.append("photo", file, file.name);
    formData.append("user_id", $(".user_id").attr("value"));
    formData.append("action", "modify");

    $.ajax({
        type: "POST",
        url: "/api/photo-modify",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $("#upload_photo").removeClass("is-invalid");
            loadPhotos();
        },
        error: function (data) {
            if (data.status === 422) {
                var errors = $.parseJSON(data.responseText);

                $("#upload_photo").addClass("is-invalid");
                // console.log(errors);
                $("#upload-photo-error").html(errors.errors.photo[0]);
            }
        },
    });
});

$("#upload_photo").on("change", function () {
    $("#image-upload-form").submit();
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    document.getElementById("photo-popup").style.display = "none";
};


if($('#footer').length){
    $('#footer').attr('id','')
}
