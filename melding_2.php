<?php 

session_start();

if(isset($_POST['submit_stap1'])){
    $_SESSION["locatie"] = $_POST['locatie'];
}

if( !empty($_POST) ){
if( isset($_POST['submit']) ){
    //if image is chosen
    try{
        if(isset($_FILES['foto'])){
            //make new image & set variables
            $image = new Image();
            $image->setFileName($_FILES['image']['name']);
            $image->setFileSize($_FILES['image']['size']);
            $image->setFileTmp($_FILES['image']['tmp_name']);
            $image->setFileType($_FILES['image']['type']);
            $image->setFileDir("uploads/".$_FILES['image']['name']);
            $image->setFileExt(strtolower((explode('.',$_FILES['image']['name']))[count(explode('.',$_FILES['image']['name']))-1]));
                
            //get variables to upload and save image on database
            $fileTmp = $image->getFileTmp();
            $fileDir = $image->getFileDir();
            $fileName = $image->getFileName(); 
            $fileSize = $image->getFileSize();
            
            //upload image & save on database
            if( move_uploaded_file($fileTmp, $fileDir) ){
                
                //compress image if bigger than 2MB
                $imageDestination = "uploads/"."cp-".$fileName;
                if($fileSize > 2097152){
                    $compImg = $image->compressImage($imageDestination);
                } else {
                    $compImg = $fileDir;
                }
            }
        }
    }
    catch(Exception $e){
        $error= $e->getMessage();
    }
}
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

<form action="melding_3.php" method="post" enctype="multipart/form-data" id="uploadForm">
    <div class="preview">
        <p id="no_image"></p>
    </div>  
                
    <!-- Errors geven ivm foto-->
    <?php if(isset($error)): ?>
        <div class="error">
            <p><?php echo $error; ?></p>
        </div>
    <?php endif; ?>
    
    <div class="formfield visible" id="first_input">
        <label for="image_upload" class="button_upload" id="choose_image">Voeg een foto toe</label>
        <input type="file" name="foto" id="image_upload" accept=".jpg, .jpeg, .png" onchange="filePreview(this);">
    </div>
    
    <div class="center">
    <div class="line_left"></div>
    <div id="of">OF</div>
    <div class="line_right"></div>
    </div> 
    
    <div class="formfield visible" id="zonder_foto">  
        <input type="submit" value="Ga verder zonder foto" name="submit" class="button" >
    </div> 
    <!-- Wannr op btn 'voeg foto toe' geklikt is, komt de btn 'toevoegen' tevoorschijn en verdwijnt btn 'ga verder zonder foto'-->
    <div class="formfield hidden" id="foto_toevoegen">  
        <input type="submit" value="Toevoegen" name="submit" class="button">
    </div>
    
</form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/previewFoto.js"></script>
</body>
</html>