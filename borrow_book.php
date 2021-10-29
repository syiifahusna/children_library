<?php
    include('asset/header.php');
    include('includes/book.view.php');
    
    if(isset($_SESSION["userID"])){
        //check if id exist
        if(isset($_GET["id"])){
            $bookView = new BookView();
            $id = $_GET["id"];
            $bookInfo = $bookView->displayBookInfo($id);
        }else{
        //redirect to books
         header('Location: books.php');
         exit();
        }
    }else{
         //redirect to index
         header('Location: login.php');
         exit();
    }
?>

<section>
    <h1>Borrow This Book?</h1>
    <div class="col-2-container">            
        
        <div class="col-2-content">
            <h2><?php echo $bookInfo['book_title']?></h2>
            <form method="post" action="load2.php" style="text-align:right;">
                <div class="form-col">
                    Borrow by: <div class="borrow-info"><?php echo $_SESSION["userName"]; ?></div>
                </div>
                <div class="form-col">
                    Date Borrow: 
                    <div class="borrow-info">
                        <?php 
                            $today = date("Y-m-d");
                            echo $today;  
                            
                        ?>
                    </div>
                </div>
                <div class="form-col">
                    Date to be return: 
                    <div class="borrow-info">
                        <?php  
                            //put these in function in borrowcontroller class
                            $date = new DateTime($today);
                            $return = $date->modify('+9 days');
                            $toReturn = $return->format('Y-m-d');
                            echo $toReturn;
                        ?>
                    </div>
                </div>
                <div class="form-col">
                    Total Days Borrow:
                    <div class="borrow-info">9</div>
                </div>
                <div class="form-col">
                    <h3>Are You Sure You Want To Borrow This Book?</h3>
                </div>
            
                <button type="button" class="btn" id="borrowYes">Yes</button>
                <a class="btn-4" href="book_info.php?id=<?php echo $_GET["id"];?>" style="padding: 0.8rem 1rem;">No </a>
            </form>
        </div>
        <div  class="col-2-content">
            <img src="<?php echo "book_img/".$bookInfo['book_cover'] ?>" class="col-2-img" style="width:30rem">
        </div>
    </div>
</section>

<script>
let btnYes = document.getElementById("borrowYes");
btnYes.addEventListener("click",function(){
    borrow();
});

function borrow(){
    let lblBookID = <?php echo $_GET["id"]; ?>;
    let lblBorrowBy = document.getElementsByClassName("borrow-info")[0].innerHTML.trim();
    let lblDateBorrow = document.getElementsByClassName("borrow-info")[1].innerHTML.trim();
    let lblDateReturn = document.getElementsByClassName("borrow-info")[2].innerHTML.trim();
    let lblUserID = <?php echo  $_SESSION["userID"]; ?>

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        let id = xhttp.responseText;
        //console.log(id);
        location.href = 'reciept.php?id='+id;
    }
    xhttp.open("POST", "load2.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("borrowYes=true&bookID="+ lblBookID +"&dateBorrow="+ lblDateBorrow +"&dateReturn="+ lblDateReturn +"&UserID="+ lblUserID);
}
</script>

<?php
    include('asset/footer.php');
?>