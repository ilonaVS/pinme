<?php 
include_once("checkLogin.inc.php");
include_once("classes/Image.class.php");
include_once("classes/Pin.class.php");

if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST['submit_stap1'])){
    $_SESSION["locatie"] = $_POST['locatie'];
}

/* Location long name */
$location = explode(",", $_SESSION["locatie"]);

$place = preg_split('/(?<=\D)(?=\d)|\d+\K/', $location[0]);
$streetname = rtrim($place[0]);
$streetname_url = preg_replace('/\s+/', '+', $streetname);
$streetnr = $place[1];

/* straat: $street_nr[0] & huisnr: $street_nr[1] */

$zip_city = explode(" ", $location[1]);
/* zipcode: $zip_city[0] & city: $zip_city[1] */

/* Location lng & lat */
$address = $streetname_url.','.$streetnr.','.$zip_city[1].','.'Belgium';
$url = 'http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false';
$json = @file_get_contents($url);
$output= json_decode($json);
$status = $output->status;

if($status == "OK"){
    $_SESSION['lat'] = $output->results[0]->geometry->location->lat;
    $_SESSION['lng'] = $output->results[0]->geometry->location->lng;
}

/* Locatie opslaan in database */
$pin = new Pin();

if($pin->existLocation($_SESSION['lat'], $_SESSION['lng']) === NULL){
    $pin->setLng($_SESSION['lng']);
    $pin->setLat($_SESSION['lat']);
    $pin->setStreetName($streetname);
    $pin->setHouseNr($streetnr);
    $pin->setCity($zip_city[1]);
    $pin->saveLocation();
} 

$_SESSION["locatieId"] = $pin->getLocationId($streetname, $streetnr, $zip_city[1]);

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

<div class="main" id="form_step2">

<a href="melding_1.php" class="back_btn"><img src="images/pinme_backbtn.png" alt="back button"></a>
<h2>Melding toevoegen</h2>

<div class="formsteps">
    <div class="step_non_active"></div>
    <div class="step_active"></div>
    <div class="step_non_active"></div>
    <div class="step_non_active"></div>
    <div class="step_non_active last"></div>
</div>

<form action="melding_3.php" method="post" enctype="multipart/form-data" id="uploadForm">
    <div class="preview">
        <p id="no_image"></p>
    </div>  
                
    <!-- Errors geven ivm foto-->
    <?php if(isset($error)): ?>
        <div class="error">
            <p><?php echo $error; ?></p>
        </div>
    <?php endif; ?>
    
    <div class="formfield visible" id="first_input">
        <label for="image_upload" class="button_upload" id="choose_image">Voeg een foto toe</label>
        <input type="file" name="foto" id="image_upload" accept=".jpg, .jpeg, .png, .JPG" onchange="filePreview(this);">
    </div>
    
    <div class="center">
    <div class="line_left"></div>
    <div id="of">OF</div>
    <div class="line_right"></div>
    </div> 
    
    <div class="formfield visible" id="zonder_foto">  
        <input type="submit" value="Ga verder zonder foto" name="submit_zonder" class="button" >
    </div> 
    <!-- Wannr op btn 'voeg foto toe' geklikt is, komt de btn 'toevoegen' tevoorschijn en verdwijnt btn 'ga verder zonder foto'-->
    <div class="formfield hidden" id="foto_toevoegen">  
        <input type="submit" value="Toevoegen" name="submit" class="button">
    </div>
    
</form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/previewFoto.js"></script>
</body>
</html>