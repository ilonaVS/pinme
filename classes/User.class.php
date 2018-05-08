<?php

    include_once("Db.class.php");

    class User {
        private $email;
        private $password;
        
    /*Setters*/
        
    public function setEmail($email)
    {
      if(empty($email)){
            throw new EmailException("Gelieve een e-mailadres in te vullen.");
      }
        $this->email = $email;
        return $this;
    }

    public function setPassword($password)
    {
        if(empty($password)){
            throw new PasswordException("Gelieve een wachtwoord in te vullen.");
        }
        $this->password = $password;
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
        $result = $statement->fetch(PDO::FETCH_OBJ);
        
        return $result;
    }

    public function loggedInUser(){
        $this->setEmail($_SESSION['email']);
        $idArray = $this->getIdbyEmail();
        $id=$idArray->id;
        return $id;
    }



}

?>
