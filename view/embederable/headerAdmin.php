<?php 
    include 'head.php';

    function Logout(){
        echo '<script>window.location.replace("/UDPT/18126020_TranBaoKhanh/login.php");</script>';
    }

?>
<div class="header">
    <img class="banner" src="./asset/banner.jpg" alt="Banner">
    <nav class="navbar navbar-expand-lg">
    <div class="container-fluid row">
        <ul class="navbar-nav nav-menu col-8">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./">List Order</a>
            </li>
        </ul>
        <button class="logoutAdmin" type="submit" method="GET" name="logout" onclick="window.location.replace('/UDPT/18126020_TranBaoKhanh/login.php');">Logout</button>
    </div>
</nav>
</div>