<?php
    include './../controller/checkedAdminLogin.php'
?>

<?php
 $username = $_POST["username"];
 $password = $_POST["password"];

 if(checkedAccount($username, $password)) {
    echo '<script>window.location.replace("/UDPT/18126020_TranBaoKhanh/adminIndex.php");</script>';
 }
 else{
    echo '<script>alert("Username or password incorrect");</script>';
 }
?>