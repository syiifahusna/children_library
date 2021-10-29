<?php
    include('asset/header.php');    
    include('includes/borrow.view.php');
    if(isset($_SESSION["adminID"])){
        $borrowView = new BorrowView();
        $borrow = $borrowView->displayBorrows();
        
    }else{
        //redirect to index
        header('Location: index.php');
        exit();
    }
?>

<section>
    <h1>Borrow Record</h1>
    <div class="table-bg">
        <table>
            <tr>
                <td>book title</td>
                <td>book id</td>
                <td>username</td>
                <td>full name</td>
                <td>borrow date</td>
                <td>return date</td>
            </tr>
            <?php
                foreach($borrow as $row){
            ?>
            <tr>
                <td><?php echo $row["book_title"] ?></td>
                <td><?php echo $row["book_id"] ?></td>
                <td><?php echo $row["username"] ?></td>
                <td><?php echo $row["fullname"] ?></td>
                <td><?php echo $row["borrow_date"] ?></td>
                <td><?php echo $row["borrow_return"] ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</section>
</div>
<?php
    include('asset/footer.php');
?>