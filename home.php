<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    
    <title></title>
</head>
<body>



<?php include_once("nav.inc.php"); ?>

<div id="googleMap"></div>
<script src="js/googleMaps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEovYLDDYFLJ6SCyDn-lxjl3N2WHM27DI&callback=myMap"></script>

<div class="popup_info">
    <img class="btn_down" src="images/btn_down.png" alt="btn_down">
    <img class="logo_small" src="images/logo_small.png" alt="logo">
    <div class="home_info"># aangemaakte pins</div>
    <div class="home_info"># opgeloste pins</div>
    <div class="home_info"># gebruikers</div>
</div>


<script>

var popup=document.querySelector(".popup_info");
popup.addEventListener("click",goDown);

var wissel=0; //to get popup closed & back open
function goDown(){
    if(wissel==0){
        popup.style.bottom = -190 + 'px' ;
        document.querySelector(".btn_down").setAttribute("src", "images/btn_up.png");
        wissel=1;
    } else {
        popup.style.bottom = 50 + 'px' ;
        document.querySelector(".btn_down").setAttribute("src", "images/btn_down.png");
        wissel=0;
    }
    
}

</script>

</body>
</html>










