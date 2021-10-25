<?php
session_start();

if(isset($_POST["register"])){
    //grab posted data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $fullname = $_POST["fullname"];
    $age = $_POST["age"];

    //create obj usercontroller
    include('includes/user.control.php');
    $register = new UserControl();
    //set user
    $register->setUser($username,$email,$password,$fullname,$age);
    //error handler
    $errinfo = $register->registerUser();
    //errInfo
    echo $errinfo;

}else if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    //create obj usercontroller
    include('includes/user.control.php');
    $login = new UserControl();

    $login->setUserLogin($username,$password);
    $login->loginUser();

}else if(isset($_GET["logout"])){
    if($_GET["logout"] == true){
        //create obj usercontroller
        include('includes/user.control.php');
        $login = new UserControl();
        //logout
        $login->logoutUser();
    }else{
        //blank
    }
}else if(isset($_GET["borrow"])){
    //check if session exist for load page
    if(isset($_SESSION["userID"])){
        //redirect to index
        header('Location: borrow_book.php');
        exit();
    }else{
         //redirect to index
         header('Location: login.php');
         exit();
    }
}else{
    //blank
}


?>