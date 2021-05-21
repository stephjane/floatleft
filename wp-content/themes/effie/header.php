<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <?php wp_head();?>
  <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;600;700&family=Noto+Sans+JP:wght@400;500&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
  <!-- <link href="<?php echo get_bloginfo('template_directory'); ?>/dist/style.css" rel="stylesheet"> -->
  <link href="<?php echo get_bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-77732288-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-77732288-1');
  </script>
</head>
<body class="m-scene">
  <?php $nav_menu = wp_get_menu_array('top');  ?>
  <nav>
    <div class="container">
      <ul class="nav-menu grid-item">
      <?php foreach( $nav_menu as $item ) { ?>
        <?php if($item['children']) {?>
          <li class="page_item has-drop-down">
            <div class="sub-nav">
              <?php include("img/list-arrow.svg"); ?><span><?php echo $item["title"]; ?></span>
            </div>
            <ul class="dropdown">
              <?php foreach( $item['children'] as $subitem ) {?>
                <li class="page_item"><a href="<?php echo $subitem["url"]; ?>"><?php echo $subitem["title"]; ?></a></li>
              <?php } ?>
            </ul>
          </li>
        <?php } else { ?>
          <li class="page_item"><a href="<? echo $item["url"]; ?>"><span><?php echo $item["title"]; ?></span></a></li>
        <?php } ?>
      <?php } ?>
      </ul>
      <div class="grid-item grid-item__two">
        <a href="/"><?php include("img/FL_Logo.svg"); ?></a>
      </div>
      <div class="grid-item grid-item__three">
        <a href="/contact" class="btn btn__primary">request demo</a>
      </div>
      <div class="mobile-nav">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
  </nav>
  
  