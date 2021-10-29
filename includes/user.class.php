<?php
include('connection.php');

class User extends Connection{

    protected function setNewUser($username,$email,$password,$fullname,$age){
        $sql = "INSERT INTO users (username, email, password, fullname, age)VALUES ('".$username."', '".$email."', '".$password."', '".$fullname."', '".$age."')";
        if ($this->connect()->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    protected function checkUser($username,$email){
        $sql = "SELECT username, email FROM users WHERE username ='". $username ."' OR email='". $email ."'";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

    protected function getUser($username,$password){
        $sql = "SELECT * FROM users WHERE username ='". $username ."' AND password='". $password ."'";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }else{
            return false;
        }
    }

    protected function getAllUsers(){
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $result = $this->connect()->query($sql);
        if($result){
            if ($result->num_rows > 0) {
                return $result;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    protected function getUserInfo($userId){
        $sql = "SELECT * FROM users WHERE id ='". $userId ."'";
        $result = $this->connect()->query($sql);
        if($result){
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
?>