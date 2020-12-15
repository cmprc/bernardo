<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="theme-color" content="#FFFFFF">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo $title; ?></title>

  <?php echo $metadata; ?>

  <script type="text/javascript">
    var site_url = '<?php echo site_url(); ?>',
      base_img = '<?php echo base_img(); ?>',
      module = '<?php echo $slug; ?>';
  </script>

  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo site_url(); ?>/modules/comum/assets/images/icon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo site_url(); ?>/modules/comum/assets/images/icon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo site_url(); ?>/modules/comum/assets/images/icon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo site_url(); ?>/modules/comum/assets/images/icon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo site_url(); ?>/modules/comum/assets/images/icon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo site_url(); ?>/modules/comum/assets/images/icon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo site_url(); ?>/modules/comum/assets/images/icon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo site_url(); ?>/modules/comum/assets/images/icon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url(); ?>/modules/comum/assets/images/icon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url(); ?>/modules/comum/assets/images/icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo site_url(); ?>/modules/comum/assets/images/icon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url(); ?>/modules/comum/assets/images/icon/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url(); ?>/modules/comum/assets/images/icon/favicon.ico">

  <link rel="stylesheet" href="<?php echo site_url(); ?>/modules/comum/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo site_url(); ?>/modules/comum/assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo site_url(); ?>/modules/comum/assets/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo site_url(); ?>/modules/comum/assets/css/metisMenu.css">
  <link rel="stylesheet" href="<?php echo site_url(); ?>/modules/comum/assets/css/slicknav.min.css">

  <!-- dropzone -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/dropzone.css">

  <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  <!-- others css -->
  <link rel="stylesheet" href="<?php echo site_url(); ?>/modules/comum/assets/css/typography.css">
  <link rel="stylesheet" href="<?php echo site_url(); ?>/modules/comum/assets/css/default-css.css">
  <link rel="stylesheet" href="<?php echo site_url(); ?>/modules/comum/assets/css/styles.css">
  <link rel="stylesheet" href="<?php echo site_url(); ?>/modules/comum/assets/css/responsive.css">
  <link rel="stylesheet" href="<?php echo site_url(); ?>/modules/comum/assets/css/comum.css">

  <?php echo $head_styles; ?>

</head>

<body class="preload">
  <div class="page-container sbar_collapsed">
    <?php echo $sidebar; ?>

    <div class="main-content">
      <?php echo $header; ?>

      <div class="main-content-inner">
        <?php echo $content; ?>
      </div>
    </div>

    <?php echo $footer; ?>
  </div>

  <!-- jquery latest version -->
  <script src="<?php echo site_url(); ?>/modules/comum/assets/js/vendor/jquery-2.2.4.min.js"></script>

  <!-- bootstrap 4 js -->
  <script src="<?php echo site_url(); ?>/modules/comum/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo site_url(); ?>/modules/comum/assets/js/metisMenu.min.js"></script>
  <script src="<?php echo site_url(); ?>/modules/comum/assets/js/jquery.slimscroll.min.js"></script>
  <script src="<?php echo site_url(); ?>/modules/comum/assets/js/jquery.slicknav.min.js"></script>

  <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
  <script src="<?php echo site_url(); ?>/modules/comum/assets/js/quill-text-area.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
  <script src="<?php echo site_url(); ?>/modules/comum/assets/js/jquery.mask.min.js"></script>

  <!-- others plugins -->
  <script src="<?php echo site_url(); ?>/modules/comum/assets/js/plugins.js"></script>
  <script src="<?php echo site_url(); ?>/modules/comum/assets/js/scripts.js"></script>

  <?php echo $body_scripts; ?>
</body>

</html>
