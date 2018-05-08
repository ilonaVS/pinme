<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>Profiel</title>

	<link rel="stylesheet" href="css/flexboxgrid.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body>
<?php include_once("nav.inc.php"); ?>
<div class="profiel">
	
<h1>Profiel</h1>
	

	<form action="" method="post" class="data_form">
        	<p>Huidige gebruikersnaam</p>
                <div class="formfield">
            <input type="text" id="name" name="name" placeholder="Gebruikersnaam wijzigen">
        </div>  
        
             <p>Huidig emailadres</p>     
        <div class="formfield">
            <input type="text" id="email" name="email" placeholder="E-mail wijzigen">
        </div>
        <div class="formfield">
            <input type="password" id="password" name="password" placeholder="Wachtwoord wijzigen">
        </div>
        <div class="formfield">
            <input type="submit" value="Onthouden" class="button">	
        </div>
        
    </form>
    
    <div class="button">
        <a href="loguit.php">Uitloggen</a>	
    </div>

	
</div>

	
		
		
		

</body>
</html>