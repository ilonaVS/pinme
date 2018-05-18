<?php
    include_once("Db.class.php");

    class Image{
        private $fileName;
        private $fileSize;
        private $fileTmp;
        private $fileType;
        private $fileDir;
        private $fileExt;
        private $pinId;
        
    /*Setters*/
        
    public function setFileName($fileName){
            $this->fileName = $fileName;
            return $this;
    }
        
    public function setFileSize($fileSize){
            $this->fileSize = $fileSize;
            return $this;
    }
      
    public function setFileTmp($fileTmp){
            $this->fileTmp = $fileTmp;
            return $this;
    }   
        
    public function setFileType($fileType){
            $this->fileType = $fileType;
            return $this;
    }
        
    public function setFileDir($fileDir){
            $this->fileDir = $fileDir;
            return $this;
    }
        
    public function setFileExt($fileExt){
        $expensions = array("jpeg","jpg","png");
        if(in_array($fileExt, $expensions) === false){
            throw new Exception("Please choose a JPEG or PNG image.");
        }
            $this->fileExt = $fileExt;
            return $this;
    }
        
    public function setPinId($pinId){
            $this->pinId = $pinId;
            return $this;
    }
        
    /*Getters*/
    
    public function getFileName()
    {
        return $this->fileName;
    }
        
    public function getFileSize()
    {
        return $this->fileSize;
    }
        
    public function getFileTmp()
    {
        return $this->fileTmp;
    }
        
    public function getFileType()
    {
        return $this->fileType;
    }
        
    public function getFileDir()
    {
        return $this->fileDir;
    }
        
    public function getFileExt()
    {
        return $this->fileExt;
    }
        
    public function getPinId()
    {
        return $this->pinId;
    }
        
    //compress uploaded image
    function compressImage($imageCompress){
        $fileDir = $this->getFileDir();
        $info = getimagesize($fileDir);
            
        if ($info['mime'] == 'image/jpeg'){
            $fileDir = imagecreatefromjpeg($fileDir);
            imagejpeg($fileDir, $imageCompress, 50);
            }

            elseif ($info['mime'] == 'image/png'){
            $fileDir = imagecreatefrompng($fileDir);
            imagepng($fileDir, $imageCompress, 2);
            }

            return $imageCompress;
    }
        
    /* Afbeelding opslaan in images-tabel en hiervan id returnen*/
    public function saveImage(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("INSERT INTO images(name, url) VALUES(:name, :url)");
        $statement->bindValue(":name", $this->getFileName());
        $statement->bindValue(":url", $this->getFileDir());
        $result = $statement->execute();
        return $result;
    }
        
    
        
    
    }


?>