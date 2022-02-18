$(function() {
 
    $('#us2').locationpicker({
       location: {latitude: 34.692892, longitude: 33.038593},   
       radius: 0,
       inputBinding: {
          latitudeInput: $('#lat'),
          longitudeInput: $('#lng'),
          locationNameInput: $('#location')
        },
       enableAutocomplete: true,
       autosize:true,
       onchanged: function(currentLocation, radius, isMarkerDropped) {
          alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
        }
    })

     

});
    