<?php
include './../config/connectDatabaseConfig.php';
?>

<?php
function checkedAccount($username, $password)
{
    $conn = connect_db();
    $sql = "SELECT * FROM `account` WHERE `username` = '$username' and `password` = '$password'";
    if ($conn->query($sql)) {
        echo '<script>alert("Admin Login Successfully");</script>';
        echo '<script>window.location.replace("/UDPT/18126020_TranBaoKhanh/adminIndex.php");</script>';
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }
}
?>