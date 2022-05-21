$(function () {
    function updateControls(addressComponents, currentLocation) {
        $('#lat').val(currentLocation.latitude);
        $('#long').val(currentLocation.longitude);
        $('#address').val(addressComponents.addressLine1);
        $('#city').val(addressComponents.city);
        $('#postal').val(addressComponents.postalCode);
    }

    if( $("#lat").attr('value') == "" || $("#long").attr('value') == ""){
        LatLong = {latitude: 34.692892, longitude: 33.038593}
    }
    else{
        LatLong = { latitude: $("#lat").attr('value'), longitude: $("#long").attr("value") };
    }
    $('#map').locationpicker({
        location: LatLong,
        radius: 0,
        inputBinding: {
            //   latitudeInput: $('#lat'),
            //   longitudeInput: $('#lng'),
            locationNameInput: $('#location')
        },
        enableAutocomplete: true,
        autocompleteOptions: {
            componentRestrictions: { country: "cy" }
        },
        autosize: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            var addressComponents = $(this).locationpicker('map').location.addressComponents;
            updateControls(addressComponents, currentLocation);
        },
        oninitialized: function(component) {
            $("#location").val("");
        }
    })



});

