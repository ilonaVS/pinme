<?php
    include_once("classes/User.class.php");
	include_once("helpers/Security.class.php");
    
	session_start();
	if(isset($_SESSION['email'])){
		header("Location: home.php");
	}
    
    try{
    if( !empty($_POST)){
        
        //testing if password is secure
        $security = new Security();
        $security->password = $_POST['password'];
        $security->passwordConfirmation = $_POST['password_confirmation'];
        
        //register new user
        if( $security->passwordsAreSecure() ){
            $userIn = $_POST['email'];
            $user = new User(); 
            $user->setEmail( $_POST['email'] );
            $user->setPassword( $_POST['password'] );

        	if($user->register()){
                    //send to index after register
                    session_start();
                    $_SESSION['email']=$userIn;
            		header('Location: info.php');
        	}  
        }
     }
    }
    //if inputfields are empty, send error message
    catch(Exception $e) {
            $error= $e->getMessage();
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

<div class="registratie">
	
	<img id="logo" src="images/pinme_logo.png" alt="logo">
	
	
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





