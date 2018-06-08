<?php 
include_once("checkLogin.inc.php");
include_once("classes/Pin.class.php");
include_once("classes/User.class.php");

$pin = new Pin();
if(isset($_POST['afval'])){
    $collection = $pin->getAfvalLocation();
} else {
    $collection = $pin->getPinsLocation();
}

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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body>
    <?php include_once( "nav.inc.php"); ?>

    <ion-content scroll="false" data-tap-disabled="true">
    <div id="googleMap" onclick=""></div>
    </ion-content>

    <div class="zoek"></div>

    <div id="zoeken" class="verborgenrubrieken">
    <form action="" method="post" id="rubriek_filters">
       <input type="image" src="images/icon_afval.png" alt="Submit Form" name="afval" id="afval" style="width:50px; height:50px;">
       
       <input type="image" src="images/icon_gebouwen.png" alt="Submit Form" name="gebouwen" id="gebouwen" style="width:50px; height:50px;">
       
       <input type="image" src="images/icon_groen.png" alt="Submit Form" name="groen" id="groen" style="width:50px; height:50px;">
       
       <input type="image" src="images/icon_overlast.png" alt="Submit Form" name="overlast" id="overlast" style="width:50px; height:50px;">
       
       <input type="image" src="images/icon_straten.png" alt="Submit Form" name="straten" id="straten" style="width:50px; height:50px;">
       
       <input type="image" src="images/icon_verkeer.png" alt="Submit Form" name="verkeer" id="verkeer" style="width:50px; height:50px;">
       
        
        <!--
        <input type="checkbox" id="gebouwen" name="gebouwen">
        <label for="gebouwen"><img src="images/icon_gebouwen.png" alt="filter button" style="width:50px; height:50px;"></label>
        
        <input type="checkbox" id="groen" name="groen">
        <label for="groen"><img src="images/icon_groen.png" alt="filter button" style="width:50px; height:50px;"></label>
        
        <input type="checkbox" id="overlast" name="overlast">
        <label for="overlast"><img src="images/icon_overlast.png" alt="filter button" style="width:50px; height:50px;"></label>
        
        <input type="checkbox" id="straten" name="straten">
        <label for="straten"><img src="images/icon_straten.png" alt="filter button" style="width:50px; height:50px;"></label>
        
        <input type="checkbox" id="verkeer" name="verkeer">
        <label for="verkeer"><img src="images/icon_verkeer.png" alt="filter button" style="width:50px; height:50px;"></label>
        -->
    </form>
    </div>


    <div class="popup_info">
        <img class="btn_down" src="images/pinme_backbtn.png" alt="btn_down">
        <img class="logo_small" src="images/pinme_logo.png" alt="logo">
        <div class="home_info"><?php echo htmlspecialchars($countUsers); ?> gebruikers</div>
        <div class="home_info"><?php echo htmlspecialchars($countPins); ?> aangemaakte pins</div>
        <div class="home_info"><?php echo htmlspecialchars($countFixedPins); ?> opgeloste pins</div>
        
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

<!-- Om markers via php en js op kaart te krijgen: -->   
<?php include_once('js/homeGoogleMaps.php'); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEovYLDDYFLJ6SCyDn-lxjl3N2WHM27DI&callback=initMap"></script> 
</body>

</html>










