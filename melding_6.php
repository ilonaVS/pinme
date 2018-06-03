<?php 
include_once("checkLogin.inc.php");
include_once("classes/Image.class.php");
include_once("classes/Pin.class.php");
include_once("classes/User.class.php");

if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST['beschrijving'])){
    $_SESSION['beschrijving'] = $_POST['beschrijving'];
} else {
    $_SESSION['beschrijving'] = "";
}
if(isset($_POST['public'])){
    $_SESSION['public'] = 1;
} else {
    $_SESSION['public'] = 0;
}


/* SQL uitvoeren om gegevens naar databank te sturen */
if( isset($_POST['opslaan'])){
    $pin = new Pin();
    $pin->setLocation($_SESSION['locatieId']['id']);
    
    /* Image id ophalen om aan pin te koppelen*/
    $image = new Image();
    $imgId = $pin->getImgId($_SESSION['foto']);
    $pin->setImage($imgId['id']);
    $pin->setRub($_SESSION['rubriek']);
    $pin->setSubRub($_SESSION['subrub']['id']);
    $pin->setDescription($_SESSION['beschrijving']);
    $pin->setUserId($_SESSION['user']);
    $pin->setPublicPin($_SESSION['public']);

    if($pin->createPin()){
        unset($_SESSION['foto']);
        unset($_SESSION['rubriek']);
        unset($_SESSION['subrub']);
        unset($_SESSION['beschrijving']);
        unset($_SESSION['locatie']);
        unset($_SESSION['public']);
    }
}

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

<div class="melding_succes">
      
    <img src="images/icon_melding_succes1.png" alt="melding succes" class="img_succes">
 


    <h3>Melding opgeslagen!</h3>
   
  <div class="btn_forward">     
  <a href="index.php">Ga verder <img src="images/pinme_forwardbtn.png"></a>
  </div>

</div>




</body>
</html>