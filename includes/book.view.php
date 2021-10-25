<?php
include('book.class.php');


class BookView extends Book{

    public function displayAllBook(){
        $books = new BookView();
        return $books->getBooks();
    }

    public function displayBook($book_title){
        $book = new Book();
        //makesure string more than 2 character
        $book_title_length = strlen($book_title);
        if($book_title_length>2){
            return $book->getBook($book_title);
        }else{
            return $book->getBooks();
        }

        
    }

    public function displayBookInfo($id){
        $book = new Book();
        return $book->getBookInfo($id);
    }
}

?>