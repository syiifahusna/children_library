<?php
    include('asset/header.php');
    include('includes/book.view.php');
    
    if(isset($_SESSION["userID"])){
    }else{
         //redirect to index
         header('Location: index.php');
         exit();
    }
?>
<section>
    <h1>Borrow Books</h1>
</section>

<section>
    <h1>Past Borrowed Books</h1>
</section>



<?php
    include('asset/footer.php');
?>