<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	
	<title>Mijn dossier</title>
   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="css/flexboxgrid.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include_once("nav.inc.php"); ?>

<div class="dossier_scherm">

	<h1>Mijn dossier</h1>
	
	<div class="statusfilters">
	    <div class="status">
            <a href="#">Opgestart</a>
        </div>
        
        <div class="status">
            <a href="#">In behandeling</a>
        </div>
       
       <div class="status">
            <a href="#">Afgerond</a>	
       </div>
        
    </div>
	
	<div class="dossiers">
		
        <div class="dossier">
            <img src="images/icon_afval.png" alt="icon" class="dossier_rubicon">
            <div class="dossier_info">
                <img src="images/dossier_klok.png" alt="icon">
                <div>Status</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_pin.png" alt="icon">
                <div>Rubriek</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_locatie.png" alt="icon">
                <div>Plaats</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_kalender.png" alt="icon">
                <div>Datum</div>
            </div>				
        </div>
		
		
		<div class="dossier">
            <img src="images/icon_gebouwen.png" alt="icon" class="dossier_rubicon">
            <div class="dossier_info">
                <img src="images/dossier_klok.png" alt="icon">
                <div>Status</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_pin.png" alt="icon">
                <div>Rubriek</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_locatie.png" alt="icon">
                <div>Plaats</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_kalender.png" alt="icon">
                <div>Datum</div>
            </div>				
        </div>
		
		
		<div class="dossier">
            <img src="images/icon_groen.png" alt="icon" class="dossier_rubicon">
            <div class="dossier_info">
                <img src="images/dossier_klok.png" alt="icon">
                <div>Status</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_pin.png" alt="icon">
                <div>Rubriek</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_locatie.png" alt="icon">
                <div>Plaats</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_kalender.png" alt="icon">
                <div>Datum</div>
            </div>				
        </div>
        
        <div class="dossier">
            <img src="images/icon_straten.png" alt="icon" class="dossier_rubicon">
            <div class="dossier_info">
                <img src="images/dossier_klok.png" alt="icon">
                <div>Status</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_pin.png" alt="icon">
                <div>Rubriek</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_locatie.png" alt="icon">
                <div>Plaats</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_kalender.png" alt="icon">
                <div>Datum</div>
            </div>				
        </div>
        
	</div>

</div>
</body>
</html>