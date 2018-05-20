<?php
include_once("checkLogin.inc.php");
include_once("classes/Pin.class.php");
include_once("classes/User.class.php");

if(!isset($_SESSION)){
    session_start();
}

$pin = new Pin();
$pin->setUserId($_SESSION['user']);
$collection = $pin->getAllPins();
//$collection = $pin->getAllByStatus(1);

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
	    <div class="status status_non_active">
            <a href="#" class="link1" id="1">Opgestart</a>
        </div>
        
        <div class="status status_non_active">
            <a href="#" class="link1" id="2">In behandeling</a>
        </div>
       
       <div class="status status_non_active">
            <a href="#" class="link1" id="3">Afgerond</a>	
       </div>
        
    </div>
    <div class="status_all status_active">
            <a href="#" class="link1" id="all">Toon alle meldingen</a>	
       </div>
	
	<div class="dossiers" id="dospak">

		<?php foreach($collection as $c): ?>
        <div class="dossier">
            <img src="<?php echo $c['icon_url']; ?>" alt="icon" class="dossier_rubicon">
            <div class="dossier_info">
                <img src="images/dossier_klok.png" alt="icon">
                <div id="<?php echo htmlspecialchars($c['status_id']); ?>" class="statusname"><?php echo $c['status_name']; ?></div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="js/clickDossier.js"></script>


</body>
</html>