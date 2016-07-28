var locationLat=0;
var locationLng=0;
var adressValue = '';

jQuery('#map').hide();

function initMap() {

    jQuery('#button').click(function (event){
        adressValue = jQuery('#address').val();
        jQuery('#map').show();

        jQuery.get( "https://maps.googleapis.com/maps/api/geocode/json?address="+ adressValue+"&key=AIzaSyAs9-9EPpqbSPCd1_r5_lgpmNjc6EuR6Xg", function(json, textStatus) {
            locationLat = json.results[0].geometry.location.lat;
            locationLng = json.results[0].geometry.location.lng;

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

    var posStat = {lat: 49.6119523, lng: 6.075476500000036};

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

    var map2 = new google.maps.Map(document.getElementById('mapStatic'), {
        center: posStat,
        scrollwheel: true,
        zoom: 16
    });

    var marker = new google.maps.Marker({
        position: posStat,
        map: map2
    });
}

/***********************bouton scroll to top*************************/

(function ($) {
    $.fn.goTop = function (options) {

        $.fn.goTop.defaults = {
            appear: 200,
            scrolltime: 800,
            src: "glyphicon glyphicon-chevron-up",
            width: 45,
            place: "right",
            fadein: 500,
            fadeout: 500,
            opacity: 0.5,
            marginX: 2,
            marginY: 2
        };

        var opts = $.extend({}, $.fn.goTop.defaults, options);

        return this.each(function () {
            var g = $(this);
            g.html("<a id='goTopAnchor'><span id='goTopSpan' /></a>");

            var ga = g.children('a');
            var gs = ga.children('span');

            var css = {
                "position": "fixed",
                "display": "block",
                "width": "'" + opts.width + "px'",
                "z-index": "9",
                "bottom": opts.marginY + "%"
            };

            css[opts.place === "left" ? "left" : "right"] = opts.marginX + "%";

            g.css(css);

            //opacity
            ga.css("opacity", opts.opacity);
            gs.addClass(opts.src);
            gs.css("font-size", opts.width);
            gs.hide();

            //appear, fadein, fadeout
            $(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > opts.appear) {
                        gs.fadeIn(opts.fadein);
                    }
                    else {
                        gs.fadeOut(opts.fadeout);
                    }
                });

                //hover effect
                $(ga).hover(function () {
                    $(this).css("opacity", "1.0");
                    $(this).css("cursor", "pointer");
                }, function () {
                    $(this).css("opacity", opts.opacity);
                });

                //scrolltime
                $(ga).click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, opts.scrolltime);
                    return false;
                });
            });
        });
    };
})(jQuery);

$(function () {
      $('#goTop').goTop();
   });
