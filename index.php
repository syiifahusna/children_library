<?php
    include('asset/header.php');
?>

<section>
<h1>Search Book</h1>
        <div class="form-container">
            <form method="get" action="books.php">
                <div class="form-col">
                    <input type="text" name="search_book" class="form-txt" placeholder="Book Title">
                </div>
                <div class="form-col">
                    <input type="submit" value="Search" class="btn">
                </div>
            </form>
        </div>
</section>

<?php
    include('asset/footer.php');
?>