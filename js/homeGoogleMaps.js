var map;
var Markers = {};
var infowindow;
var iconBase = '../pinme/images/';
var locations = [
	[ 50.995659, 4.530104, 1, 'icon_afval.png', '<p>Zwerfvuil<br>21/05/2018</p>'],
	[ 51.012688, 4.440343, 2, 'icon_groen.png', '<p>Onkruid<br>16/05/2018</p>'],
    [ 51.023304, 4.482139, 2, 'icon_groen.png', '<p>Onkruid<br>20/05/2018</p>'],
    [ 51.025135, 4.481775, 3, 'icon_overlast.png', '<p>Geluidsoverlast<br>22/05/2018</p>'],
    [ 51.023663, 4.476057, 4, 'icon_gebouwen.png', '<p>Bouwovertreding<br>22/05/2018</p>'],
    [ 50.865631, 3.619565, 5, 'icon_straten.png', '<p>Beschadiging voetpad/fietspad<br>14/05/2018</p>'],  
    [ 51.024548, 4.477532, 5, 'icon_straten.png','<p>Straatverlichting<br>15/05/2018</p>'],
    [ 51.033180, 4.475461, 4, 'icon_gebouwen.png', '<p>Leegstand<br>17/05/2018</p>'],
    [ 51.029560, 4.481885, 1, 'icon_afval.png', '<p>Sluikstorten<br>19/05/2018</p>'],
    [ 51.029598, 4.474217, 6, 'icon_verkeer.png', '<p>Parkeren<br>21/05/2018</p>'],   
    [ 51.022083, 4.484892, 6, 'icon_verkeer.png', '<p>Verkeerslicht<br>20/05/2018</p>'],
    [ 51.022701, 4.474384, 1, 'icon_afval.png', '<p>Zwerfvuil<br>22/05/2018</p>']
];

/*var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);*/

function initMap() {
  var mapOptions = {
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

  map = new google.maps.Map(document.getElementById('googleMap'), mapOptions); 
    
  navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
        };
        map.setCenter(pos);
  });

	infowindow = new google.maps.InfoWindow();

    for(i=0; i<locations.length; i++) {
        var icon = {
        url: iconBase + locations[i][3],
        scaledSize: new google.maps.Size(50, 50), 
        };
        
    	/*var position = new google.maps.LatLng(locations[i][0, locations[i][1]);*/
        
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][0], locations[i][1]),
		    icon: icon,
            animation: google.maps.Animation.DROP,
		    map: map
		});
		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
				infowindow.setContent(locations[i][4]);
				infowindow.setOptions({maxWidth: 200});
				infowindow.open(map, marker);
			}
		}) (marker, i));
		Markers[locations[i][2]] = marker;
	}

	
google.maps.event.addDomListener(window, 'load', initMap);
}


