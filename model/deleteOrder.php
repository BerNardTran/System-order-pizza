<?php
    include './../controller/deleteOrder.php'
?>

<?php
    $orderkey =$_POST['orderkey'];
    deleteOrderByKey($orderkey);
?>