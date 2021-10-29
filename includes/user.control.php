<?php
include('user.class.php');

class UserControl extends User{

    private $id;
    private $username;
    private $email;
    private $password;
    private $fullname;
    private $age;

    public function setUser($username,$email,$password,$fullname,$age){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->age = $age;
    }

    public function setUserLogin($username,$password){
        $this->username = $username;
        $this->password = $password;
    }

    public function registerUser(){
        $errInfo ="";

        //Length Validation
        if(($this->validateLengthUsername() == true) && ($this->validateLengthEmail() == true) && ($this->validateLengthPassword() == true) && ($this->validateLengthFullname() == true)){
            //Validation
            if(($this->validateNumber() == true) && ($this->validateAge() == true) && ($this->validateUsername() == true) && ($this->validateEmail() == true)){
                //validate if username/email existed
                if($this->checkUser($this->username,$this->email) == true){
                    $errInfo ="Email or username Already Exist";
                }else{
                    $hashPassword = $this->hashPassword();
                    $this->setNewUser($this->username,$this->email,$hashPassword,$this->fullname,$this->age);
                    $errInfo ="Register Successful";
                }
            }else{
                $errInfo ="Form Not Filled Properly";
            }
        }else{
            $errInfo ="All Field Except Age must be more than 5 Character";
        }

        return $errInfo;
    }

    public function loginUser(){
        $errInfo = "";
        //Length Validation
        if(($this->validateLengthUsername() == true) && ($this->validateLengthPassword() == true)){
            //Validate username
            if($this->validateUsername() == true){
                //hash submited password
                $hashPassword = $this->hashPassword();

                $user = $this->getUser($this->username,$hashPassword);
                //if account exist get
                if($user == false){
                    $errInfo ="Wrong Username or Password";
                    header('Location: login.php?errInfo='. $errInfo);
                    exit();
                }else{
                   //start session
                    session_start();

                    $_SESSION["userID"] = $user["id"];
                    $_SESSION["userName"] = $user["username"];
                    $_SESSION["eMail"] = $user["email"];
                    $_SESSION["fullName"] = $user["fullname"];

                    header('Location: index.php');
                    exit();
                }
            }else{
                $errInfo ="Form Not Filled Properly";
                header('Location: login.php?errInfo='. $errInfo);
                exit();
            }
        }else{
            $errInfo ="All Field must be more than 5 Character";
            header('Location: login.php?errInfo='. $errInfo);
            exit();
        }
        return $errInfo;
    }

    public function logoutUser(){
        session_start();
        session_unset();
        session_destroy();

        $errInfo = "You Logged Out";
        header('Location: login.php?errInfo='. $errInfo);
        exit();
    }
    
    //validate length
    private function validateLengthUsername(){
        $username_length = strlen($this->username);
        if($username_length <= 50 && $username_length > 5){
            return true;
        }else{
            return false;
        }
    }

    private function validateLengthEmail(){
        $email_length = strlen($this->email);
        if($email_length <= 100 && $email_length > 5){
            return true;
        }else{
            return false;
        }
    }

    private function validateLengthPassword(){
        $password_length = strlen($this->password);
        if($password_length <= 50 && $password_length > 5){
            return true;    
        }else{
            return false;
        }
    }

    private function validateLengthFullname(){
        $fullname_length = strlen($this->fullname);
        if($fullname_length <= 100 && $fullname_length > 5){
            return true;   
        }else{
            return false;
        }
    }

    //validate number
    private function validateNumber(){
        if(is_numeric($this->age)){
            return true;
        }else{
            return false;
        }
    }

    //validate age
    private function validateAge(){
        if($this->age > 7 && $this->age < 70){
            return true;
        }else{
            return false;
        }
    }

    //validate username dosen't contain unwanted char
    private function validateUsername(){
        $pattern='/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
        if(preg_match($pattern,$this->username)){
            return false;
        }else{
            return true;
        }

    }
    
    //validate email
    private function validateEmail(){
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        else {
            return false;
        }
    }

    //hash password;
    private function hashPassword(){
        $hashPassword = md5($this->password);
        return $hashPassword;
    }
}

?>