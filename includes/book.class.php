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

    protected function editBook($bookId,$bookTitle,$aboutBook,$publishDate,$category){
        $sql = "UPDATE books SET book_title='".$bookTitle."', about_book='".$aboutBook."', publish_date='".$publishDate."', category='".$category."' WHERE id='".$bookId."'";

        if ($this->connect()->query($sql) === TRUE) {
           return true;
        } else {
            return false;
        }
    }

    protected function setBook($bookTitle,$aboutBook,$publishDate,$category,$bookCover){
        $sql = "INSERT INTO books (book_title, about_book, publish_date, category, book_cover) VALUES ('".$bookTitle."', '".$aboutBook."', '".$publishDate."', '".$category."', '".$bookCover."')";

        if ($this->connect()->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    protected function removeBook($bookId){
        // sql to delete a record
        $sql = "DELETE FROM books WHERE id= '". $bookId ."'";

        if ($this->connect()->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    protected function removeBorrowBook($bookId){
        // sql to delete a record
        $sql = "DELETE FROM borrow WHERE book_id= '".$bookId."'";

        if ($this->connect()->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

?>