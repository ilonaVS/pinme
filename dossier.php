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

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>Mijn dossier</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include_once("nav.inc.php"); ?>

<div id="icon_dossier"></div>
<div class="dossier_scherm">
	
	<div class="statusfilters">
            <a href="#" class="link1 status" id="1">Opgestart</a>
            <a href="#" class="link1 status" id="2">In behandeling</a>
            <a href="#" class="link1 status" id="3">Afgerond</a>	
    </div>
            <a href="#" class="link1 status_all status_active" id="all">Toon alle meldingen</a>	
    
	<div class="dossiers" id="dospak" style="overflow-y: scroll; height:56%;">

		<?php foreach($collection as $c): ?>
        <div class="dossier">
            <img src="<?php echo htmlspecialchars($c['icon_url']); ?>" alt="icon" class="dossier_rubicon">
            <div class="dossier_info">
                <img src="images/dossier_klok.png" alt="icon">
                <div id="<?php echo htmlspecialchars($c['status_id']); ?>" class="statusname"><?php echo htmlspecialchars($c['status_name']); ?></div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_pin.png" alt="icon">
                <div><?php echo htmlspecialchars($c['name']); ?></div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_locatie.png" alt="icon">
                <div><?php echo htmlspecialchars($c['streetname'].' '.$c['house_nr']); ?></div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_kalender.png" alt="icon">
                <div><?php echo htmlspecialchars(date('d/m/Y',strtotime($c['date']))); ?></div>
            </div>				
        </div>
		<?php endforeach; ?>
		
        
	</div>
<div id="blok2"></div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/clickDossier.js"></script>
<script>
var links = $('.link1').click(function(){
    links.removeClass('status_active');
    $(this).addClass('status_active');

});

</script>

</body>
</html>