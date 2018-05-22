<?php 
include_once("checkLogin.inc.php");
include_once("classes/Pin.class.php");
include_once("classes/User.class.php");

$pin = new Pin();
$collection = $pin->getPinsLocation();
$countPins = $pin->getAmountPins();
$countFixedPins = $pin->getAmountFixedPins();

$user = new User();
$countUsers = $user->getAmountUsers();

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

        <input type="checkbox" id="afval" name="filter">
        <label for="afval"><img src="images/icon_afval.png" alt="filter button" style="width:50px; height:50px;"></label>
        
        <input type="checkbox" id="gebouwen" name="filter">
        <label for="gebouwen"><img src="images/icon_gebouwen.png" alt="filter button" style="width:50px; height:50px;"></label>
        
        <input type="checkbox" id="groen" name="filter">
        <label for="groen"><img src="images/icon_groen.png" alt="filter button" style="width:50px; height:50px;"></label>
        
        <input type="checkbox" id="overlast" name="filter">
        <label for="overlast"><img src="images/icon_overlast.png" alt="filter button" style="width:50px; height:50px;"></label>
        
        <input type="checkbox" id="straten" name="filter">
        <label for="straten"><img src="images/icon_straten.png" alt="filter button" style="width:50px; height:50px;"></label>
        
        <input type="checkbox" id="verkeer" name="filter">
        <label for="verkeer"><img src="images/icon_verkeer.png" alt="filter button" style="width:50px; height:50px;"></label>

    </div>


    <div class="popup_info">
        <img class="btn_down" src="images/pinme_backbtn.png" alt="btn_down">
        <img class="logo_small" src="images/pinme_logo.png" alt="logo">
        <div class="home_info"><?php echo $countUsers; ?> gebruikers</div>
        <div class="home_info"><?php echo $countPins; ?> aangemaakte pins</div>
        <div class="home_info"><?php echo $countFixedPins; ?> opgeloste pins</div>
        
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
    <!--<script src="js/home.js"></script>-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEovYLDDYFLJ6SCyDn-lxjl3N2WHM27DI&callback=initMap"></script> 
</body>

</html>










