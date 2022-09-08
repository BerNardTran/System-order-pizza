<?php 
    include './view/embederable/header.php';
    include './controller/order.php';
    error_reporting(E_ALL ^ E_NOTICE);  
?>
<body style="background-color: #efefef;">
<form name="form searchForm" action="" method="GET"> 
    <div class="input-group flex-nowrap">    
        <input type="text" class="form-control" placeholder="Register Code" name="key" id="key">
        <!-- <span class="input-group-text" id="addon-wrapping">Search</span> -->
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>

<?php
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
    $key = '';
    $key = $_GET['key'];

    // echo $key;
    $status = '';
    $data = findOrderByKey($key);
        // output data of each row
    echo '<table class="order-list">';
        echo '<tbody class="order-list-body">';
            echo '<tr class="row order-list-header">';
            echo '<th class="col order-list-header-item" scope="row">Customer Name</th>';
            echo '<th class="col order-list-header-item" scope="row">Phone</th>';
            echo '<th class="col order-list-header-item" scope="row">Address</th>';
            echo '<th class="col order-list-header-item" scope="row">Created Time</th>';
            echo '<th class="col order-list-header-item" scope="row">Status </th>';
            echo '<th class="col order-list-header-item" scope="row">Modified Time</th>';
            echo '<th class="col order-list-header-item" scope="row">ProductID</th>';
            echo '<th class="col order-list-header-item" scope="row">Quantity</th>';
            echo '<th class="col order-list-header-item" scope="row">Amount</th>';
            echo '<th class="col order-list-header-item" scope="row">Note</th>';
            echo '<th class="col order-list-header-item" scope="row">RegisterCode</th>';
            echo '</tr>';
        while($row = $data->fetch_assoc()) {
            $status =  $row["Status"];
            echo '<tr class="row order-list-row" >';
                echo '<td class="col order-list-row-item" scope="row">' . $row["CustomerName"] . '</td>';
                echo '<td class="col order-list-row-item" scope="row">' . $row["Phone"] . '</td>';
                echo '<td class="col order-list-row-item" scope="row">' . $row["Address"] . '</td>';
                echo '<td class="col order-list-row-item" scope="row">' . $row["CreatedTime"] . '</td>';
                echo '<td class="col order-list-row-item" scope="row">' . $row["Status"] . '</td>';
                echo '<td class="col order-list-row-item" scope="row">' . $row["ModifiedTime"] . '</td>';
                echo '<td class="col order-list-row-item" scope="row">' . $row["ProductID"] . '</td>';
                echo '<td class="col order-list-row-item" scope="row">' . $row["Quantity"] . '</td>';
                echo '<td class="col order-list-row-item" scope="row">' . $row["Amount"] . '</td>';
                echo '<td class="col order-list-row-item" scope="row">' . $row["Note"] . '</td>';
                echo '<td class="col order-list-row-item" scope="row">' . $row["RegisterCode"] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
    echo '</table>';  
    
?>

<form name="form" action='./model/deleteOrder.php' method="POST"> 
    <div class="input-group flex-nowrap input-group-delete" >
        <input style="display: none" type="text" class="form-control" id="orderkey" name="orderkey" value=<?php echo $key?>>
        <button type="submit" class="btn btn-primary" <?php if($status != "DAKHOITAO") echo 'disabled'; ?>>Delete</button>
    </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $status;
}
?>

</body> 

<?php 
    include './view/embederable/footer.php';
?>