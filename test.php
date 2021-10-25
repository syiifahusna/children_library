<?php
//create class connection to connect with library
class Connection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "child_library";

    protected function connect(){
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password,$this->database);
        
        // Check connection
        if ($conn->connect_error) {
            return die("Connection failed: " . $conn->connect_error);
        }else{
            return $conn;
        }
    }

}

class User extends Connection{

    protected function register($username,$email){
        if(($username == true) && ($email == true)){
            return "both true";
        }else{
            return "all false or 1 false";
        }
        
    }
}

class UserControl extends User{
    private $age;

    public function __construct($age){
        $this->age = $age;
    }

    public function rgis(){
        if($this->validateNumber() == true){
            echo "true";
        }else{
            echo "false";
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
}

$aa = new UserControl("aa");
echo md5("hello");
?>

