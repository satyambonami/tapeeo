<div class="col-3 side-nav d-none d-sm-none d-md-none d-lg-block d-xxl-block">
    <div class="side-nav-img text-center p-5">
        <img src="../img/users/<?php if($_SESSION['user']['img'] == NULL){echo 'user.png';}else{echo $_SESSION['user']['img'];}?>" class="img-responsive w-75 rounded-circle">
    </div>
    <nav class="side-nav-list mt-3">
        <ul>
            <li><a href="index.php" class="side-nav-links <?php if(basename($_SERVER['PHP_SELF'])=="index.php"){echo 'active';}?>">Dashboard</a></li>
            <li><a href="order.php" class="side-nav-links <?php if(basename($_SERVER['PHP_SELF'])=="order.php"){echo 'active';}?>">Orders</a></li>
            <li><a href="cart.php" class="side-nav-links">Cart</a></li>
            <li><a href="trackorder.php" class="side-nav-links <?php if(basename($_SERVER['PHP_SELF'])=="trackorder.php"){echo 'active';}?>">Track Order</a></li>
            <li><a href="address.php" class="side-nav-links <?php if(basename($_SERVER['PHP_SELF'])=="address.php"){echo 'active';}?>">Address</a></li>
            <li><a href="accountdetails.php" class="side-nav-links <?php if(basename($_SERVER['PHP_SELF'])=="accountdetails.php"){echo 'active';}?>">Account Details</a></li>
            <li><a href="logout.php" class="side-nav-links">Log out</a></li>
        </ul>
    </nav>
</div>