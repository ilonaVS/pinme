<?php
    include_once("classes/User.class.php");
	include_once("helpers/Security.class.php");
    
	if(!isset($_SESSION)){
    session_start();
    }
	if(isset($_SESSION['user'])){
		header("Location: home.php");
	}
    
    if( !empty($_POST)){
        
        //testing if password is secure
        $security = new Security();
        $security->password = $_POST['password'];
        $security->passwordConfirmation = $_POST['password_confirmation'];
        $security->email = $_POST['email'];
        
        //register new user
        if($security->checkEmail()){
            $error = "Dit emailadres is reeds in gebruik. Gelieve een ander e-mailadres te kiezen.";
        } elseif($security->emailValidate()){
            $error = "Gebruik een geldig emailadres.";
        } else {
        if( $security->passwordsAreSecure() ){
            $user = new User(); 
            $user->setEmail( $_POST['email'] );
            $user->setPassword( $_POST['password'] );

        	if($user->register()){
                    //send to index after register
                    $id= $user->getIdbyEmail();
                    session_start();
                    $_SESSION['user']=$id['id'];
            		header('Location: home.php');
        	}  
        } else {
            $error = "Je wachtwoord moet overeenkomen en minstens 8 tekens lang zijn.";
        }
        }
     }

    

?><!DOCTYPE html>
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

<div id="cirkel"></div>

<div class="registratie">
	
	<img id="logo" src="images/logo_wit.png" alt="logo">
	
	
	<?php if (isset($error)):?>
                <div class="error"><p><?php echo $error ?></p></div>
    <?php endif; ?>
	
	
	<form action="" method="post" id="register_form" class="data_form">
              
               
				<div class="formfield">
					<input type="text" id="email" name="email" placeholder="E-mail">
				</div>
				<div class="formfield">
					<input type="password" id="password" name="password" placeholder="Wachtwoord">
				</div>

                <div class="formfield">
					<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Bevestiging wachtwoord">
				</div>

				<div  class="formfield">
					<input type="submit" value="Registreren" class="button">	
				</div>
        
    </form>
	
</div>
	
</body>
</html>





