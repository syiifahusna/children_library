<?php
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
    echo $login->loginUser();

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
}else if(isset($_POST["admin_login"])){
    
    if($_POST["admin_login"] != ""){
        $username = $_POST["username"];
        $password = $_POST["password"];

        //create obj usercontroller
        include('includes/admin.control.php');
        $login = new AdminControl();
        $login->setAdminLogin($username,$password);    
        echo $login->loginAdmin();
    }else{
        header('Location: admin_login.php?errInfo="Wrong Username or Password"');
        exit();
    }



}else{
    header('Location: login.php');
    exit();
}


?>