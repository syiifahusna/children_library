<?php
    include('asset/header.php');
    include('includes/user.view.php');
    
    if(isset($_SESSION["userID"])){
        $user = new UserView();
        $userInfo = $user->getUserInfo($_SESSION["userID"]);
        //var_dump($userInfo);
    }else{
         //redirect to index
         header('Location: index.php');
         exit();
    }
?>
<section>
    <h1>Profile</h1>
    <div class="form-container" style="width:30rem;">
        <div>
            <div class="form-col">
                <label>Username: </label>
                <label><?php echo $userInfo["username"]; ?></label>
            </div>
            <div class="form-col">
                <label>Email: </label>
                <label><?php echo $userInfo["email"]; ?></label>
            </div>
            <div class="form-col">
                <label>Full Name: </label>
                <label><?php echo $userInfo["fullname"]; ?></label>
            </div>
            <div class="form-col">
                <label>Age: </label>
                <label><?php echo $userInfo["age"]; ?></label>
            </div>
        </div>
    </div>
</section>

<?php
    include('asset/footer.php');
?>