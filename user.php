<?php

    class User {
        public $username;
        public $email;
        private $password;
        
        function ShowUser(){
            echo "<br>Username: {$this->username} <br>";
            echo "<br>Email: {$this->email} <br>";
            echo "<br>Password: {$this->password} <br>";
        }
        
        public function SetPassword($password){
            $this->password = $password;
        }
        
        public function GetPassword(){
            return $this->password;
        }
        
        function ValidateUser(){
            $errors = [];

            if(empty($this->username)){
                array_push($errors, "no username");
            }
            else if(empty($this->email)){
                array_push($errors, "no email");
            }
            else if(empty($this->password)){
                array_push($errors, "no password");
            }
            
            return $errors;
        }

        public function LoginUser(){      
            require_once "connect_DB.php";

            if ($this->username < 3){
                echo "<br>Username must be at least 3 characters";
            }
            else {
                $query = "SELECT * FROM user WHERE username = '$this->username' AND email = '$this->email' AND passwor = '$this->password'";
                $result = $conn->prepare($query);
                $result->execute();
    
                $row = $result->fetch(PDO::FETCH_ASSOC);
        
                if ($result->rowCount() > 0) {
    
                    $username_r = $row['username'];
                    $email_r = $row['email'];
                    $wachtwoord_r = $row['passw'];
    
                    if ($this->username == $username_r && $this->email == $email_r && $this->password == $wachtwoord_r) {
                        session_start();
                        $_SESSION['username'] = $this->username;
                        return true;
                    }
                } 
                else {
                    echo "<br>Wrong login info";
                }
            }
        }

        public function LogoutUser(){
            session_destroy();
        }
    }