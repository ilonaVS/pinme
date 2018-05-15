<?php

    include_once("Db.class.php");

    class Pin {
        //location
        private $lng;
        private $lat;
        //image
        private $image;
        //categorie
        private $rub;
        private $subRub;
        private $description;
        
        /* Setters */
        
        public function setLng($lng)
        {
            $this->lng = $lng;
            return $this;
        }
        
        public function setLat($lat)
        {
            $this->lat = $lat;
            return $this;
        }
        
        public function setImage($image)
        {
            $this->image = $image;
            return $this;
        }
        
        public function setRub($rub)
        {
            $this->rub = $rub;
            return $this;
        }
        
        public function setSubRub($subRub)
        {
            $this->subRub = $subRub;
            return $this;
        }
        
        public function setDescription($description)
        {
            $this->description = $description;
            return $this;
        }
        
        /* Getters */
        
        public function getLng()
        {
            return $this->lng;
        }
        
        public function getLat()
        {
            return $this->lat;
        }
        
        public function getImage()
        {
            return $this->image;
        }
        
        public function getRub()
        {
            return $this->rub;
        }
        
        public function getSubRub()
        {
            return $this->subRub;
        }
        
        public function getDescription()
        {
            return $this->description;
        }
        
        /* Functions */
        
        /* Huidige locatie lat en lng in database */
        
        
        
        /* Locatie wijzigen */
        
        
        
        /* Rubrieken ophalen */
        public function getRubrieken()
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT * FROM rubrieken");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getSingleRub()
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT icon_url FROM rubrieken WHERE id = :id");
            $statement->bindValue(":id", $_POST['rubriek']); 
            /* Hier moeten we de id van de gekozen rubriek ophalen/koppelen */
            return $statement->execute();
        }
        
        /* Subrubrieken ophalen gelinkt aan rubriek */
        public function getSubrubrieken 
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT subrubrieken.* FROM subrubrieken, rubrieken WHERE subrubrieken.rubriek_id = rubrieken.id");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getSingleSubrub 
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT id FROM subrubrieken WHERE name = :name");
            $statement->bindValue(":name", $_POST['subrubriek']); 
            /* Hier moeten we de id van de gekozen subrubriek ophalen/koppelen */
            return $statement->execute();
        }
        
        
        /* Melding toevoegen */
        public function createPin()
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("INSERT INTO pins (location_id, img_id, description, status_id, rubriek_id, subrubriek_id, user_id) VALUES(:location, :img, :description, :status, :rub, :subrub, :user)");
            $statement->bindValue(":location", $this->getLocation());
            $statement->bindValue(":img", $this->getImage());
            $statement->bindValue(":description", $this->getDescription());
            $statement->bindValue(":status", $this->getStatus());
            $statement->bindValue(":rub", $this->getRub());
            $statement->bindValue(":subrub", $this->getSubRub());
            $statement->bindValue(":user", $_SESSION['user']);
            $result = $statement->execute();
            return $result;
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    }