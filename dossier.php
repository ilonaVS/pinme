<?php

include_once("classes/Pin.class.php");
include_once("classes/User.class.php");

session_start();//zodat session user gebruikt kan worden

$pin = new Pin();
$pin->setUserId($_SESSION['user']);
$collection = $pin->getAllPins();


?><!DOCTYPE html>
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

		<?php foreach($collection as $c): ?>
        <div class="dossier">
            <img src="<?php echo $c['icon_url']; ?>" alt="icon" class="dossier_rubicon">
            <div class="dossier_info">
                <img src="images/dossier_klok.png" alt="icon">
                <div><?php echo $c['status_name']; ?></div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_pin.png" alt="icon">
                <div><?php echo $c['name']; ?></div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_locatie.png" alt="icon">
                <div><?php echo $c['streetname'].' '.$c['house_nr']; ?></div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_kalender.png" alt="icon">
                <div><?php echo date('d/m/Y',strtotime($c['date'])); ?></div>
            </div>				
        </div>
		<?php endforeach; ?>
		
        
	</div>

</div>
</body>
</html>