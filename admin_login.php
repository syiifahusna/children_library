<?php
    include('asset/header.php');    
    if(isset($_SESSION["adminID"])){
        //redirect to index
        header('Location: index.php');
        exit();
    }else{
        if(isset($_SESSION["userID"])){
            //redirect to index
            header('Location: index.php');
            exit();
        }else{
        }
    }
?>
<section>
    <h1>Login</h1>
    <div class="form-container" style="width: 30rem;margin:auto;">
        <form method="post" action="load.php">
            <div class="form-col">
                <label>Username</label>
                <input type="text" name="username" class="form-txt" placeholder="username" minlength="5" maxlength="50" required>
            </div>
            <div class="form-col">
                <label>Password</label>
                <input type="password" name="password" class="form-txt" placeholder="password" minlength="5" maxlength="50" required>
            </div>
            <div class="form-col" id="info">
                <?php
                    if(isset($_GET['errInfo'])){
                        echo $_GET['errInfo'];
                    }else{

                    }
                ?>
            </div>
            <div class="form-col">
                <input type="submit" class="btn-2" name="admin_login" value="Login"/>
            </div>
        </form>
    </div>
</section>

<script>
</script>

<?php
    include('asset/footer.php');
?>