<?php
    include('asset/header.php');
    include('includes/borrow.view.php');
    
    if(isset($_SESSION["userID"])){
        $borrow = new BorrowView();
        $borrowed_books = $borrow->displayBorrowsInfo($_SESSION["userID"]);
    }else{
         //redirect to index
         header('Location: login.php');
         exit();
    }
?>
<section>
    <h1>Borrowed Books</h1>
    <div class="table-bg">
        <table>
            <tr>
                <td>Book Title</td>
                <td>Book Category</td>
                <td>Date Borrowed</td>
                <td>Date Return</td>
                <td>View Reciept</td>
            </tr>
            <?php foreach ($borrowed_books as $row){?>
            <tr>
                <td><?php echo $row["book_title"];?></td>
                <td><?php echo $row["category"];?></td>
                <td><?php echo $row["borrow_date"];?></td>
                <td><?php echo $row["borrow_return"];?></td>
                <td><a href="reciept.php?id=<?php echo $row["id"]; ?>" class="btn-4">Reciept</a></td>
            </tr>
            <?php }?>
        </table>
    </div>
</section>

<?php
    include('asset/footer.php');
?>