<?php 
include_once("classes/Image.class.php");
include_once("classes/Pin.class.php");

session_start();

if( isset($_POST['foto']) ){
    $_SESSION['foto'] = $compImg;
    
}

//rubrieken ophalen uit database
$pin = new Pin();
$rubrieken = $pin->getRubrieken();

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

<h2>Melding toevoegen</h2>
<h3>Kies een rubriek</h3>



<a href="melding_2.php" class="back_btn"><img src="images/pinme_backbtn.png"></a>

<form action="melding_4.php" method="POST" id="uploadForm">

<div class="grid_container">  
    <div class="formfield grid_item">
        <input type="image" src="<?php echo $rubrieken[0]['icon_url']; ?>" name="afval" id="icon_afval" class="icons" alt="">
        <label for="icon_afval" class="icon_label"><?php echo $rubrieken[0]['name']; ?></label>
        
    </div> 
      
    <div class="formfield grid_item">
       
        <input type="image" src="<?php echo $rubrieken[1]['icon_url']; ?>" name="gebouwen" id="icon_gebouwen" class="icons">
        <label for="icon_gebouwen" class="icon_label"><?php echo $rubrieken[1]['name']; ?></label>  
    </div> 
    
    <div class="formfield grid_item">
        
        <input type="image" src="<?php echo $rubrieken[2]['icon_url']; ?>" name="groen" id="icon_groen" class="icons">
        <label for="icon_groen" class="icon_label"><?php echo $rubrieken[2]['name']; ?></label>  
    </div> 
    
    <div class="formfield grid_item">
        
        <input type="image" src="<?php echo $rubrieken[3]['icon_url']; ?>" name="overlast" id="icon_overlast" class="icons">
        <label for="icon_overlast" class="icon_label"><?php echo $rubrieken[3]['name']; ?></label>
    </div> 
    
    <div class="formfield grid_item">
        
        <input type="image" src="<?php echo $rubrieken[4]['icon_url']; ?>" name="straten" id="icon_straten" class="icons">
        <label for="icon_straten" class="icon_label"><?php echo $rubrieken[4]['name']; ?></label>  
    </div> 
    
    <div class="formfield grid_item">
       
        <input type="image" src="<?php echo $rubrieken[5]['icon_url']; ?>" name="verkeer" id="icon_verkeer" class="icons">
        <label for="icon_verkeer" class="icon_label"><?php echo $rubrieken[5]['name']; ?></label>
    </div>

</div>   
</form>

</div>

</body>
</html>