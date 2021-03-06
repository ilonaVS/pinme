<?php

    include_once("Db.class.php");

    class Pin {
        //location
        private $lng;
        private $lat;
        private $streetName;
        private $houseNr;
        private $city;
        private $location;
        //image
        private $image;
        //categorie
        private $rub;
        private $subRub;
        private $description;
        private $userId;
        //publiek of niet
        private $publicPin;
        
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
        
        public function setStreetName($streetName)
        {
            $this->streetName = $streetName;
            return $this;
        }
        
        public function setHouseNr($houseNr)
        {
            $this->houseNr = $houseNr;
            return $this;
        }
        
        public function setCity($city)
        {
            $this->city = $city;
            return $this;
        }
        
        public function setLocation($location)
        {
            $this->location = $location;
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
        
        public function setStatus($status)
        {
            $this->status = $status;
            return $this;
        }
        
        public function setUserId($userId)
        {
            $this->userId = $userId;
            return $this;
        }
        
        public function setPublicPin($publicPin)
        {
            $this->publicPin = $publicPin;
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
        
        public function getStreetName()
        {
            return $this->streetName;
        }
        
        public function getHouseNr()
        {
            return $this->houseNr;
        }
        
        public function getCity()
        {
            return $this->city;
        }
        
        public function getLocation()
        {
            return $this->location;
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
        
        public function getStatus()
        {
            return $this->status;
        }
        
        public function getUserId()
        {
            return $this->userId;
        }
        
        public function getPublicPin()
        {
            return $this->publicPin;
        }
        
        /* Functions */
        
        /* Checken of locatie al in database zit */
        public function existLocation($streetName, $houseNr, $city){
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT * FROM locations WHERE streetname = :streetname AND house_nr = :housenr AND city = :city ");
            $statement->bindValue(":streetname", $streetName);
            $statement->bindValue(":housenr", $houseNr);
            $statement->bindValue(":city", $city); 
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        
        /* Rubrieken ophalen */
        public function getRubrieken()
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT * FROM rubrieken");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getSingleRub($rubId)
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT icon_url FROM rubrieken WHERE id = :id");
            $statement->bindValue(":id", $this->getRub()); 
            /* Hier moeten we de id van de gekozen rubriek ophalen/koppelen */
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        /* Subrubrieken ophalen gelinkt aan rubriek */
        public function getSubrubrieken($rubId)
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT subrubrieken.* FROM subrubrieken WHERE rubriek_id = :rubId");
            $statement->bindValue(":rubId", $this->getRub()); 
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getSingleSubrub($subName) 
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT id FROM subrubrieken WHERE name = :name");
            $statement->bindValue(":name", $subName); 
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        /* Locatie opslaan in locaties-tabel en hiervan id returnen */
        public function saveLocation(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("INSERT INTO locations (lng, lat, streetname, house_nr, city) VALUES(:lng, :lat, :streetname, :houseNr, :city)");
            $statement->bindValue(":lng", $this->getLng());
            $statement->bindValue(":lat", $this->getLat());
            $statement->bindValue(":streetname", $this->getStreetName());
            $statement->bindValue(":houseNr", $this->getHouseNr());
            $statement->bindValue(":city", $this->getCity());
            $result = $statement->execute();          
            return $result;
        }
        
        /* Id van bestaande locatie ophalen */
        public function getLocationId($streetName, $houseNr, $city){
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT id FROM locations WHERE streetname = :streetname AND house_nr = :housenr AND city = :city ");
            $statement->bindValue(":streetname", $streetName);
            $statement->bindValue(":housenr", $houseNr);
            $statement->bindValue(":city", $city);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        
        /* Afbeelding ophalen uit images-tabel en hiervan id returnen*/
        public function getImgId($imgName){
        $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT id FROM images WHERE name = :name");
        $statement->bindValue(":name", $imgName);
        $statement->execute();
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        return $result;
        }
        
        /* Melding toevoegen */
        public function createPin()
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("INSERT INTO pins (location_id, img_id, description, status_id, rubriek_id, subrubriek_id, user_id, public) VALUES(:location, :img, :description, :status, :rub, :subrub, :user, :public)");
            $statement->bindValue(":location", $this->getLocation());
            $statement->bindValue(":img", $this->getImage());
            $statement->bindValue(":description", $this->getDescription());
            $statement->bindValue(":status", 1);
            $statement->bindValue(":rub", $this->getRub());
            $statement->bindValue(":subrub", $this->getSubRub());
            $statement->bindValue(":user", $this->getUserId());
            $statement->bindValue(":public", $this->getPublicPin());
            $result = $statement->execute();
            return $result;
        }
        
        /* Alle meldingen ophalen */
        public function getAllPins()
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT pins.*, locations.streetname, locations.house_nr, locations.city, statussen.status_name, rubrieken.icon_url, rubrieken.name FROM pins, locations, statussen, rubrieken WHERE pins.user_id = :userId AND pins.location_id = locations.id AND pins.status_id = statussen.id AND pins.rubriek_id = rubrieken.id ORDER BY pins.date DESC");
            $statement->bindValue(":userId", $this->getUserId());
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        
        /* Meldingen per status ophalen */
        public function getAllByStatus($status)
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT pins.*, locations.streetname, locations.house_nr, locations.city, statussen.status_name, rubrieken.icon_url, rubrieken.name FROM pins, locations, statussen, rubrieken WHERE pins.user_id = :userId AND pins.location_id = locations.id AND pins.status_id = statussen.id AND pins.status_id = :status AND pins.rubriek_id = rubrieken.id ORDER BY pins.date ASC");
            $statement->bindValue(":userId", $this->getUserId());
            $statement->bindValue(":status", $status);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        
        /* Meldingen locatie en icon_url ophalen voor Google-maps markers*/
        public function getPinsLocation()
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT pins.*, locations.lat, locations.lng, rubrieken.icon_url, subrubrieken.name FROM pins, locations, rubrieken, subrubrieken WHERE pins.location_id = locations.id AND pins.rubriek_id = rubrieken.id AND pins.subrubriek_id = subrubrieken.id AND subrubrieken.rubriek_id = rubrieken.id AND pins.public=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        
        /* Meldingen locatie en icon_url ophalen voor Google-maps markers voor AFVAL*/
        public function getAfvalLocation()
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT pins.*, locations.lat, locations.lng, rubrieken.icon_url, subrubrieken.name FROM pins, locations, rubrieken, subrubrieken WHERE pins.location_id = locations.id AND pins.rubriek_id = rubrieken.id AND pins.subrubriek_id = subrubrieken.id AND subrubrieken.rubriek_id = rubrieken.id AND rubriek.id=1 AND pins.public=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        
        
        
        /* Info over  aantal meldingen */
        public function allPins(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT * FROM pins");
        $statement->execute();
        
        return $statement;
        }
        
        
        public function getAmountPins()
        {
            $statement = $this->allPins();
            $count = $statement->rowCount();
            return $count;
        }
        
        /* Info over aantal opgeloste pins */
        public function allFixedPins()
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT * FROM pins WHERE status_id = 3");
            $statement->execute();
            return $statement;
        }
        
        public function getAmountFixedPins()
        {
            $statement = $this->allFixedPins();
            $count = $statement->rowCount();
            return $count;
            
        }

        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    }