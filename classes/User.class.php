<?php

    include_once("Db.class.php");

    class User {
        private $email;
        private $password;
        private $id;
        
    /*Setters*/
        
    public function setEmail($email)
    {
      if(empty($email)){
            throw new Exception("Gelieve een e-mailadres in te vullen.");
      }
        $this->email = $email;
        return $this;
    }

    public function setPassword($password)
    {
        if(empty($password)){
            throw new Exception("Gelieve een wachtwoord in te vullen.");
        }
        $this->password = $password;
        return $this;
    }
        
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    /*Getters*/
        
    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
        
    public function getId()
    {
        return $this->id;
    }

        
    /*Registreer nieuwe gebruiker*/
    public function register() {
        $conn = Db::getInstance();   
        $statement = $conn->prepare("insert into users (email, password) values (:email, :password)");    
        $hash = password_hash($this->password, PASSWORD_BCRYPT);
        $statement->bindValue(":email", $this->getEmail());
        $statement->bindParam(":password", $hash);                
        $result = $statement->execute();
        return $result;   
    }

    
    public function login() {
        $conn = Db::getInstance();    
        $statement = $conn->prepare("select * from users where email = :email");
        $statement->bindValue(":email", $this->getEmail());
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_OBJ);
        if($result){
			
			if(password_verify($this->password, $result->password)){
				return true;
            }
            else{
                //return false;
                throw new Exception("Je wachtwoord komt niet overeen met dit e-mailadres. Probeer opnieuw.");
             }
        }
        else{
            throw new Exception("Dit account bestaat niet. ");
            return false;
        }
         
    }

        
    public function getIdbyEmail(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT id FROM `users` WHERE email = :email");
        $statement->bindValue(":email", $this->getEmail());
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }

    public function loggedInUser(){
        $id = $_SESSION["user"];
        return $id;
    }
        
    public function getDetails()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT * FROM `users` WHERE id = :id");
        $statement->bindValue(":id", $this->getId());
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_OBJ);
        return $result;
    }
        
    public function editUser()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("UPDATE users SET email = :email, password = :password WHERE id = :id");
        $statement->bindValue(":email", $this->getEmail());
        $statement->bindValue(":password", $this->getPassword());
        $statement->bindValue(":id", $this->loggedInUser());
        $result = $statement->execute();
        return $result;
    }
        
    /* Info over  aantal gebruikers */
         public function allUsers(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT * FROM users");
        $statement->execute();
        
        return $statement;
        }
        
        
        public function getAmountUsers()
        {
            $statement = $this->allUsers();
            $count = $statement->rowCount();
            return $count;
        }



}

?>
