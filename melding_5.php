<?php 
include_once("checkLogin.inc.php");
include_once("classes/Pin.class.php");
include_once("classes/Image.class.php");

if(!isset($_SESSION)){
    session_start();
}

$pin = new Pin();

/*Checken welke subrubriek gekozen en opslaan in session*/
if (isset($_POST['subrub'])) {
    $_SESSION['subrub'] = $pin->getSingleSubrub($_POST['subrub']);
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
<div class="main">
<a href="melding_4.php" class="back_btn"><img src="images/pinme_backbtn.png"></a>
<h2>Melding toevoegen</h2>

<div class="formsteps">
    <div class="step_non_active"></div>
    <div class="step_non_active"></div>
    <div class="step_non_active"></div>
    <div class="step_non_active"></div>
    <div class="step_active last"></div>
</div>


<form action="melding_6.php" method="post" id="uploadForm">
   
    <div class="description"> 
        <textarea name="beschrijving" form="uploadForm" placeholder="Beschrijving (optioneel)" rows="8"></textarea>
    </div>
    <div class="formfield">
    <label class="checkbox">
     <input type="checkbox" name="public" id="public" checked="checked">
     <span class="checkmark"></span>
     Ik ga akkoord om deze melding publiek te plaatsen.</label> 
    </div>
    <div class="formfield">  
        <input type="submit" value="Melding opslaan" name="opslaan" class="button">
    </div> 
    
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>