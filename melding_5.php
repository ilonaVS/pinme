<?php 

if (isset($_POST['subrubriek1'])) {
    $_SESSION['subrubriek1'] = $_POST['subrubriek1'];
}
if (isset($_POST['subrubriek2'])) {
    $_SESSION['subrubriek2'] = $_POST['subrubriek2'];
}
if (isset($_POST['subrubriek3'])) {
    $_SESSION['subrubriek3'] = $_POST['subrubriek3'];
}
if (isset($_POST['subrubriek4'])) {
    $_SESSION['subrubriek4'] = $_POST['subrubriek4'];
}
if (isset($_POST['subrubriek5'])) {
    $_SESSION['subrubriek5'] = $_POST['subrubriek5'];
}
if (isset($_POST['subrubriek6'])) {
$_SESSION['subrubriek6'] = $_POST['subrubriek6'];
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


<form action="melding_6.php" method="post" id="uploadForm">
   
    <div class="description"> 
        <textarea name="beschrijving" form="uploadForm" placeholder="Beschrijving (optioneel)" rows="8"></textarea>
    </div> 
   
    <div class="formfield">  
        <input type="submit" value="Melding opslaan" name="submit" class="button">
    </div> 
    
</form>


</body>
</html>