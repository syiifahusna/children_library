<?php
    include('asset/header.php');
    include('includes/borrow.view.php');
    
    //if session running
    if(isset($_SESSION["userID"])){
        //check if id exist
        if(isset($_GET["id"])){
            $borrowView = new BorrowView();
            $id = $_GET["id"];
            $borrowInfo = $borrowView->displayBorrowInfo($id);
        }else{
            //redirect to books
            header('Location: books.php');
            exit();
        }
    }else{
        //redirect to index
        header('Location: index.php');
        exit();
    }
?>

<section>
    <h1>Borrow Ticket</h1>
    <div class="col-2-container">            
        <div class="col-2-content">
            <div style="text-align:right;">
                <div class="form-col">
                    Book Title: <h2><?php echo $borrowInfo['book_title']; ?></h2>
                </div>
                <div class="form-col">
                    Borrow Date: <div class="borrow-info"><?php echo $borrowInfo['borrow_date']; ?></div>
                </div>
                <div class="form-col">
                    Return Date: 
                    <div class="borrow-info"><?php echo $borrowInfo['borrow_return']; ?></div>
                </div>
                <div  class="form-col">
                    Total Days Borrow:
                    <div class="borrow-info">9</div>
                </div>
                <div class="form-col">
                    Borrow By:
                    <div class="borrow-info"><?php echo $borrowInfo['fullname']; ?></div>
                </div>
                <div class="form-col">
                    Borrower Email:
                    <div class="borrow-info"><?php echo $borrowInfo['email']; ?></div>
                </div>
                <div class="form-col">
                    <h3>Visit Your Borrowed Books to see all books borrowed</h3>
                </div>
                <div class="form-col">
                    <a href="borrowed_books.php" class="btn-4">Borrowed Books</a>
                    <button class="btn" onclick="window.print();">Print</button>
                </div>
            </div>
        </div>
        <div  class="col-2-content">
            <img src="<?php echo "book_img/". $borrowInfo['book_cover']; ?>" class="col-2-img" style="width:30rem">
        </div>
    </div>
</section>

<?php
    include('asset/footer.php');
?>