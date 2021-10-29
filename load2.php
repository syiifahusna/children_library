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
        echo $id;
    }else{
        echo "false";
    }
}else if(isset($_POST["updateBook"])){
    if($_POST["updateBook"] == "true"){
        echo "true";
    }else{
        echo "false";
    }
}else if(isset($_POST["addNewBook"])){
    echo "add book";
    
}else{
}
?>