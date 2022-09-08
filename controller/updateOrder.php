<?php include './../config/connectDatabaseConfig.php';?>
<?php
    function updateOrder($id, $status, $end ) {
        $conn = connect_db();
        $sql = "UPDATE `order` SET `Status` = '" . $status . "', CreatedTime = '" . $end ."' WHERE OrderID ='".$id."'";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Order Update Successfull");</script>';
            echo '<script>window.location.replace("/UDPT/18126020_TranBaoKhanh/adminIndex.php");</script>';
          } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
          }
    }
?>  