<?php
    include './../controller/updateOrder.php'
?>
<?php 
    $id = $_POST['id'];
    $status = $_POST['status'];
    $end = date("y-m-d h:m:s");

    updateOrder($id,$status,$end);
?>