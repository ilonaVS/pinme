<script>
var map;
var Markers = {};
var infowindow;
var iconBase = '../pinme/';
var locations = [
    <?php
    foreach($collection as $key =>$c){
        echo "[ ".$c['lat'].", ".$c['lng'].", ".$c['rubriek_id'].", '".$c['icon_url']."', '<p>".$c['name']." <br> ".date('d-m-Y', strtotime($c['date']))."<p>'],";
    }
    ?>
];

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

</script>

