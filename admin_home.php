<?php
    include('asset/header.php');    
    if(isset($_SESSION["adminID"])){
        
    }else{
        //redirect to index
        header('Location: index.php');
        exit();
    }
    
?>

<section>
<h1>Admin Home</h1>
    <div class="col-container">
        <div class="col-box">
            <h2>Books</h2>
            <p>
               See all books. Add update and delete books
            </p>
            <a href="admin_books.php" class="btn-3">More</a>
        </div>
        <div class="col-box">
            <h2>Users</h2>
            <p>
               See all users and Modify User if nessasary 
            </p>
            <a href="admin_users.php" class="btn-3">More</a>
        </div>
        <div class="col-box">
            <h2>Borrow record</h2>
            <p>
               See all all borrow record. Latest. 
            </p>
            <a href="admin_borrow_record.php" class="btn-3">More</a>
        </div>
    </div>
</section>

<script>
</script>

<?php
    include('asset/footer.php');
?>