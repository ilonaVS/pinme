<?php 
include_once("checkLogin.inc.php");
include_once("classes/Pin.class.php");

$pin = new Pin();
$collection = $pin->getPinsLocation();

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title></title>
    <link rel="stylesheet" href="css/flexboxgrid.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body>
    <?php include_once( "nav.inc.php"); ?>

    <div id="googleMap"></div>

    <div class="zoek"></div>

    <div id="zoeken" class="verborgenrubrieken">

        <div id="afval"></div>
        
        <div id="gebouwen"></div>

        <div id="groen"></div>

        <div id="overlast"></div>

        <div id="verkeer"></div>

        <div id="straten"></div>

    </div>


    <div class="popup_info">
        <img class="btn_down" src="images/pinme_backbtn.png" alt="btn_down">
        <img class="logo_small" src="images/pinme_logo.png" alt="logo">
        <div class="home_info"># aangemaakte pins</div>
        <div class="home_info"># opgeloste pins</div>
        <div class="home_info"># gebruikers</div>
    </div>



    <script>
        var knop = document.querySelector(".zoek");
        var rubrieken = document.querySelector(".verborgenrubrieken");

        knop.addEventListener("click", OpenDicht);

        function OpenDicht(evt) {
            rubrieken.classList.toggle("verborgenrubrieken");
        }


        var popup = document.querySelector(".popup_info");
        popup.addEventListener("click", goDown);

        function goDown() {
            popup.style.display = 'none';

        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    

    <script src="js/homeGoogleMaps.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEovYLDDYFLJ6SCyDn-lxjl3N2WHM27DI&callback=initMap"></script> 
</body>

</html>










