<?php 
include_once("checkLogin.inc.php");

session_start();




?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    
    <title>PinME - Melding toevoegen</title>
</head>
<body>
<?php include_once("nav.inc.php"); ?>

<div id="googleMap"></div>
    
    

<form action="melding_2.php" method="post" id="uploadForm">
    <div class="formfield">  
        <input type="text" name="locatie" value="Huidige locatie" class="above_map location_field" id="adres">
    </div> 
   
    <div class="formfield">  
        <input type="submit" value="+ Melding toevoegen" name="submit_stap1" class="button_map above_map">
    </div>

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/googleMaps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEovYLDDYFLJ6SCyDn-lxjl3N2WHM27DI&callback=initMap"></script> 

</body>
</html>