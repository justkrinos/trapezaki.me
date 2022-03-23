$(function() {
    function updateControls(addressComponents,currentLocation) {
        $('#lat').val(currentLocation.latitude);
        $('#long').val(currentLocation.longitude);
        $('#address').val(addressComponents.addressLine1);
        $('#city').val(addressComponents.city);
        $('#zip').val(addressComponents.postalCode);
    }

    $('#map').locationpicker({
       location: {latitude: 34.692892, longitude: 33.038593},
       radius: 0,
       inputBinding: {
        //   latitudeInput: $('#lat'),
        //   longitudeInput: $('#lng'),
          locationNameInput: $('#location')
        },
       enableAutocomplete: true,
       autocompleteOptions:{
        componentRestrictions: { country: "cy" }
       },
       autosize:true,
       onchanged: function(currentLocation, radius, isMarkerDropped) {
            var addressComponents = $(this).locationpicker('map').location.addressComponents;
            updateControls(addressComponents, currentLocation);
        },
        // oninitialized: function(component) {
        //     var addressComponents = $(component).locationpicker('map').location.addressComponents;
        //     alert(JSON.stringify(addressComponents));
        // }
    })



});

