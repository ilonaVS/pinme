<?php 
include_once("checkLogin.inc.php");
include_once("classes/Image.class.php");
include_once("classes/Pin.class.php");

if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST['submit'])){
    //if image is chosen
    
        if(isset($_FILES['foto'])){
            //make new image & set variables
            $image = new Image();
            $image->setFileName($_FILES['foto']['name']);
            $image->setFileSize($_FILES['foto']['size']);
            $image->setFileTmp($_FILES['foto']['tmp_name']);
            $image->setFileType($_FILES['foto']['type']);
            $image->setFileDir("uploads/".$_FILES['foto']['name']);
            $image->setFileExt(strtolower((explode('.',$_FILES['foto']['name']))[count(explode('.',$_FILES['foto']['name']))-1]));
                
            //get variables to upload and save image on database
            $fileTmp = $image->getFileTmp();
            $fileDir = $image->getFileDir();
            $fileName = $image->getFileName(); 
            $fileSize = $image->getFileSize();
            
            //upload image & save on database
            if( move_uploaded_file($fileTmp, $fileDir) ){  
                $_SESSION['foto'] = $fileName;
                $image->saveImage();
            }
        }
} elseif(isset($_POST['submit_zonder'])){
    $_SESSION['foto'] = "no image";
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

<a href="melding_2.php" class="back_btn"><img src="images/pinme_backbtn.png"></a>
<h2>Melding toevoegen</h2>


<div class="formsteps">
    <div class="step_non_active"></div>
    <div class="step_non_active"></div>
    <div class="step_active"></div>
    <div class="step_non_active"></div>
    <div class="step_non_active last"></div>
</div>

<h3>Kies een rubriek</h3>

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