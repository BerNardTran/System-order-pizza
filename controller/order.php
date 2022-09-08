<?php include './config/connectDatabaseConfig.php';?>
<?php
    function findOrderByKey($key) {
        $conn = connect_db();
        $sql = "SELECT * FROM `order` WHERE RegisterCode =  '".$key."'" ;
        // echo($sql);
        $result = $conn->query($sql);
        return $result;
    }

    function getAllOrder($page) {
        $end = $page*3;
        $conn = connect_db();
        $sql = "SELECT * FROM `order` LIMIT 3 OFFSET " .$end;
        $result = $conn->query($sql);
        return $result;
    }

    function findOrderById($id) {
        $conn = connect_db();
        $sql = "SELECT * FROM `order` WHERE orderId = " .$id;
        $result = $conn->query($sql);
        return $result;
    }

    function filterOrder($page, $name, $phone, $start, $end, $status) {
        $nameCondition = '';
        if ($name != '') {
            $nameCondition = "CustomerName LIKE '%". $name . "%'";
        }

        $phoneCondition = '';
        if ($phone != '') {
            $phoneCondition = "Phone LIKE '%". $phone . "%'";
        }

        $dateCondition = '';
        if ($start != '' &&  $end != "") {
            $dateCondition = "CreatedTime BETWEEN '" .$start. "' AND '" .$end ."'";
        }

        $statusCondition = '';
        if ($status != '') {
            $statusCondition = 'Status = "' .$status. '"';
        }

        $isWhere = 'WHERE';
        if ($nameCondition == '' && $phoneCondition == '' && $dateCondition == '' && $statusCondition == '') {
            $isWhere = '';
        }


        if($nameCondition != ''){
            if($phoneCondition != '') {
                $phoneCondition = 'AND ' .$phoneCondition;
            }
        }

        if($nameCondition != '' || $phoneCondition != ''){
            if($dateCondition != ''){
                $dateCondition = 'AND ' .$dateCondition;
            }
        }

        if($nameCondition != '' || $phoneCondition != '' || $dateCondition != ''){
            if($statusCondition != ''){
                $statusCondition = 'AND ' .$statusCondition;
            }
        }
        $pageEnd = $page*3;
        $conn = connect_db();
        $sql = "SELECT * FROM `order` " . $isWhere ." " . $nameCondition ." ". $phoneCondition ." ". $dateCondition ." ". $statusCondition ." LIMIT 3 OFFSET " .$pageEnd;
        $result = $conn->query($sql);
        return $result ;
    }
?>