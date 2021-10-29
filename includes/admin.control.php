<?php
include('admin.class.php');

class AdminControl extends Admin{

    private $username;
    private $password;

    public function setAdminLogin($username,$password){
        $this->username = $username;
        $this->password = $password;
    }

    public function loginAdmin(){
        $errInfo = "";
        //Length Validation
        if(($this->validateLengthUsername() == true) && ($this->validateLengthPassword() == true)){
            //Validate username
            if($this->validateUsername() == true){
                //hash submited password
                $hashPassword = $this->hashPassword();

                $admin = $this->getAdmin($this->username,$hashPassword);
                //if account exist get
                if($admin == false){
                    $errInfo ="Wrong Username or Password";
                    header('Location: admin_login.php?errInfo='. $errInfo);
                    exit();
                }else{
                   //start session
                    session_start();

                    $_SESSION["adminID"] = $admin["id"];
                    $_SESSION["adminUsername"] = $admin["admin_username"];

                    header('Location: admin_home.php');
                    exit();
                }
            }else{
                $errInfo ="Form Not Filled Properly";
                header('Location: admin_login.php?errInfo='. $errInfo);
                exit();
            }
        }else{
            $errInfo ="All Field must be more than 5 Character";
            header('Location: admin_login.php?errInfo='. $errInfo);
            exit();
        }
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

    private function validateLengthPassword(){
        $password_length = strlen($this->password);
        if($password_length <= 50 && $password_length > 5){
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
     //hash password;
     private function hashPassword(){
        $hashPassword = md5($this->password);
        return $hashPassword;
    }
}



?>