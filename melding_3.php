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
<div class="main">

<h2>Melding toevoegen</h2>
<h3>Kies een rubriek</h3>

<a href="melding_1.php" class="back_btn"><img src="images/pinme_backbtn.png"></a>

<form action="melding_4.php" method="post" id="uploadForm">
<div class="grid_container">  
    <div class="formfield grid_item">
        <input type="image" src="images/icon_afval.png" name="submit" id="icon_afval" class="icons">
        <label for="icon_afval" class="icon_label">Afval</label> 
    </div> 
    
    <div class="formfield grid_item">
        <input type="image" src="images/icon_gebouwen.png" name="submit" id="icon_gebouwen" class="icons">
        <label for="icon_gebouwen" class="icon_label">Gebouwen</label>  
    </div> 
    
    <div class="formfield grid_item">
        <input type="image" src="images/icon_groen.png" name="submit" id="icon_groen" class="icons">
        <label for="icon_groen" class="icon_label">Groen</label>  
    </div> 
    
    <div class="formfield grid_item">
        <input type="image" src="images/icon_overlast.png" name="submit" id="icon_overlast" class="icons">
        <label for="icon_overlast" class="icon_label">Overlast</label>
    </div> 
    
    <div class="formfield grid_item">
        <input type="image" src="images/icon_straten.png" name="submit" id="icon_straten" class="icons">
        <label for="icon_straten" class="icon_label">Straten</label>  
    </div> 
    
    <div class="formfield grid_item">
        <input type="image" src="images/icon_verkeer.png" name="submit" id="icon_verkeer" class="icons">
        <label for="icon_verkeer" class="icon_label">Verkeer en parkeren</label>
    </div> 
</div>   
</form>

</div>

</body>
</html>