<?php 

//ben niet zeker of dit juist is
//mss nog issets gebruiken
if (isset($_POST['rubriek1'])) {
    $_SESSION['rubriek1'] = $_POST['rubriek1'];
}
if (isset($_POST['rubriek2'])) {
    $_SESSION['rubriek2'] = $_POST['rubriek2'];
}
if (isset($_POST['rubriek3'])) {
    $_SESSION['rubriek3'] = $_POST['rubriek3'];
}
if (isset($_POST['rubriek4'])) {
    $_SESSION['rubriek4'] = $_POST['rubriek4'];
}
if (isset($_POST['rubriek5'])) {
    $_SESSION['rubriek5'] = $_POST['rubriek5'];
}
if (isset($_POST['rubriek6'])) {
    $_SESSION['rubriek6'] = $_POST['rubriek6'];
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
    <img src="images/icon_afval.png" alt="icon">

    <form action="melding_5.php" method="post" id="uploadForm">

        <div class="formfield">  
            <input type="submit" value="Sluikstorten" name="subrubriek1" class="btn_subrub">
        </div>
    
        <div class="formfield">  
            <input type="submit" value="Zwerfvuil" name="subrubriek2" class="btn_subrub">
        </div>
    
        <div class="formfield">  
            <input type="submit" value="Huisvuil" name="subrubriek3" class="btn_subrub">
        </div>
    
        <div class="formfield">  
            <input type="submit" value="Hondenpoep" name="subrubriek4" class="btn_subrub">
        </div>

        <div class="formfield">  
            <input type="submit" value="Andere" name="subrubriek5" class="btn_subrub">
        </div>
    </form>
</div>
</body>
</html>