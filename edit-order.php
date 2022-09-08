<?php 
    include './view/embederable/headerAdmin.php';
?>
<?php 
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
    
    $endpoint = explode('/', $url);
    $id = explode('id=', $endpoint[count($endpoint)-1])[1];
?>

<body style="background-color: #efefef;">
    <?php 
        include "./Controller/order.php";
        $data = findOrderById($id);
        $numberOfRow = $data->num_rows;
        if ($data->num_rows > 0) {
        // output data of each row
            echo '<table class="order-list">';
            echo '<tbody class="order-list-body">';
                echo '<tr class="row order-list-header">';
                echo '<th class="col order-list-header-item" scope="row">OrderID</th>';
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
                    echo '<td class="col order-list-row-item" scope="row">' . $row["OrderID"] . '</td>';
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
        }
    ?> 
    <form name="form" action='./model/updateOrder.php' method="POST"> 
    <div class="input-group flex-nowrap input-group-delete" >
        <input style="display: none" type="text" class="form-control" id="id" name="id" value=<?php echo $id?>>
        <div class="form-check col-2">
            <input class="form-check-input" type="radio" name="status" id="status" value="DAKHOITAO">
            <label class="form-check-label" for="flexRadioDefault2">
                Created
            </label>
        </div>
        <div class="form-check col-2">
            <input class="form-check-input" type="radio" name="status" id="status" value="DAXACNHAN">
            <label class="form-check-label" for="flexRadioDefault2">
                Confirmed
            </label>
        </div>
        <div class="form-check col-2">
            <input class="form-check-input" type="radio" name="status" id="status" value="DANGTIENHANH">
            <label class="form-check-label" for="flexRadioDefault2">
                In Process
            </label>
        </div>
        <div class="form-check col-2">
            <input class="form-check-input" type="radio" name="status" id="status" value="DANGGIAO">
            <label class="form-check-label" for="flexRadioDefault2">
                In Shiping
            </label>
        </div>
        <div class="form-check col-2">
            <input class="form-check-input" type="radio" name="status" id="status" value="HOANTAT">
            <label class="form-check-label" for="flexRadioDefault2">
                Success
            </label>
        </div>
        <div class="form-check col-2">
            <input class="form-check-input" type="radio" name="status" id="status" value="HUY">
            <label class="form-check-label" for="flexRadioDefault2">
                Cancel
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-top:70px; margin-left: 85%; padding: 20px; font-size: 20px">Submit</button>
</form>
</body>

<?php 
    include './view/embederable/footer.php';
?>

