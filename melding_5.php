<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <title>PinME - Melding toevoegen</title>
</head>
<body>
<?php include_once("nav.inc.php"); ?>

<h2>Melding toevoegen</h2>

<a href="melding_1.php" class="back_btn"><img src="images/pinme_backbtn.png"></a>

<form action="melding_5.php" method="post" id="uploadForm">
    <div class="formfield"> 
        <textarea name="beschrijving" form="uploadForm" placeholder="Beschrijving (optioneel)" rows="8"></textarea>
    </div> 
   
    <div class="formfield">  
        <input type="submit" value="Melding opslaan" name="submit" class="button">
    </div> 
    

</form>


</body>
</html>