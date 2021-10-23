<?php
include('book.class.php');


class BookView extends Book{

    public function displayAllBook(){
        $books = new BookView();
        return $books->getBooks();
    }

    public function displayBook($book_title){
        $book = new Book();
        return $book->getBook($book_title);
    }

    public function displayBookInfo($id){
        $book = new Book();
        return $book->getBookInfo($id);
    }
}

?>