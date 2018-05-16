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
            console.log("hello");
        
        
        var geocoder = new google.maps.Geocoder();
        var latLng = new google.maps.LatLng(pos);
        
        var userMarker = new google.maps.Marker({
            position: latLng,
            map: map
            
        });
            
        if (geocoder) {
            geocoder.geocode({ 'latLng': latLng}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                //console.log(results[0].formatted_address); 
                
                /*$("#adres").val(results[0].formatted_address);*/
               
                /*Straatnaam + nr, postcode + stad*/ $("#adres").val(results[0].address_components[1].long_name+' '+results[0].address_components[0].long_name+', '+results[0].address_components[6].long_name+' '+results[0].address_components[2].long_name); 
                    
                //console.log(results[0].address_components[0].long_name);
                //console.log(results[0].address_components[1].long_name);
                //console.log(results[0].address_components[2].long_name);
                //console.log(results[0].address_components[6].long_name);
                }
        
            }
            );
        }
        }, function(error) {
            if (error.code == error.PERMISSION_DENIED){
                                post("","");
                            }
        });
    }     


