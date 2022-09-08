<?php 
    include './view/embederable/headerAdmin.php';
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";   
    else  
        $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   

    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    

    $endpoint = explode('/', $url);
    $pageArray = explode('page=', $endpoint[count($endpoint)-1]);
    $isHasPage = count($pageArray);
    if ($isHasPage < 2) {
        $page = 0;  
    } else {
        $page = $pageArray[1];
    }
?>
<body style="background-color: #efefef; padding-bottom:200px">
    <form name="form" action="" method="POST"> 
        <div class="input-group-delete input-group-filter" >
            <div class="row" >
                <input type="text" placeholder="Customer Name" class="col" name="name">
                <input type="text" placeholder="Phone" class="col" name="phone">
                <input type="datetime-local" placeholder="Time start" class="col" name="start">
                <input type="datetime-local" placeholder="Time end" class="col" name="end">
            </div>
            <div class="row order-status-admin-index">
                <p class="col">Status<p> 
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="status" id="status" value="" checked>
                    <label class="form-check-label" for="flexRadioDefault4">
                        All
                    </label>
                </div>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="status" id="status" value="DAKHOITAO">
                    <label class="form-check-label" for="flexRadioDefault3">
                        Created
                    </label>
                </div>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="status" id="status" value="DAXACNHAN">
                    <label class="form-check-label" for="flexRadioDefault3">
                        Confirmed
                    </label>
                </div>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="status" id="status" value="DANGTIENHANH">
                    <label class="form-check-label" for="flexRadioDefault3">
                        In Process
                    </label>
                </div>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="status" id="status" value="DANGGIAO">
                    <label class="form-check-label" for="flexRadioDefault3">
                        In Shiping
                    </label>
                </div>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="status" id="status" value="HOANTAT">
                    <label class="form-check-label" for="flexRadioDefault3">
                        Success
                    </label>
                </div>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="status" id="status" value="HUY">
                    <label class="form-check-label" for="flexRadioDefault4">
                        Cancel
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn-primary">Search</button>
        </div>
    </form>
    <?php
        error_reporting(E_ALL ^ E_NOTICE);
        if (!isset($_POST["name"])) {
            $name = '';
        } else {
            $name = $_POST["name"];
        }

        if (!isset($_POST["phone"])) {
            $phone = '';
        } else {
            $phone = $_POST["phone"];
        }

        if (!isset($_POST["start"])) {
            $start = '';
        } else {
            $start = $_POST["start"];
        }

        if (!isset($_POST["end"])) {
            $end = '';
        } else {
            $end = $_POST["end"];
        }

        if (!isset($_POST["status"])) {
            $status = '';
        } else {
            $status = $_POST["status"];
        }

        include "./Controller/order.php";
        $data = filterOrder($page, $name, $phone, $start, $end, $status);
        $numberOfRow = $data->num_rows;
        if ($data->num_rows > 0) {
        // output data of each row
            echo '<table class="order-list orderlist-admin">';
            echo '<tbody class="order-list-body">';
                echo '<tr class="row order-list-header">';
                echo '<th class="col order-list-header-item" scope="row">OrderID</th>';
                echo '<th class="col order-list-header-item" scope="row">Customer Name</th>';
                echo '<th class="col order-list-header-item" scope="row">Phone</th>';
                echo '<th class="col order-list-header-item" scope="row">Address</th>';
                echo '<th class="col order-list-header-item" scope="row">Created Time</th>';
                echo '<th class="col order-list-header-item" scope="row">Status</th>';
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
                    echo '<td class="col order-list-row-item" scope="row"> <a class="service-register-link" href="./edit-order.php?id='.$row["OrderID"].'">' . $row["OrderID"] . '</a></td>';
                    echo '<td class="col order-list-row-item" scope="row"> <a class="service-register-link" href="./edit-order.php?id='.$row["OrderID"].'">' . $row["CustomerName"] . '</a></td>';
                    echo '<td class="col order-list-row-item" scope="row"> <a class="service-register-link" href="./edit-order.php?id='.$row["OrderID"].'">' . $row["Phone"] . '</a></td>';
                    echo '<td class="col order-list-row-item" scope="row"> <a class="service-register-link" href="./edit-order.php?id='.$row["OrderID"].'">' . $row["Address"] . '</a></td>';
                    echo '<td class="col order-list-row-item" scope="row"> <a class="service-register-link" href="./edit-order.php?id='.$row["OrderID"].'">' . $row["CreatedTime"] . '</a></td>';
                    echo '<td class="col order-list-row-item" scope="row"> <a class="service-register-link" href="./edit-order.php?id='.$row["OrderID"].'">' . $row["Status"] . '</a></td>';
                    echo '<td class="col order-list-row-item" scope="row"> <a class="service-register-link" href="./edit-order.php?id='.$row["OrderID"].'">' . $row["ModifiedTime"] . '</a></td>';
                    echo '<td class="col order-list-row-item" scope="row"> <a class="service-register-link" href="./edit-order.php?id='.$row["OrderID"].'">' . $row["ProductID"] . '</a></td>';
                    echo '<td class="col order-list-row-item" scope="row"> <a class="service-register-link" href="./edit-order.php?id='.$row["OrderID"].'">' . $row["Quantity"] . '</a></td>';
                    echo '<td class="col order-list-row-item" scope="row"> <a class="service-register-link" href="./edit-order.php?id='.$row["OrderID"].'">' . $row["Amount"] . '</a></td>';
                    echo '<td class="col order-list-row-item" scope="row"> <a class="service-register-link" href="./edit-order.php?id='.$row["OrderID"].'">' . $row["Note"] . '</a></td>';
                    echo '<td class="col order-list-row-item" scope="row"> <a class="service-register-link" href="./edit-order.php?id='.$row["OrderID"].'">' . $row["RegisterCode"] . '</a></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>'; 
        }
    ?> 
    <nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php 
            if ($page == "0") {
                $page = $page -1;
                echo '<li class="page-item disabled"><a class="page-link" href="./adminIndex.php?page='. $page .'">Previous</a></li>';
            } 
            else {
                $page = $page -1;
                echo '<li class="page-item"><a class="page-link" href="./adminIndex.php?page=' . $page . '">Previous</a></li>';
            }
        ?>
        <?php 
            if ($numberOfRow != "3") {
                $page = $page + 2;
                echo '<li class="page-item disabled"><a class="page-link" href="./adminIndex.php?page=' . $page . '">Next</a></li>';
            } 
            else {
                $page = $page + 2   ;
                echo '<li class="page-item"><a class="page-link" href="./adminIndex.php?page=' . $page . '">Next</a></li>';
            }
        ?>
    </ul>
    </nav>
</body>

<?php 
    include './view/embederable/footer.php';
?>
