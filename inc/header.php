<!-- MAin MEnu Bar -->
<header>
    <nav class="navbar navbar-expand-lg position-absolute w-100 mt-3" style="z-index: 99;">
        <div class="container background-header">
            <a class="navbar-brand w-50" href="<?php echo $linkPrefix; ?>index.php">
                <img src="<?php echo $linkPrefix; ?>img/<?php echo $_SESSION['general']['logo']; ?>" alt="<?php echo SITE_NAME ?>" class="img-fluid" style="width:20%;" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo $linkPrefix; ?>shop.php">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $linkPrefix; ?>contact.php">Contact</a>
                    </li>
                    <li class="nav-item d-none d-lg-block d-xxl-block">
                        <a class="nav-link" href="<?php echo $linkPrefix; ?>user/cart.php"><img src="<?php echo $linkPrefix; ?>img/shopping-cart.png" class="w-100"></a>
                    </li>
                    <li class="nav-item d-block d-lg-none d-xxl-none">
                        <a class="nav-link" href="<?php if ($linkPrefix == "" || $linkPrefix == NULL) {
                                echo 'user/cart.php';
                            } else {
                                echo 'cart.php';
                            } ?>">Cart</a>
                    </li>
                </ul>
                <?php if(isset($_SESSION['user'])) {?>
                <a style="margin: 0 10px;" href="<?php if ($linkPrefix == "" || $linkPrefix == NULL) {
                                echo 'user/index.php';
                            } else {
                                echo 'index.php';
                            } ?>" class="btn btn-gradient">My Account</a>
                            <?php }else{ ?>
                                <a style="margin: 0 10px;" href="<?php if ($linkPrefix == "" || $linkPrefix == NULL) {
                                echo 'user/login.php';
                            } else {
                                echo 'login.php';
                            } ?>" class="btn btn-gradient">Login</a>
                                <?php }?>
            </div>
        </div>
    </nav>
</header>