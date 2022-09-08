<?php 
    include "./Controller/service.php";
    $data = getAllService();

    if ($data->num_rows > 0) {
    // output data of each row
    echo '<table class="service-list">';
    echo '<tbody class="service-list-body">';
    echo '<tr class="row service-list-header">';
    echo '<th class="col service-list-header-item" scope="row">Product ID</th>';
    echo '<th class="col service-list-header-item" scope="row">Combo Name</th>';
    echo '<th class="col service-list-header-item" scope="row">Description</th>';
    echo '<th class="col service-list-header-item" scope="row">Price</th>';
    echo '</tr>';
        while($row = $data->fetch_assoc()) {
            echo '<tr class="row service-list-row" >';
                echo '<td class="col service-list-row-item" scope="row"> <a class="service-register-link" href="./regiser-service.php?id='.$row["ProductID"].'">' . $row["ProductID"] . '</a></td>';
                echo '<td class="col service-list-row-item" scope="row"> <a class="service-register-link" href="./regiser-service.php?id='.$row["ProductID"].'">' . $row["ComboName"] . '</a></td>';
                echo '<td class="col service-list-row-item" scope="row"> <a class="service-register-link" href="./regiser-service.php?id='.$row["ProductID"].'">' . $row["Description"] . '</a></td>';
                echo '<td class="col service-list-row-item" scope="row"> <a class="service-register-link" href="./regiser-service.php?id='.$row["ProductID"].'">' . $row["Price"] . '</a></td>';
            echo '</tr>';
        }
    echo '</tbody>';
    echo '</table>';
    } else {
        echo "0 results";
    }
?>  

    
