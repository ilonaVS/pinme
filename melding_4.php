<?php 
include_once("checkLogin.inc.php");
include_once("classes/Pin.class.php");

session_start();

/* Checken welke rubriek icon werd aangeklikt*/
if( isset($_POST['afval_x'], $_POST['afval_y']) ){
    $_SESSION['rubriek'] = 1;
} elseif( isset($_POST['gebouwen_x'], $_POST['gebouwen_y']) ){
    $_SESSION['rubriek'] = 2;
} elseif( isset($_POST['groen_x'], $_POST['groen_y']) ){
    $_SESSION['rubriek'] = 3;
} elseif( isset($_POST['overlast_x'], $_POST['overlast_y']) ){
    $_SESSION['rubriek'] = 4;
} elseif( isset($_POST['straten_x'], $_POST['straten_y']) ){
    $_SESSION['rubriek'] = 5;
} elseif( isset($_POST['verkeer_x'], $_POST['verkeer_y']) ){
    $_SESSION['rubriek'] = 6;
}

if( isset($_SESSION["rubriek"]) ){
    $pin = new Pin();
    $rubriek = $pin->setRub($_SESSION['rubriek']);
    /*Haal rubriek op van gekozen rubriek en toon icon*/
    $rubriekImage = $pin->getSingleRub($rubriek);
    $subrubrieken = $pin->getSubrubrieken($rubriek);
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

<a href="melding_3.php" class="back_btn"><img src="images/pinme_backbtn.png"></a>

<div class="subrub">
    <img src="<?php echo $rubriekImage["icon_url"]; ?>" alt="icon">

    <form action="melding_5.php" method="post" id="uploadForm">
    <?php foreach($subrubrieken as $sr): ?>
        <div class="formfield">  
            <input type="submit" value="<?php echo $sr['name']; ?>" name="subrub" class="btn_subrub">
        </div>
    <?php endforeach; ?>
    </form>
</div>
</body>
</html>