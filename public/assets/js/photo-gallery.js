var photopaths = [];
$("#user-photos")
    .children(".photo")
    .each(function () {
        photopaths.push({
            src: "../assets/images/uploads/" + $(this).attr("img"),
            srct: "../assets/images/uploads/" + $(this).attr("img"),
        });
    });

console.log(photopaths);

$("#gallery").nanogallery2({
    thumbnailHeight: 150,
    thumbnailWidth: 150,

    thumbnailBorderVertical: 0,
    thumbnailBorderHorizontal: 0,
    thumbnailLabel: {
        position: "overImageOnBottom",
        display: false,
    },
    thumbnailHoverEffect2: "imageBlurOn",
    galleryLastRowFull: true,
    thumbnailAlignment: "center",
    breadcrumbOnlyCurrentLevel: false,
    thumbnailOpenImage: false,

    items: photopaths,
});
