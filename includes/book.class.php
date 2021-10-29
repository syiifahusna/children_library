<?php
include('connection.php');

//model book class extends connection class
class Book extends Connection{

    protected function getBooks(){

        $sql = "SELECT * FROM books ORDER BY id DESC";
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        }else{
            return $result;
        }
    }

    protected function getBook($book_title){
        //fix search security
        $sql = "SELECT * FROM books WHERE book_title LIKE '%". $book_title ."%'";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        }else{
            return  $result;
        }
    }

    protected function getBookInfo($id){
        //fif i add and or where condition probably will get error
        $sql = "SELECT * FROM books WHERE id = '". $id ."'";
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