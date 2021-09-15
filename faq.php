<?php
    include_once("inc/config.php");
    $pageName="FAQ's";

    $linkPrefix="";
    $dataFaq = mysqli_query($conn,"SELECT `question`,`answer`,`status` FROM `".$tblPrefix."faqs` WHERE status != 0");   
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include('inc/head.php')?>
        <link href="<?php echo $linkPrefix; ?>css/faq.css" rel="stylesheet" />
     </head>
<body>
    <!-- MAin MEnu Bar -->
    <?php include('inc/header.php')?>
    <main>
        <section style="background: url('img/Ellipse\ 2.png'); background-size: 100% 100%; padding: 60px; padding-top: 120px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-what mt-5">
                            <h2 class="text-center">
                            <?php echo $pageName;?>
                                <div class="animationLinetappeo mt-2"></div>
                            </h2>
                        </div>
                    </div>
                </div>
        </section>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-5 d-flex align-items-center">
                        <img src="img/faq.png" alt="Faq" class="img-fluid img-responsive">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-7">
                        <div class="accordion" id="accordionExample">
                            <?php
                            $i=0;
                                while($faq = mysqli_fetch_assoc($dataFaq)){ 
                                    $i++;
                            ?>
                                <div class="accordion-item my-3">
                                    <h2 class="accordion-header" id="heading<?php echo $i;?>">
                                    <button class="accordion-button <?php if($i != 1){echo "collapsed";}?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i;?>" aria-expanded="<?php if($i == 1){echo "true";}else{echo "false";}?>" aria-controls="collapse<?php echo $i;?>">
                                        <?php echo $faq['question'];?>
                                    </button>
                                    </h2>
                                    <div id="collapse<?php echo $i;?>" class="accordion-collapse collapse <?php if($i == 1){echo "show";}?>" aria-labelledby="heading<?php echo $i;?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php echo htmlspecialchars_decode($faq['answer']);?>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <?php include('inc/footer.php')?>
    <?php include('inc/js.php')?>
</body>

</html>