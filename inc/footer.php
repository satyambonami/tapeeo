<footer class="footer-bg">
    <div class="container">
        <div class="row">
            <div class="offset-3 col-6">
                <div class="copyright">
                    <h6 class="text-center"><b>© <?php echo SITE_NAME?> 2021</b></h6>
                </div>
                <div class="links">
                    <ul class="text-center ps-0">
                        <li>
                            <a href="terms-of-service.php" target="_blank">Terms of Service</a>
                        </li>
                        <li>
                            <a href="privacy-policy.php" target="_blank">Privacy Policy</a>
                        </li>
                    </ul>

                </div>
                <div class="social-links text-center d-flex justify-content-center">
                    <ul class="text-center mb-0">
                    <?php if($_SESSION['general']['facebook']!=NULL){ ?>
                        <li>
                            <a href="<?php echo $_SESSION['general']['facebook']; ?>" target="_blank" class="ps-0">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <?php }?>
                        <?php if($_SESSION['general']['youtube']!=NULL){ ?>
                        <li>
                            <a href="<?php echo $_SESSION['general']['youtube']; ?>" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <?php }?>
                        <?php if($_SESSION['general']['instagram']!=NULL){ ?>
                        <li>
                            <a href="<?php echo $_SESSION['general']['instagram']; ?>" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <?php }?>
                        <?php if($_SESSION['general']['tiktok']!=NULL){ ?>
                        <li>
                            <a href="<?php echo $_SESSION['general']['tiktok']; ?>" target="_blank">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
