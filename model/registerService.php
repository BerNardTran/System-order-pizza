<?php
    include './../controller/registerservice.php'
?>
<?php 
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $number = $_POST["quantity"];
    $note = $_POST["note"];
    $id =  $_POST["productID"];
    $start = $today = date("y-m-d h:m:s");
    $end = date("y-m-d h:m:s");
    $status = 'DAKHOITAO';
    $findData = findServiceById($id);
    $registerKey = $phone + (int)date('y') + (int)date('m') + (int)date('d')+ (int)date('s');
    echo $registerKey;
    $price = 0;
    $total = 0;
    if ($findData->num_rows > 0) {
    // output data of each row
        while($row = $findData->fetch_assoc()) {
            $price = (float)$row["Price"];
        }
        $total = $price*(int)$number;
        echo '<br>'.$total;
    } else {
        echo "0 results";
    }

    if (strlen($name) == 0) {
        echo '<script>alert("Name is not empty")</script>';
        return;
    } 

    if (strlen($phone) == 0) {
        echo '<script>alert("Phone number is not empty")</script>';
        return;
    } 

    if (strlen($address) == 0) {
        echo '<script>alert("Address is not empty")</script>';
        return;
    } 

    if (strlen($number) == 0 && (int)$number == 0) {
        echo '<script>alert("Quantity is  incorrect")</script>';
        return;
    } 
    addNewRegister($name,$phone, $address, $start, $status, $end, $id, $number,$total,$note,$registerKey);

    
?>