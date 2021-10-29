<?php
if(isset($_POST["borrowYes"])){
    //get submited data
    $bookID = $_POST["bookID"];
    $dateBorrow = $_POST["dateBorrow"];
    $dateReturn = $_POST["dateReturn"];
    $userID = $_POST["UserID"];

    //create obj from controller
    include('includes/borrow.control.php');
    $borrow = new BorrowControl();
    //insert into obj
    $borrow->setBorrow($bookID,$userID,$dateBorrow,$dateReturn);

    //get last id
    $borrow_id = $borrow->insertBorrow();
    echo $borrow_id;

}else if(isset($_POST["updateUser"])){
    if($_POST["updateUser"] == true){
        $id=$_POST["id"];
        $username=$_POST["username"];
        $email=$_POST["email"];
        $fullname=$_POST["fullname"];
        $age=$_POST["age"];

        include('includes/user.control.php');
        $user = new UserControl();
        $user->updateUser($id, $username, $email, $fullname, $age);
        echo "true";
    }else{
        echo "false";
    }

}else if(isset($_POST["updateBook"])){
    if($_POST["updateBook"] == "true"){
        
        $bookId= $_POST["bookID"];
        $bookTitle= $_POST["bookTitle"];
        $aboutBook= $_POST["aboutBook"];
        $publishDate= $_POST["publishDate"];
        $category= $_POST["category"];

        include('includes/book.control.php');
        $book = new BookControl();
        $book->updateBook($bookId,$bookTitle,$aboutBook,$publishDate,$category);
        echo "true";
    }else{
         echo "false";
    }
}else if(isset($_POST["addNewBook"])){
    $bookTitle = $_POST["bookTitle"];
    $aboutBook = $_POST["aboutBook"];
    $publishDate = $_POST["publishDate"];
    $category = $_POST["category"];
    $bookCover = $_FILES["bookCover"]["name"];

    echo $aboutBook;
    include('includes/book.control.php');
    $book = new BookControl();
    echo $book->addBook($bookTitle,$aboutBook,$publishDate,$category);  
    header('Location: admin_books.php');
    exit();
}else if(isset($_POST["deleteBook"])){
    
    if($_POST["deleteBook"] == null){
        echo "false";
    }else{
        $bookId = $_POST["deleteBook"];
        $bookCover = $_POST["bookCover"];

        include('includes/book.control.php');
        $book = new BookControl();
        $book->deleteBook($bookId,$bookCover);

        echo "true";
    }
}else{
    header('Location: index.php');
    exit();
}
?>