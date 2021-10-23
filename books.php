<?php
    include('asset/header.php');
    include('includes/book.view.php');
?>
<!-- Search -->
<section>
<h1>Search Book</h1>
        <div class="form-container">
            <!-- sent data to itself -->
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-col">
                    <input type="text" name="search_book" class="form-txt" placeholder="Book Title">
                </div>
                <div class="form-col">
                    <input type="submit" value="Search" class="btn">
                </div>
            </form>
        </div>
</section>

<!-- Col -->
<section class="col" id="col">
        <h1>Children Books</h1>
        <div class="col-container">
            <?php
                $bookView = new BookView();
                if(isset($_GET["search_book"]) != ""){
                    $books = $bookView->displayBook($_GET["search_book"]);
                }else{
                    $books = $bookView->displayAllBook();
                }
                
                foreach ($books as $row){
            ?>

            <div class="col-box">
                <img src="<?php echo  "book_img/".$row["book_cover"]?>" alt="" class="col-img">
                <h2><?php echo  $row["book_title"] ?></h2>
                <p>
                    Published Date: <?php echo  $row["publish_date"] ?>
                </p>
                <p>
                    <?php echo  $row["category"] ?>
                </p>
                <a href="book_info.php?id=<?php echo  $row["id"] ?>" class="btn-3">More</a>
            </div> 
        <?php
            }        
        ?>
        </div>
    </section>


<?php
    include('asset/footer.php');
?>