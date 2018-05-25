<?php
    include_once("classes/User.class.php");
    include_once("helpers/Security.class.php");

    session_start();
    if(isset($_SESSION['user'])){
      header("Location: index.php");
    }

    //user and password from post oproepen
    //eerst kijken of het formulier al is verzonden anders geeft het een foutmelding
    try{
      if(!empty($_POST)){

        $username = $_POST['email'];
        $password= $_POST['password'];
 
  // kan de user inloggen?   
  $user = new User(); 
        $user->setEmail( $_POST['email'] );
        $user->setPassword( $_POST['password'] );
        	if($user->login()){
                $id= $user->getIdbyEmail();
                //send to index after register
                $_SESSION['user']=$id['id'];
                header('Location: index.php');
          }  
          
    }
  }
    catch(Exception $e) {
            $error= $e->getMessage();
        } 

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>Log in</title>
		
	<link rel="stylesheet" href="css/flexboxgrid.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>

<div class="login">


  
	<img id="logo" src="images/logo_wit.png" alt="logo">
    
	<div id="blok">
	<div class="lala">
	
	<?php if (isset($error)):?>
                <div class="error"><p><?php echo $error ?></p></div>
    	<?php endif; ?>

	<form action="" method="post" class="data_form">
               
        <div class="formfield">
            <input type="text" id="email" name="email" placeholder="E-mail">
        </div>
        <div class="formfield">
            <input type="password" id="password" name="password" placeholder="Wachtwoord">
        </div>
        <!--
        <div class="field-group">
		    <input type="checkbox" name="remember" id="remember"/>
		    <label for="remember-me">wachtwoord onthouden</label>
		</div>
       -->
        <div class="formfield">
            <input type="submit" value="Inloggen" class="button">	
        </div>

    </form>

 
    <p>Wachtwoord vergeten? <a href="#">Klik hier.</a></p>
    
    <p>Nieuwe gebruiker? <a href="registreren.php">Registreer nu.</a></p>
    </div>
    
    
	</div>
	</div>
</body>
</html>