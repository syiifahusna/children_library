<?php
    include('asset/header.php');
    include('includes/book.view.php');
    
    if(isset($_SESSION["userID"])){
    }else{
         //redirect to index
         header('Location: index.php');
    }
?>

<section>
    <h1>Borrow This Book?</h1>
    <div class="col-2-container">            
        
        <div  class="col-2-content">
            <img src="book_img/4.jpg" class="col-2-img">
        </div>
        <div class="col-2-content">
            <h2>This is col-2 content</h2>
            <table>
                <tr>
                    <th>Person 1</th>
                    <th>Person 2</th>
                    <th>Person 3</th>
                </tr>
                <tr>
                    <td>Emil</td>
                    <td>Tobias</td>
                    <td>Linus</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>14</td>
                    <td>10</td>
                </tr>
            </table>
            <br>
            <a href="#" class="btn">Learn more</a>
        </div>
    </div>
</section>

<?php
    include('asset/footer.php');
?>