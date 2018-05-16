<?php 

session_start();

if(isset($_POST['submit_stap1'])){
    $_SESSION["locatie"] = $_POST['locatie'];
}



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    
    <title>PinME - Melding toevoegen</title>
</head>
<body>
<?php include_once("nav.inc.php"); ?>

<div class="main">

<a href="melding_1.php" class="back_btn"><img src="images/pinme_backbtn.png" alt="back button"></a>
<h2>Melding toevoegen</h2>

<?php var_dump($_SESSION['locatie']); ?>

<form action="melding_3.php" method="post" enctype="multipart/form-data" id="uploadForm">
    <div class="formfield" id="first_input">
        <label for="image_upload" class="button_upload" id="choose_image">Voeg een foto toe</label>
        <input type="file" name="foto" id="image_upload" accept=".jpg, .jpeg, .png">
    </div>
    
    <div class="center">
    <div class="line_left"></div>
    <div id="of">OF</div>
    <div class="line_right"></div>
    </div> 
    
    <div class="formfield">  
        <input type="submit" value="Ga verder zonder foto" name="submit" class="button">
    </div> 
    <!-- Wannr op btn 'voeg foto toe' geklikt is, komt de btn 'toevoegen' tevoorschijn en verdwijnt btn 'ga verder zonder foto'-->
    <div class="formfield">  
        <input type="submit" value="Toevoegen" name="submit" class="button hidden">
    </div>
    
</form>

</div>
</body>
</html>