var photopaths = [];
$('#user-photos').children('.photo').each(function(){

    photopaths.push(  { src: '../assets/images/uploads/' + $(this).attr('img'), srct: '../assets/images/uploads/' + $(this).attr('img')})
})


$("#gallery").nanogallery2({
  thumbnailHeight:  150,
  thumbnailWidth:   150,
//   {{-- /TODO: na sasei to base url --}}
//   {{-- "itemsBaseURL": "http://nanogallery2.nanostudio.org/samples/", --}}

  thumbnailBorderVertical: 0,
  thumbnailBorderHorizontal: 0,
  thumbnailLabel: {
        position: "overImageOnBottom",
        display: false
    },
  thumbnailHoverEffect2: "imageBlurOn",
  galleryLastRowFull: true,
  thumbnailAlignment: "center",
  breadcrumbOnlyCurrentLevel: false,
  thumbnailOpenImage: false,

  items: photopaths
});
