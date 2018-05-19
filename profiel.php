<?php 
include_once("checkLogin.inc.php");
include_once("classes/User.class.php");
include_once("helpers/Security.class.php");

$user = new User();

if(isset($_GET['user'])){
    $id=$_GET['user'];
}else{
    $id=$user->loggedinUser();
};

$user->setId($id);
$searchedUser = $user->getDetails();

if(!empty($_POST)){

if( isset($_POST['edit']) ) {

        if(!empty($_POST["current_password"])){
            $user->setEmail($searchedUser->email);
            $user->setPassword($_POST["current_password"]);
            
            if($user->login()){
                    
                $user->setEmail($_POST['email']);
                
                
                if(!empty($_POST["password"])){
                    
                    $security = new Security();
                    $security->password = $_POST['password'];
                    $security->passwordConfirmation = $_POST['password_confirmation'];
                    
                    
                    if( $security->passwordsAreSecure() ){
                        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                        $user->setPassword($hash);
                    }
                
                }
                else{
                    $user->setPassword($searchedUser->password);
                }
            }

            $user->editUser();
            header("Location: profiel.php");
        }


    }
}
        
        

?><!DOCTYPE html>
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
	
<div id="avatar"></div>
	
<h1><?php echo htmlspecialchars($searchedUser->email);?></h1> 
	<form action="" method="post" class="data_form"> 

        <div class="formfield">
            <input type="text" id="email" name="email" placeholder="Nieuw e-mailadres">
        </div>
        
        <div class="formfield">
            <input type="password" id="password" name="password" placeholder="Nieuw wachtwoord">
        </div>
        
        <div class="formfield">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Herhaal nieuw wachtwoord" autocomplete="new-password">
        </div>
        
        <div class="formfield">
			<input type="password" id="current_password" name="current_password" placeholder="Huidig wachtwoord" autocomplete="new-password">
        </div>
        
        <input type="submit" value="Opslaan" class="button" name="edit">	

    </form>
    
    <a href="loguit.php" class="btn_loguit">Uitloggen
    </a>
	
</div>

	
		
		
		

</body>
</html>