function initMap() {
var mapProp= {
    center:new google.maps.LatLng(51.024902, 4.479083),
    zoom:15,
    zoomControl: false,
    mapTypeControl: false,
    scaleControl: false,
    streetViewControl: false,
    rotateControl: false,
    fullscreenControl: false,
    styles: [{"featureType": "landscape", "elementType": "all", "stylers": [{
            "hue": "#FFA800"},{"gamma": 1}]},{"featureType": "poi","elementType": "all","stylers": [{"hue": "#679714"},{"saturation": 33.4},{"lightness": -25.4},{ "gamma": 1}]},{"featureType": "poi.business","elementType": "labels","stylers": [
            {"visibility": "off"}]},{"featureType": "poi.medical","elementType": "labels","stylers": [{"visibility": "off"}]},{"featureType": "poi.school","elementType": "labels","stylers": [{"visibility": "off"}]},{"featureType": "poi.sports_complex","elementType": "labels","stylers": [{"visibility": "off" }]},{"featureType": "road.highway","elementType": "all","stylers": [{"hue": "#53FF00"},
            {"saturation": -73},{"lightness": 40},{"gamma": 1}]},{"featureType": "road.arterial","elementType": "all","stylers": [{"hue": "#FBFF00"},{"gamma": 1}]},{"featureType": "road.local","elementType": "all","stylers": [{"hue": "#00FFFD"},{"lightness": 30},{"gamma": 1}]},{"featureType": "water","elementType": "all","stylers": [{"hue": "#00BFFF"},{"saturation": 6},{"lightness": 8},{"gamma": 1}]}]
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
     
   
google.maps.event.addDomListener(window, 'load', initMap);

    navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
        };
        map.setCenter(pos);
    });

    var iconBase = '../pinme/images/';
    
    var icons = {
          afval: {
            icon: iconBase + 'icon_afval.png',
            scaledSize: new google.maps.Size(50, 50)
          },
          groen: {
            icon: iconBase + 'icon_groen.png',
            scaledSize: new google.maps.Size(50, 50)
          },
          overlast: {
            icon: iconBase + 'icon_overlast.png',
            scaledSize: new google.maps.Size(50, 50)
          },
          gebouwen: {
            icon: iconBase + 'icon_gebouwen.png',
            scaledSize: new google.maps.Size(50, 50)
          },
          straten: {
            icon: iconBase + 'icon_straten.png',
            scaledSize: new google.maps.Size(50, 50)
          },
          verkeer: {
            icon: iconBase + 'icon_verkeer.png',
            scaledSize: new google.maps.Size(50, 50)
          }
        };

    
    var features = [
          {
            position: new google.maps.LatLng(50.995659, 4.530104),
            type: 'afval'
          }, {
            position: new google.maps.LatLng(51.012688, 4.440343),
            type: 'groen'
          }, {
            position: new google.maps.LatLng(51.023304, 4.482139),
            type: 'groen'
          }, {
            position: new google.maps.LatLng(51.025135, 4.481775),
            type: 'overlast'
          }, {
            position: new google.maps.LatLng(51.023663, 4.476057),
            type: 'gebouwen'
          }, {
            position: new google.maps.LatLng(50.865631, 3.619565),
            type: 'straten'
          }, {
            position: new google.maps.LatLng(51.024548, 4.477532),
            type: 'straten'
          }, {
            position: new google.maps.LatLng(51.033180, 4.475461),
            type: 'gebouwen'
          }, {
            position: new google.maps.LatLng(51.029560, 4.481885),
            type: 'afval'
          }, {
            position: new google.maps.LatLng(51.029598, 4.474217),
            type: 'verkeer'
          }, {
            position: new google.maps.LatLng(51.022083, 4.484892),
            type: 'verkeer'
          }, {
            position: new google.maps.LatLng(51.022701, 4.474384),
            type: 'afval'
          }
        ];
    
features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });
        });
 
}


