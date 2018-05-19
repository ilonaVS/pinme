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

    navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
        };
        map.setCenter(pos);
    });

    var iconBase = '../pinme/images/';
    var locations = [
	[ 50.995659, 4.530104, 2, 'icon_afval.png'],
	[ 51.012688, 4.440343, 1, 'icon_groen.png']
    ];
    

var marker, i, icon;
for (i = 0; i < locations.length; i++) {
    icon = {
    url: iconBase + locations[i][3],
    scaledSize: new google.maps.Size(50, 50), // scaled iconsize
    
    };
	marker = new google.maps.Marker({
		position: new google.maps.LatLng(locations[i][0], locations[i][1]),
		icon: icon,
		map: map
	});
    

};

        
    }     


