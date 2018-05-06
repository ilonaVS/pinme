<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>Registreren</title>

	<link rel="stylesheet" href="css/flexboxgrid.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body>
<?php include_once("nav.inc.php"); ?>
<div id="container" class="profiel">
	
<h1>Profiel</h1>
	

	<form action="" method="post" class="data_form">
        	<p>Huidig gebuikersnaam</p>
                <div class="formfield">
            <input type="text" id="name" name="name" placeholder="Gebruikersnaam wijzigen">
        </div>  
        
             <p>Huidigh emailadres</p>     
        <div class="formfield">
            <input type="text" id="email" name="email" placeholder="E-mail wijzigen">
        </div>
        <div class="formfield">
            <input type="password" id="password" name="password" placeholder="Wachtwoord wijzigen">
        </div>
        <div class="formfield">
            <input type="submit" value="Onthouden" class="button">	
        </div>
        
        
          <div class="formfield">
            <input type="submit" value="Uitloggen" class="button">	
        </div>
      
		
    </form>

	
</div>

	
		
		
		

</body>
</html>