<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="theme-color" content="#000000'" />
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="cleartype" content="on">

  <meta name="author" content="cfr">
  <meta name="description" content="<?php echo $page->meta_description; ?>">
  <meta name="keywords" content="<?php echo $page->keywords; ?>">

  <title><?php echo $page->title; ?></title>

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_img('icon/apple-touch-icon-144x144-precomposed.png'); ?>">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_img('icon/apple-touch-icon-114x114-precomposed.png'); ?>">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_img('icon/apple-touch-icon-72x72-precomposed.png'); ?>">
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_img('icon/apple-touch-icon-57x57-precomposed.png'); ?>">
  <link rel="shortcut icon" href="<?php echo base_img('icon/apple-touch-icon.png'); ?>">
  <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_img('favicon.png'); ?>"> -->
  <meta name="msapplication-TileImage" content="<?php echo base_img('icon/apple-touch-icon-144x144-precomposed.png'); ?>">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">

  <!-- animation -->
  <link rel="stylesheet" href="application/modules/comum/assets/css/animate.css" />
  <!-- bootstrap -->
  <link rel="stylesheet" href="application/modules/comum/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
  <!-- themify icon -->
  <link rel="stylesheet" href="application/modules/comum/assets/css/themify-icons.css">
  <!-- swiper carousel -->
  <link rel="stylesheet" href="application/modules/comum/assets/css/swiper.min.css">
  <!-- justified gallery  -->
  <link rel="stylesheet" href="application/modules/comum/assets/css/justified-gallery.min.css">
  <!-- magnific popup -->
  <link rel="stylesheet" href="application/modules/comum/assets/css/magnific-popup.css" />
  <!-- bootsnav -->
  <link rel="stylesheet" href="application/modules/comum/assets/css/bootsnav.css">
  <!-- style -->
  <link rel="stylesheet" href="application/modules/comum/assets/css/style.css?<?= $version; ?>" />
  <!-- responsive css -->
  <link rel="stylesheet" href="application/modules/comum/assets/css/responsive.css?<?= $version; ?>" />

  <link rel="stylesheet" href="application/modules/comum/assets/css/main.css?<?= $version; ?>" />

  <!--[if IE]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->

  <?php
  echo $head_styles;
  echo $head_scripts;
  ?>
</head>

<body>
  <div id="wrapper">
    <?php echo $header, $content, $footer; ?>
  </div>

  <script type="text/javascript">
    var site_url = '<?php echo site_url(); ?>',
      base_url = '<?php echo base_url(); ?>';
  </script>

  <!-- javascript libraries -->
  <script type="text/javascript" src="application/modules/comum/assets/js/jquery.js"></script>
  <script type="text/javascript" src="application/modules/comum/assets/js/modernizr.js"></script>
  <script type="text/javascript" src="application/modules/comum/assets/js/bootstrap.bundle.js"></script>
  <script type="text/javascript" src="application/modules/comum/assets/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="application/modules/comum/assets/js/skrollr.min.js"></script>
  <script type="text/javascript" src="application/modules/comum/assets/js/smooth-scroll.js"></script>
  <script type="text/javascript" src="application/modules/comum/assets/js/jquery.appear.js"></script>
  <!-- menu navigation -->
  <script type="text/javascript" src="application/modules/comum/assets/js/bootsnav.js"></script>
  <script type="text/javascript" src="application/modules/comum/assets/js/jquery.nav.js"></script>
  <!-- animation -->
  <script type="text/javascript" src="application/modules/comum/assets/js/wow.min.js"></script>
  <!-- page scroll -->
  <script type="text/javascript" src="application/modules/comum/assets/js/page-scroll.js"></script>
  <!-- swiper carousel -->
  <script type="text/javascript" src="application/modules/comum/assets/js/swiper.min.js"></script>
  <!-- counter -->
  <script type="text/javascript" src="application/modules/comum/assets/js/jquery.count-to.js"></script>
  <!-- parallax -->
  <script type="text/javascript" src="application/modules/comum/assets/js/jquery.stellar.js"></script>
  <!-- magnific popup -->
  <script type="text/javascript" src="application/modules/comum/assets/js/jquery.magnific-popup.min.js"></script>
  <!-- portfolio with shorting tab -->
  <script type="text/javascript" src="application/modules/comum/assets/js/isotope.pkgd.min.js"></script>
  <!-- images loaded -->
  <script type="text/javascript" src="application/modules/comum/assets/js/imagesloaded.pkgd.min.js"></script>
  <!-- pull menu -->
  <script type="text/javascript" src="application/modules/comum/assets/js/classie.js"></script>
  <script type="text/javascript" src="application/modules/comum/assets/js/hamburger-menu.js"></script>
  <!-- counter  -->
  <script type="text/javascript" src="application/modules/comum/assets/js/counter.js"></script>
  <!-- fit video  -->
  <script type="text/javascript" src="application/modules/comum/assets/js/jquery.fitvids.js"></script>
  <!-- skill bars  -->
  <script type="text/javascript" src="application/modules/comum/assets/js/skill.bars.jquery.js"></script>
  <!-- justified gallery  -->
  <script type="text/javascript" src="application/modules/comum/assets/js/justified-gallery.min.js"></script>
  <!--pie chart-->
  <script type="text/javascript" src="application/modules/comum/assets/js/jquery.easypiechart.min.js"></script>
  <!-- instagram -->
  <script type="text/javascript" src="application/modules/comum/assets/js/instafeed.min.js"></script>
  <!-- retina -->
  <script type="text/javascript" src="application/modules/comum/assets/js/retina.min.js"></script>
  <!-- revolution -->
  <!-- <script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script> -->
  <script type="text/javascript" src="application/modules/comum/assets/js/main.js?<?= $version; ?>"></script>

  <?php echo $body_scripts; ?>

</body>

</html>
