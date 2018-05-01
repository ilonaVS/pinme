<!DOCTYPE html>
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
            <input type="submit" value="Sluikstorten" name="submit" class="btn_subrub">
        </div>
    
        <div class="formfield">  
            <input type="submit" value="Zwerfvuil" name="submit" class="btn_subrub">
        </div>
    
        <div class="formfield">  
            <input type="submit" value="Huisvuil" name="submit" class="btn_subrub">
        </div>
    
        <div class="formfield">  
            <input type="submit" value="Hondenpoep" name="submit" class="btn_subrub">
        </div>

        <div class="formfield">  
            <input type="submit" value="Andere" name="submit" class="btn_subrub">
        </div>
    </form>
</div>
</body>
</html>