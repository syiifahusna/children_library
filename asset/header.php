<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Children Library</title>

    <!-- Css -->
    <link rel="stylesheet" href="asset/style.css">

    <!--Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <?php
        if(isset($_SESSION["userID"])){
    ?>
            <!-- Login -->
            <header>
                <div class="navbar">
                    <h2><a href="index.php" class="logo">Children Library</a></h2>
                    <input type="checkbox" class="ck-collapse" id="btn-collapse">
                    <label for="btn-collapse" class="icon-collapse">
                        <span class="fas fa-bars"></span>
                    </label>
                    <div class="navbar-nav" id="navbar-nav">
                        <ul>
                            <li class="link-list"><a href="books.php">Books</a></li>
                            <li class="link-list"><a href="profile.php">Profile</a></li>
                            <li class="link-list"><a href="borrowed_books.php">Borrowed Books</a></li>
                            <li class="link-list"><a href="load.php?logout=true">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </header>
    <?php
        }else if(isset($_SESSION["adminID"])){
    ?>
            <!-- Admin -->
            <header>
                <div class="navbar">
                    <h2><a href="admin_home.php" class="logo">Children Library</a></h2>
                    <input type="checkbox" class="ck-collapse" id="btn-collapse">
                    <label for="btn-collapse" class="icon-collapse">
                        <span class="fas fa-bars"></span>
                    </label>
                    <div class="navbar-nav" id="navbar-nav">
                        <ul>
                            <li class="link-list"><a href="admin_books.php">Books</a></li>
                            <li class="link-list"><a href="admin_users.php">Users</a></li>
                            <li class="link-list"><a href="admin_borrow_record.php">Borrow Record</a></li>
                            <li class="link-list"><a href="load.php?logout=true">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </header>

    <?php
        }else{
    ?>        
            <header>
                <div class="navbar">
                    <h2><a href="index.php" class="logo">Children Library</a></h2>
                    <input type="checkbox" class="ck-collapse" id="btn-collapse">
                    <label for="btn-collapse" class="icon-collapse">
                        <span class="fas fa-bars"></span>
                    </label>
                    <div class="navbar-nav" id="navbar-nav">
                        <ul>
                            <li class="link-list"><a href="books.php">Books</a></li>
                            <li class="link-list"><a href="login.php">Login</a></li>
                        </ul>
                    </div>
                </div>
            </header>
    <?php
        }
    ?>
