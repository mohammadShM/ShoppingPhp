<head>
  <!-- ======================================== Start for seo ======================================== -->
  <meta charset="UTF-8"/>
  <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <!-- ======================================== End for seo ======================================== -->
  <!-- ======================================== Start for css ======================================== -->
  <link href="assetsClient/css/style.css" rel="stylesheet"/>
  <link href="assetsClient/fontawesome/all.css" rel="stylesheet"/>
  <link rel="stylesheet" href="node_modules/jquery-toast-plugin/dist/jquery.toast.min.css">
  <link rel="stylesheet" href="node_modules/swiper/swiper-bundle.min.css"/>
  <!-- ======================================== End for css ======================================== -->
  <!-- =============================== for favicon =============================== -->
  <link rel="apple-touch-icon" sizes="57x57" href="assetsClient/images/icon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assetsClient/images/icon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assetsClient/images/icon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assetsClient/images/icon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assetsClient/images/icon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assetsClient/images/icon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assetsClient/images/icon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assetsClient/images/icon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assetsClient/images/icon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="assetsClient/images/icon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assetsClient/images/icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assetsClient/images/icon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assetsClient/images/icon/favicon-16x16.png">
  <link rel="manifest" href="assetsClient/images/icon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- =============================== for favicon =============================== -->
  <!-- =============================== for Seo =============================== -->
    <?php
    include_once "./administrator/panel/config/Seo.php";
    $seo = new Seo();
    $query = $seo->selectLatestSeo();
    ?>
    <?php if (!empty($query)): ?>
      <meta name="keywords" content="<?php echo $query['keywords'] ?>"/>
      <meta name="description" content="<?php echo $query['description'] ?>"/>
      <meta name="author" content="<?php echo $query['author'] ?>"/>
      <meta name="robots" content="index,follow"/>
      <meta property="og:title" content="<?php echo $query['title'] ?>"/>
      <meta property="og:site_name" content="<?php echo $query['title'] ?>"/>
      <meta property="og:description" content="<?php echo $query['description'] ?>"/>
      <meta property="og:keywords" content="<?php echo $query['keywords'] ?>"/>
      <meta property="og:image" content=""/>
      <link rel="canonical" href="http://shoppingphp.mytest/indexSite.php"/>
      <meta property="og:locale" content="fa_IR"/>
      <meta property="og:type" content="website"/>
      <meta property="og:site_name" content="سایت شخصی محمد شیخی"/>
    <?php else: ?>
      <meta name="keywords" content=""/>
      <meta name="description" content=""/>
      <meta name="author" content=""/>
      <meta name="robots" content="index,follow"/>
      <meta property="og:title" content=""/>
      <meta property="og:site_name" content=""/>
      <meta property="og:description" content=""/>
      <meta property="og:keywords" content=""/>
      <meta property="og:image" content=""/>
      <link rel="canonical" href="http://shoppingphp.mytest/indexSite.php"/>
      <meta property="og:locale" content="fa_IR"/>
      <meta property="og:type" content="website"/>
      <meta property="og:site_name" content="سایت شخصی محمد شیخی"/>
    <?php endif; ?>
  <!-- =============================== for Seo =============================== -->
  <title>Project Company</title>
</head>