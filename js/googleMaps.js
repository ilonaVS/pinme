function initMap() {
var mapProp= {
    center:new google.maps.LatLng(51.024902, 4.479083),
    zoom:15,
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


