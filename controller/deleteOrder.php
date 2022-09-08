<?php include './../config/connectDatabaseConfig.php';?>
<?php
    function deleteOrderByKey($key) {
        $conn = connect_db();
        $sql = "DELETE FROM `order` WHERE RegisterCode ='".$key."'";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Order deleted successfully");</script>';
            echo '<script>window.location.replace("/UDPT/18126020_TranBaoKhanh/index.php");</script>';
          } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
          }
    }
?>  