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
	[ 50.995659, 4.530104, 1, 'icon_afval.png'],
	[ 51.012688, 4.440343, 2, 'icon_groen.png'],
    [ 51.023304, 4.482139, 2, 'icon_groen.png'],
    [ 51.025135, 4.481775, 3, 'icon_overlast.png'],
    [ 51.023663, 4.476057, 4, 'icon_gebouwen.png'],
    [ 50.865631, 3.619565, 5, 'icon_straten.png'],  
    [ 51.024548, 4.477532, 5, 'icon_straten.png'],
    [ 51.033180, 4.475461, 4, 'icon_gebouwen.png'],
    [ 51.029560, 4.481885, 1, 'icon_afval.png'],
    [ 51.029598, 4.474217, 6, 'icon_verkeer.png'],   
    [ 51.022083, 4.484892, 6, 'icon_verkeer.png'],
    [ 51.022701, 4.474384, 1, 'icon_afval.png']
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


