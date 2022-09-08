<?php include './config/connectDatabaseConfig.php';?>
<?php
    function getAllService() {
        $conn = connect_db();
        $sql = "SELECT * FROM pizza";
        $result = $conn->query($sql);
        return $result;
    }

?>