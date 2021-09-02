<div class="col-3 side-nav">
    <div class="side-nav-img text-center p-5">
        <img src="img/Ellipse 3.png" class="img-responsive w-75">
    </div>
    <nav class="side-nav-list mt-3">
        <ul>
            <li><a href="index.php" class="side-nav-links <?php if(basename($_SERVER['PHP_SELF'])=="index.php"){echo 'active';}?>">Dashboard</a></li>
            <li><a href="order.php" class="side-nav-links <?php if(basename($_SERVER['PHP_SELF'])=="order.php"){echo 'active';}?>">Orders</a></li>
            <li><a href="cart.php" class="side-nav-links">Cart</a></li>
            <li><a href="" class="side-nav-links <?php if(basename($_SERVER['PHP_SELF'])==""){echo 'active';}?>">Track Order</a></li>
            <li><a href="address.php" class="side-nav-links <?php if(basename($_SERVER['PHP_SELF'])=="address.php"){echo 'active';}?>">Address</a></li>
            <li><a href="" class="side-nav-links <?php if(basename($_SERVER['PHP_SELF'])==""){echo 'active';}?>">Account Details</a></li>
            <li><a href="logout.php" class="side-nav-links">Log out</a></li>
        </ul>
    </nav>
</div>