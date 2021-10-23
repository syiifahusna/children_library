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


?>