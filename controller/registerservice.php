<?php include './../config/connectDatabaseConfig.php'; ?>
<?php
function addNewRegister($name, $phone, $address, $start, $status, $end, $serive, $number, $total, $note, $registerCode)
{
  $conn = connect_db();
  $sql = 'INSERT INTO `order`(CustomerName,Phone,Address,CreatedTime,Status
        ,ModifiedTime,ProductID,Quantity,Amount,Note,RegisterCode) 
        VALUES ("' . $name . '","' . $phone . '","' . $address . '","' . $start . '","' . $status . '","' . $end . '","' . $serive . '","' . $number . '","' . $total . '","' . $note . '","' . $registerCode . '")';
  echo ($sql);
  if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Order created successfully. Your RegisterCode is: '.$registerCode.'");</script>';
    echo '<script>window.location.replace("/UDPT/18126020_TranBaoKhanh");</script>';
  } else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
  }
}

function findServiceById($id)
{
  $conn = connect_db();
  $sql = 'SELECT * FROM `pizza` WHERE ProductID = ' . $id;
  $result = $conn->query($sql); 
  return $result;
}
?>  