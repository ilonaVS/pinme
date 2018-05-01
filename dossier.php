<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mijn dossier</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="css/flexboxgrid.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include_once("nav.inc.php"); ?>
<div id="container" class="dossier">

	<h1>Mijn dossier</h1>
	
	<div id="statussen">
	<div class="status">
					<input type="start" value="Opgestart" class="button">	
				</div>
        <div class="status">
					<input type="bezig" value="In behandeling" class="button">	
				</div>
       
       <div class="status">
					<input type="einde" value="Afgerond" class="button">	
				</div>
        
</div>
	
	
	
	<div id="dossiertjes">
		
			<div class="dossiertje">
					<input type="start" value="Opgestart" class="button">	
				</div>
        <div class="dossiertje">
					<input type="bezig" value="In behandeling" class="button">	
				</div>
       
       <div class="dossiertje">
					<input type="einde" value="Afgerond" class="button">	
				</div>
		
	</div>

	</div>
</body>
</html>