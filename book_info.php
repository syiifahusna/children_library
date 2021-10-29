<?php
    include('asset/header.php');
    include('includes/book.view.php');
?>

<section class="col-2">

<?php

if(isset($_GET["id"]) != ""){
    $bookView = new BookView();
    $id = $_GET["id"];
    $bookInfo = $bookView->displayBookInfo($id);
}else{
     //redirect to books
     header('Location: books.php');
    exit;
}

?>
<h1><?php echo $bookInfo['book_title']?></h1>
<div class="col-2-container">            
    <div class="col-2-content">
        <img src="<?php echo "book_img/".$bookInfo['book_cover'] ?>" class="col-2-img" style="width:30rem">
    </div>
    <div class="col-2-content">
    
        <h2>About Book</h2>
        <p>
            <?php echo $bookInfo['about_book'] ?>
        </p>
        <p>
            Publish Date: <?php echo $bookInfo['publish_date'] ?>
        </p>
        <p>
            Category: <?php echo $bookInfo['category'] ?>
        </p>
        <br>
        <a href="borrow_book.php?id=<?php echo $bookInfo['id'] ?>" class="btn-4">Borrow This Book</a>
    </div>
    
</div>

</section>

<?php
    include('asset/footer.php');
?>