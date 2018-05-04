<?php
session_start();
if(!empty($_POST["login"])) {
	$conn = mysqli_connect("localhost", "root", "", "blog_samples");
	$sql = "Select * from members where member_name = '" . $_POST["member_name"] . "' and member_password = '" . md5($_POST["member_password"]) . "'";
	$result = mysqli_query($conn,$sql);
	$user = mysqli_fetch_array($result);
	if($user) {
			$_SESSION["member_id"]		   = $user["member_id"];
			
			if(!empty($_POST["remember"])) {
				setcookie ("member_login",$_POST["member_name"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("member_password",$_POST["member_password"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
				if(isset($_COOKIE["member_password"])) {
					setcookie ("member_password","");
				}
			}
	} else {
		$message = "Invalid Login";
	}
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Log in</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="css/flexboxgrid.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>

<div id="container" class="login">
	
	<div id="logo"></div>
	<h1 class="titel">Inloggen</h1>
	
	<form action="" method="post" class="data_form">
               
        <div class="formfield">
            <input type="text" id="email" name="email" placeholder="E-mail">
        </div>
        <div class="formfield">
            <input type="password" id="password" name="password" placeholder="Wachtwoord">
        </div>
        <!--
        <div class="field-group">
		    <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
		    <label for="remember-me">wachtwoord onthouden</label>
		</div>
       -->
        <div class="formfield">
            <input type="submit" value="Inloggen" class="button">	
        </div>

    </form>
   
    <a href="#">Wachtwoord vergeten?</a>
    <a href="registreren.php">Maak een nieuw account aan.</a>
	
</div>
	
	
</body>
</html>