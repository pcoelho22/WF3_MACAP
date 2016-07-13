/*$(function() {
    $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=Avenue des Bains, Mondorf-les-Bains&key=AIzaSyCSN97AbSZ0KcmYVo5-eOZO2RvuZY6DZzI', function(json, textStatus) {
        lat = json.results[0].geometry.location.lat;
        lng = json.results[0].geometry.location.lng;
    });
});*/

var locationLat=0;
var locationLng=0;
var adressValue = '';
/*jQuery.get( "https://maps.googleapis.com/maps/api/geocode/json?address=Avenue des Bains, Mondorf-les-Bains&key=AIzaSyCSN97AbSZ0KcmYVo5-eOZO2RvuZY6DZzI", function(json, textStatus) {
    locationLat = json.results[0].geometry.location.lat;
    locationLng = json.results[0].geometry.location.lng;

    //lancement itinéraire

    //return [locationLat, locationLng];
} );*/



function initMap() {

    /*jQuery.get( "https://maps.googleapis.com/maps/api/geocode/json?address=Avenue des Bains, Mondorf-les-Bains&key=AIzaSyCSN97AbSZ0KcmYVo5-eOZO2RvuZY6DZzI", function(json, textStatus) {
        global:locationLat = json.results[0].geometry.location.lat;
        global:locationLng = json.results[0].geometry.location.lng;

        console.log(locationLat);
        console.log(locationLng);
    } );*/

    jQuery('#button').click(function (event){
        adressValue = jQuery('#adresse').val();
        console.log(adressValue);

        jQuery.get( "https://maps.googleapis.com/maps/api/geocode/json?address="+ adressValue+"&key=AIzaSyCSN97AbSZ0KcmYVo5-eOZO2RvuZY6DZzI", function(json, textStatus) {
            locationLat = json.results[0].geometry.location.lat;
            locationLng = json.results[0].geometry.location.lng;

            console.log(locationLat);
            console.log(locationLng);
            //lancement itinéraire

            //return [locationLat, locationLng];


            var concours = {lat: 49.5030743, lng: 6.2818691};
            var pos = {lat: locationLat, lng: locationLng};

            var styleArray = [
                {
                    featureType: "all",
                    stylers: [
                        { saturation: -80 }
                    ]
                },{
                    featureType: "road.arterial",
                    elementType: "geometry",
                    stylers: [
                        { hue: "#00ffee" },
                        { saturation: 50 }
                    ]
                },{
                    featureType: "poi.business",
                    elementType: "labels",
                    stylers: [
                        { visibility: "off" }
                    ]
                }
            ];

            var map = new google.maps.Map(document.getElementById('map'), {
                center: concours,
                scrollwheel: true,
                zoom: 6
            });

            var directionsDisplay = new google.maps.DirectionsRenderer({
                map: map
            });

            // Set destination, origin and travel mode.
            var request = {
                destination: concours,
                origin: pos,
                travelMode: google.maps.TravelMode.DRIVING
            };

            // Pass the directions request to the directions service.
            var directionsService = new google.maps.DirectionsService();
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    // Display the route on the map.
                    directionsDisplay.setDirections(response);
                }
            });
        } );
    });


}