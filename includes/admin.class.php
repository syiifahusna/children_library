<?php
include('connection.php');

class Admin extends Connection{
    
    protected function getAdmin($username,$password){
        
        $sql = "SELECT * FROM admin WHERE admin_username ='". $username ."' AND admin_password='". $password ."'";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }else{
            return false;
        }
    }
}

?>