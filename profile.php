<?php
    include('asset/header.php');
    include('includes/user.view.php');
    
    if(isset($_SESSION["userID"])){
    }else{
         //redirect to index
         header('Location: index.php');
    }
?>
<section>
    <h1>Profile</h1>
</section>

<?php
    include('asset/footer.php');
?>