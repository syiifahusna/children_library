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
            return $conn->connect_error;
        }else{
            return $conn;
        }
    }

}


class Test extends Connection{

    protected function test(){

        $sql = "SELECT * FROM book";
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            //output data of each row
            return $result;
            
        }else{
            return 0;
        }

    }

}

class Display extends Test{

    public function display($search){
        $test = new Test();
        $testing = $test->test();
    }
}
$a="rapun";
$display = new Display($a);

?>

