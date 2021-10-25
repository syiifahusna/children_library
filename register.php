<?php
    include('asset/header.php');
    include('includes/user.view.php');
?>
<section>
    <h1>Register</h1>
    <div class="form-container" style="width: 30rem;margin:auto;">
        <form>
            <div class="form-col">
                <label>Username</label>
                <input type="text" class="form-txt" name="username" placeholder="username" maxlength="50" required>
            </div>
            <div class="form-col">
                <label>Email</label>
                <input type="email" class="form-txt" name="email" placeholder="email" maxlength="100" required>
            </div>
            <div class="form-col">
                <label>Password</label>
                <input type="password" class="form-txt" name="password" placeholder="password" maxlength="50" required>
            </div>
            <div class="form-col">
                <label>Fullname</label>
                <input type="text" class="form-txt" name="fullname" placeholder="fullname" maxlength="100" required>
            </div>
            <div class="form-col">
                <label>Age</label>
                <input type="number" class="form-txt" name="age" placeholder="age" min="7" max="70" required>
            </div>
            <div class="form-col" id="info"></div>
            <div class="form-col">
                <button type="button" class="btn-2" id="register" name="register">Register</button>
            </div>

            <div class="form-col">
                <p>
                    Already have account? click <a href="login.php" class="btn">here</a> to login to your account.
                </p>
            </div>
        </form>
    </div>

</section>

<script>
    let btnRegister = document.getElementById("register");

    btnRegister.addEventListener("click",function(){
        let txtUsername = document.getElementsByName("username")[0].value;
        let txtEmail = document.getElementsByName("email")[0].value;
        let txtPassword = document.getElementsByName("password")[0].value;
        let txtFullname = document.getElementsByName("fullname")[0].value;
        let txtAge = document.getElementsByName("age")[0].value;
        register(txtUsername,txtEmail,txtPassword,txtFullname,txtAge);
    });

    function register(txtUsername,txtEmail,txtPassword,txtFullname,txtAge) {
        let lblInfo = document.getElementById("info");
        if ((txtUsername.length == 0) || (txtEmail.length == 0) || (txtPassword.length == 0) || (txtFullname.length == 0) || (txtAge.length == 0)) {
            lblInfo.innerHTML = "Form Not Filled Properly";
            return;
        } else {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    lblInfo.innerHTML = xmlhttp.responseText;
                }
            };
        xmlhttp.open("POST", "load.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        let register = "register=register&username="+ txtUsername +"&email="+ txtEmail +"&password="+ txtPassword +"&fullname="+txtFullname+"&age="+txtAge;
        xmlhttp.send(register);
        }
    }

</script>

<?php
    include('asset/footer.php');
?>