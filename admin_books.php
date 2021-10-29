<?php
    include('asset/header.php');    
    include('includes/book.view.php');
    if(isset($_SESSION["adminID"])){
        $bookView = new BookView();
        $books = $bookView->displayAllBook();
    }else{
        //redirect to index
        header('Location: index.php');
        exit();
    }
    
?>

<section>
<h1>Admin Books</h1>
    <div class="container">
        <button type="button" class="btn" id="addNew">Add new book</button>
       
    </div>
    <br>
    <div class="col-container">
        <?php
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
            <br>
            <button type="button" class="btn-3" id="btn-modal-update<?php echo  $row["id"] ?>">Edit</button>
            <button type="button" class="btn-4" id="btn-modal<?php echo  $row["id"] ?>">Delete</button>
        </div>
        <?php
            }
        ?>
</section>

<div class="modal" id="modal"></div>

<script>
    let modal = document.getElementById("modal");
    let btnAddNew = document.getElementById("addNew");
    btnAddNew.addEventListener("click",function(){
        modal.style.display = "block";
        modal.innerHTML = inModelAddNew();
        closeModal();
    });

    function inModelAddNew(){
        html =  '<div class="modal-content">'+
                    '<span class="modal-close"><i class="fas fa-times"></i></span>'+
                    '<h1>Add New Book</h1>'+
                    '<form action="load2.php" method="post" enctype="multipart/form-data">'+
                        '<div class="form-col">'+
                            '<label>Book Title</label>'+
                            '<input type="text" class="form-txt" name="bookTitle" required>'+
                        '</div>'+
                        '<div class="form-col">'+
                            '<label>About Book</label>'+
                            '<textarea class="form-txt" name="aboutBook" required></textarea>'+
                        '</div>'+
                        '<div class="form-col">'+
                            '<label>Publish Date</label>'+
                            '<input type="date" class="form-txt" name="publishDate" required>'+
                        '</div>'+
                        '<div class="form-col">'+
                            '<label>Category</label>'+
                            '<select class="form-txt" name="category" required>'+
                                '<option value="Poetry">Poetry</option>'+
                                '<option value="Self-Help">Self-Help</option>'+
                                '<option value="Baby">Baby</option>'+
                                '<option value="Story Book">Story Book</option>'+
                            '</select>'+
                        '</div>'+
                        '<div class="form-col">'+
                            '<label>Book Cover</label>'+
                            '<input type="file" class="form-txt" name="bookCover" accept="image/*" required>'+
                        '</div>'+
                        '<div class="form-col">'+
                            '<input type="submit" class="btn" name="addNewBook" value="Add New Book">'+
                        '</div>'+
                    '</form>'+
                '</div>';

        return html;
    }

    <?php foreach ($books as $row){ ?>
        let btn<?php echo $row["id"]; ?> = document.getElementById("btn-modal<?php echo  $row["id"] ?>");

        // When the user clicks the button, open the modal 
        btn<?php echo $row["id"]; ?>.addEventListener("click",function(){
            modal.style.display = "block";
            modal.innerHTML = inModel();
            // Get the btn
            let btnNo= document.getElementById("no");
            let btnYes= document.getElementById("yes");
            //btn action
            btnNo.addEventListener("click",function(){
                modal.style.display = "none";
            });

            btnYes.addEventListener("click",function(){
                //send delete request to load2 here
                modal.innerHTML = inModelYes();
                let close= document.getElementById("close");
                close.addEventListener("click",function(){
                    window.location.reload(true);
                });
            });
        });

        let btnEdit<?php echo $row["id"]; ?> = document.getElementById("btn-modal-update<?php echo  $row["id"] ?>");
        btnEdit<?php echo $row["id"]; ?>.addEventListener("click",function(){
            modal.style.display = "block";
            modal.innerHTML = inModelEdit("<?php echo $row["id"]; ?>","<?php echo $row["book_title"]; ?>","<?php echo $row["about_book"]; ?>","<?php echo $row["publish_date"]; ?>","<?php echo $row["category"]; ?>","<?php echo $row["book_cover"]; ?>");       
            closeModal();

            //update 
            let  btnUpdate= document.getElementById("update");
            btnUpdate.addEventListener("click",function(){
                //get Element
                bookID = document.getElementsByClassName("form-txt")[0].value;
                bookTitle = document.getElementsByClassName("form-txt")[1].value;
                aboutBook = document.getElementsByClassName("form-txt")[2].value;
                publishDate = document.getElementsByClassName("form-txt")[3].value;
                category = document.getElementsByClassName("form-txt")[4].value;

                //console.log(bookID,bookTitle,aboutBook,publishDate,category);
                //send update request to load2 here
                inModelUpdate(bookID,bookTitle,aboutBook,publishDate,category);
            });
        });
    <?php
        }
    ?>
    function inModel(){
        html =  '<div class="modal-content">'+
                    '<h1>Are you Sure You Want To Delete This Book?</h1>'+
                    '<p>'+
                        '<button type="button" class="btn" id="yes">Yes</button>' +
                        '<button type="button" class="btn-3" id="no">No</button>'+
                    '</p>'+
                '</div>';
        return html;
    }

    function inModelYes(){
        html =  '<div class="modal-content">'+
                    '<h1>Book has been deleted!</h1>'+
                    '<p>'+
                        'all borrow records are also deleted' +
                    '</p>'+
                    '<p>'+
                        '<button type="button" class="btn-3" id="close">Close</button>'+
                    '</p>'+
                '</div>';
        return html;
    }

    function inModelNotify(noti){
        html = '<div class="modal-content">'+
                '<span class="modal-close"><i class="fas fa-times"></i></span>'+
                '<h1>'+noti+'</h1>'+
            '</div>';
        return html;
    }

    function closeModal(){
        let close = document.getElementsByClassName("modal-close")[0];
        close.addEventListener("click",function(){
            modal.style.display = "none";
        });
    }

    function closeModalRefresh(){
        let close = document.getElementsByClassName("modal-close")[0];
        close.addEventListener("click",function(){
            modal.style.display = "none";
            window.location.reload(true);
        });
    }

    function inModelEdit(bookID,bookTitle,aboutBook,publishDate,category){
        html = '<div class="modal-content">'+
        '<span class="modal-close"><i class="fas fa-times"></i></span>'+
        '<h1>Update Book information</h1>'+
        '<form>'+
            '<div class="form-col">'+
                '<label>book Id</label>'+
                '<input type="text" class="form-txt" value="'+ bookID +'" required disabled>'+
            '</div>'+
            '<div class="form-col">'+
                '<label>book title</label>'+
                '<input type="text" class="form-txt" value="'+ bookTitle +'" required>'+
            '</div>'+
            '<div class="form-col">'+
                '<label>about book</label>'+
                '<textarea type="text" class="form-txt" required>'+ aboutBook +'</textarea>'+
            '</div>'+
            '<div class="form-col">'+
                '<label>publish date</label>'+
                '<input type="date" class="form-txt" value="'+ publishDate +'" required>'+
            '</div>'+
            '<div class="form-col">'+
                '<label>book category</label>'+
                '<select class="form-txt" name="category">'+
                    '<option value="'+category+'">'+category+'</option>'+
                    '<option value="Poetry">Poetry</option>'+
                    '<option value="Self-Help">Self-Help</option>'+
                    '<option value="Baby">Baby</option>'+
                    '<option value="Story Book">Story Book</option>'+
                '</select>'+
            '</div>'+
            '<div class="form-col">'+
                '<button type="button" class="btn" id="update">Update</button>'+
            '</div>'+           
        '</form>'+        
        '</div>';

        return html;
    }

    function inModelUpdate(bookID,bookTitle,aboutBook,publishDate,category){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            updateBook = this.responseText;
            if(updateBook == false){
                let inform = inModelNotify("Error something wrong");
                modal.innerHTML = inform;
                closeModalRefresh()
            }else{
                let inform = inModelNotify("Succesfully update book");
                modal.innerHTML = inform;
                closeModalRefresh()
            }
        }
        xhttp.open("POST", "load2.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("updateBook=true&bookID="+bookID+"&bookTitle="+bookTitle+"&aboutBook="+aboutBook+"&publishDate="+publishDate+"&category="+category);
    }

</script>

<?php
    include('asset/footer.php');
?>