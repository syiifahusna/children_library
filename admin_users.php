<?php
    include('asset/header.php');    
    include('includes/user.view.php');
    if(isset($_SESSION["adminID"])){
        $userView = new UserView();
        $users = $userView->displayAllUsers();
    }else{
        //redirect to index
        header('Location: index.php');
        exit();
    }
?>

<section>
    <h1>User List</h1>
    <div class="table-bg">
        <table>
            <tr>
                <td>id</th>
                <td>username</td>
                <td>email</td>
                <td>option</td>
            </tr>
            <?php
                foreach($users as $row){
            ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["username"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><button type="button" class="btn-3" id="edit<?php echo $row["id"] ?>">Edit</button></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</section>
<div class="modal" id="modal">
</div>


<script>
let modal = document.getElementById("modal");
<?php foreach($users as $row){ ?>
let btnEdit<?php echo $row["id"] ?> = document.getElementById("edit<?php echo $row["id"] ?>");
btnEdit<?php echo $row["id"] ?>.addEventListener("click",function(){
    modal.innerHTML = inModal("<?php echo $row["id"] ?>","<?php echo $row["username"] ?>","<?php echo $row["email"] ?>","<?php echo $row["fullname"]?>","<?php echo $row["age"] ?>");
    modal.style.display = "block";
    closeModal();

    //btnupdate user;
    //get All element
    let id = document.getElementsByClassName("form-txt")[0];
    let username = document.getElementsByClassName("form-txt")[1];
    let email = document.getElementsByClassName("form-txt")[2];
    let fullname = document.getElementsByClassName("form-txt")[3];
    let age = document.getElementsByClassName("form-txt")[4];

    let  btnUpdate= document.getElementById("update");
    btnUpdate.addEventListener("click",function(){
        updateUser(id,username,email,fullname,age);
    });
});

<?php } ?>

function inModal(id,username,email,fullname,age){
    $html = '<div class="modal-content">'+
        '<span class="modal-close"><i class="fas fa-times"></i></span>'+
        '<h1>Update user information</h1>'+
        '<form>'+
            '<div class="form-col">'+
                '<label>Id</label>'+
                '<input type="text" class="form-txt" value="'+ id +'" required disabled>'+
            '</div>'+
            '<div class="form-col">'+
                '<label>Username</label>'+
                '<input type="text" class="form-txt" value="'+ username +'" required>'+
            '</div>'+
            '<div class="form-col">'+
                '<label>Email</label>'+
                '<input type="email" class="form-txt" value="'+ email +'" required>'+
            '</div>'+
            '<div class="form-col">'+
                '<label>Full Name</label>'+
                '<input type="text" class="form-txt" value="'+ fullname +'" required>'+
            '</div>'+
            '<div class="form-col">'+
                '<label>Age</label>'+
                '<input type="number" class="form-txt" value="'+ age +'" min="7" max="70" required>'+
            '</div>'+
            '<div class="form-col">'+
                '<button type="button" class="btn" id="update">Update</button>'+
            '</div>'+           
            '</form>'+        
    '</div>';

    return $html;
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

function inModelNotify(noti){
    $html = '<div class="modal-content">'+
                '<span class="modal-close"><i class="fas fa-times"></i></span>'+
                '<h1>'+noti+'</h1>'+
            '</div>';
    return $html;
}

function updateUser(id,username,email,fullname,age){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        updatedUser = this.responseText;
        if(updatedUser == false){
            let inmodel = inModelNotify("Error something wrong");
            modal.innerHTML = inmodel;
            closeModalRefresh();
        }else{
            let inmodel = inModelNotify("Succesfully update user");
            modal.innerHTML = inmodel;
            closeModalRefresh();
        }
    }
    xhttp.open("POST", "load2.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("updateUser=true&id="+id+"&username="+username+"&email="+email+"&fullname="+fullname+"&age="+ age);
}

</script>

<?php
    include('asset/footer.php');
?>