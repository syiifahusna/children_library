<?php
include('connection.php');

//model book class extends connection class
class Book extends Connection{

    protected function getBooks(){

        $sql = "SELECT * FROM book";
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        }else{
            return $result;
        }
    }

    protected function getBook($book_title){
        //fix search security
        $sql = "SELECT * FROM book WHERE book_title LIKE '%". $book_title ."%'";
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        }else{
            return  $result;
        }
        
    }

    protected function getBookInfo($id){
        //fix search security
        $sql = "SELECT * FROM book WHERE id = '". $id ."'";
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            //return 1 row
            return $result->fetch_assoc();
        }else{
            return  $result;
        }
    }

}

?>