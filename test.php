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

    protected function UserC(){

        
    }
}

class UserControl extends User{
    public function userV(){
        
    }
}

$user = new UserControl();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "child_library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM borrow INNER JOIN books ON borrow.book_id = books.id INNER JOIN users ON borrow.user_id = users.id WHERE borrow.id=6";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    print_r($row);
  }
} else {
  echo "0 results";
}

?>

