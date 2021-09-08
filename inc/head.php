 
 <!-- Required meta tags -->
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />

 <link rel="icon" href="img/<?php echo $_SESSION['general']['favicon'];?>" type="image/jpg">
 <link href="<?php echo $linkPrefix; ?>css/global.css" rel="stylesheet" />
 <link href="<?php echo $linkPrefix; ?>css/header.css" rel="stylesheet" />
 <link href="<?php echo $linkPrefix; ?>css/footer.css" rel="stylesheet" />
 <link href="<?php echo $linkPrefix; ?>css/home.css" rel="stylesheet" />
 <link href="<?php echo $linkPrefix; ?>css/contact.css" rel="stylesheet" />
 <link href="<?php echo $linkPrefix; ?>css/shop.css" rel="stylesheet" />
 <link href="<?php echo $linkPrefix; ?>css/responisive.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


 <?php 
    if($pageName){
        echo '<title>'.$pageName.' | '.SITE_NAME.'</title>';
    }else{
        echo'<title>'.SITE_NAME.'</title>';
    }
    
 ?>
 <style>
     .form-control {
            display: block;
            width: 100%;
            padding: 0.575rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #eee;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.50rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            margin-top: 12px;
        }
 </style>
 <title><?php echo $pageName?></title>