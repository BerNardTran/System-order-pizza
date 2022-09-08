<?php 
    include './view/embederable/header.php';
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
    <div class="register-service-from" id="register-service-from">
    <form method="POST" action="./model/registerService.php">
        <div class="mb-3">
            <label for="customerName" class="form-label">Name *</label>
            <input type="text" class="form-control" id="customerName" name="name">
        </div>
        <div class="mb-3">
            <label for="customerPhone" class="form-label">Phone*</label>
            <input type="number" class="form-control" id="customerPhone" name="phone">
        </div>
        <div class="mb-3">
            <label for="customerAddress" class="form-label">Address*</label>
            <input type="text" class="form-control" id="customerAddress" name="address">
        </div>
        <div class="mb-3">
            <label for="serviceId" class="form-label">Product ID</label>
            <?php 
                echo '<input type="text" class="form-control" id="serviceNote" name = "productID" readonly value='.$id.'>'
            ?>
            
        </div>
        <div class="mb-3">
            <label for="serviceNumber" class="form-label">Quantity*</label>
            <input type="number" class="form-control" id="serviceAmount" min=1 name="quantity">
        </div>
        <div class="mb-3">
            <label for="serviceNote" class="form-label">Note</label>
            <input type="text" class="form-control" id="serviceNote" name = "note">
        </div>

        <button type="submit" class="btn btn-primary register-service-submit-bnt submitRegister">Submit</button>
        </form>
    </div>
</body>

<?php 
    include './view/embederable/footer.php';
?>
