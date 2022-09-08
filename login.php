<?php
include("./view/embederable/headerAdminLogin.php");
?>
<div class="login" style="height: 36vh">
    <div class="loginFormAdmin">ADMIN LOGIN</div>
    <div class="loginContentDetails">
        <form method="POST" action="./model/adminLogin.php">
            <label for="fusername" class="userNameLabel">Username:</label>
            <input type="text" id="name" name="username" placeholder="Enter your username" class="loginInput"><br><br>
            <label for="fpassword"  class="passWordLabel">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" class="loginInput"><br><br>
            <input type="submit" value="Login" class="buttonSubmit">
        </form>
    </div>

</div>


<?php
include("./view/embederable/footer.php");
?>