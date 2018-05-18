<?php 

include_once("classes/Pin.class.php");
include_once("classes/Image.class.php");

session_start();

/*Checken welke subrubriek gekozen en opslaan in session*/
if (isset($_POST['subrub_1'])) {
    $_SESSION['subrub'] = substr($_POST['subrub_1'], -1);
} elseif (isset($_POST['subrub_2'])) {
    $_SESSION['subrub'] = substr($_POST['subrub_2'], -1);
} elseif (isset($_POST['subrub_3'])) {
    $_SESSION['subrub'] = substr($_POST['subrub_3'], -1);
} elseif (isset($_POST['subrub_4'])) {
    $_SESSION['subrub'] = substr($_POST['subrub_4'], -1);
} elseif (isset($_POST['subrub_5'])) {
    $_SESSION['subrub'] = substr($_POST['subrub_5'], -1);
} elseif (isset($_POST['subrub_6'])) {
$_SESSION['subrub'] = substr($_POST['subrub_6'], -1);
} elseif (isset($_POST['subrub_7'])) {
$_SESSION['subrub'] = substr($_POST['subrub_7'], -1);
}

/* SQL uitvoeren om gegevens naar databank te sturen */
if( isset($_POST['opslaan'])){
    $pin = new Pin();
    $image = new Image();
    $pin->setLocation($_SESSION['locatie']);//deze eerst toevoegen aan tabel locaties
    
    /* Image id ophalen om aan pin te koppelen*/
    $imgId = $pin->getImgId($_SESSION['foto']);
    $pin->setImage($imgId);

   
    $pin->setRub($_SESSION['rubriek']);
    $pin->setSubRub($_SESSION['subrub']);
    $pin->setDescription($_POST['beschrijving']);
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
<?php include_once("nav.inc.php"); ?>

<h2>Melding toevoegen</h2>

<a href="melding_4.php" class="back_btn"><img src="images/pinme_backbtn.png"></a>


<form action="" method="post" id="uploadForm">
   
    <div class="description"> 
        <textarea name="beschrijving" form="uploadForm" placeholder="Beschrijving (optioneel)" rows="8"></textarea>
    </div> 
   
    <div class="formfield">  
        <input type="submit" value="Melding opslaan" name="opslaan" class="button">
    </div> 
    
</form>


</body>
</html>