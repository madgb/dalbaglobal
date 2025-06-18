<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/head.php"; ?>
<?php
  $current_page = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>d`Alba GLOBAL</title>
    <!-- Favicon -->
    <link rel="icon" href="/_img/common/favicon.png" />
    <!-- OpenGraph -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="d`Alba GLOBAL" />
    <meta property="og:description" content="d`Alba GLOBAL" />
    <meta property="og:image" content="/_img/common/opengraph.png" />
    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- DateTimePicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <!-- NiceSelect -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- AOS 라이브러리 불러오기-->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"> 
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> 
    <!-- fullpage -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/vendors/scrolloverflow.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.min.css" />

    <!-- Custom CSS & JS -->
    <link rel="stylesheet" href="/_css/reset.css" />
    <link rel="stylesheet" href="/_css/setting.css" />
    <link rel="stylesheet" href="/_css/common.css" />
    <link rel="stylesheet" href="/_css/sub.css" />
    <link rel="stylesheet" href="/_css/attribute.css" />
    <link rel="stylesheet" href="/_css/subpage.css" />
    <script src="/_js/common.js" defer></script>
   <?php 
    if($_SESSION['lang'] == "EN"){
      @require_once $_SERVER["DOCUMENT_ROOT"]."/_lang/en_US.php";
    } else {
      @require_once $_SERVER["DOCUMENT_ROOT"]."/_lang/ko_KR.php";
    }
  ?>
  </head>

  <body>
    <div id="wrap">
      <header class="header white">
          <div class="header__inner">
            <button type="button" class="ham_btn"></button>
            <a href="/" class="logo">
              <img src="/_img/common/logo.svg" alt="" />
            </a>
          <ul class="menu">
            <li class="<?= $current_page == '/' ? 'active' : '' ?>"><a href="/">Home</a></li>
            <li class="menu_first menu_depth <?= strpos($current_page, '/whoweare/') !== false ? 'active' : '' ?>">Who we are
            <ul class="sub_menu">
                <li class="<?= $current_page == '/whoweare/heritage.php' ? 'active' : '' ?>"><a href="/whoweare/heritage.php">HERITAGE</a></li>
                <li class="<?= $current_page == '/whoweare/campaigns.php' ? 'active' : '' ?>"><a href="/whoweare/campaigns.php">CAMPAIGNS</a></li>
                <li class="<?= $current_page == '/whoweare/brands.php' ? 'active' : '' ?>"><a href="/whoweare/brands.php">BRANDS</a></li>
                <li class="<?= $current_page == '/whoweare/Innovations.php' ? 'active' : '' ?>"><a href="/whoweare/Innovations.php">INNOVATIONS</a></li>
                <li class="<?= $current_page == '/whoweare/achievements.php' ? 'active' : '' ?>"><a href="/whoweare/achievements.php">ACHIEVEMENTS</a></li> 
              </ul>
            </li>
            <li class="<?= $current_page == '/main/history.php' ? 'active' : '' ?>"><a href="/main/history.php">History</a></li>
            <li class="menu_depth <?= (strpos($current_page, '/main/ir_material') !== false || strpos($current_page, '/main/announcements') !== false) ? 'active' : '' ?>">Investors
              <ul class="sub_menu">
                <li><a href="/main/ir_material.php">IR Material</a></li>
                <li><a href="/main/announcements.php">Announcements</a></li>
              </ul>
            </li>
            <li class="<?= $current_page == '/main/ESG.php' ? 'active' : '' ?>"><a href="/main/ESG.php">ESG</a></li>
            <li class="<?= strpos($current_page, 'newsroom.php') !== false ? 'active' : '' ?>"><a href="/main/newsroom.php">Newsroom</a></li>
            <li class="<?= $current_page == '/main/Shareholders_Club.php' ? 'active' : '' ?>"><a href="/main/Shareholders_Club.php">Shareholders' Club</a></li>
          </ul>
            <div class="global">
              <button type="button" class="global_btn">
                    <?if($_SESSION['lang'] == 'EN') { ?>
                    <span>ENG</span> 
                    <? } else { ?>
                    <span>KOR</span> 
                    <? } ?>
              <p></p></button>
              <ul class="global_ul">
                <li class="<?php echo $_SESSION['lang'] == 'EN' ? '' : 'on'; ?>"><button class="langBtn" type="button" data-lang="KR">KOR</button></li>
                <li class="<?php echo $_SESSION['lang'] == 'EN' ? 'on' : ''; ?>"><button class="langBtn" type="button" data-lang="EN">ENG</button></li>
              </ul>
            </div>
      </div>
      </header>
      <!--  헤더 햄버거 버튼 눌렀을 때 나오는 사이드바 -->
      <div class="pc_sidebar">
        <div class="pc_sidebar__inner">
          <div class="pc_sidebar__header"><button type="button" class="x_btn"></button></div>
          <nav class="p_sidebar">
          <div class="global_mo">
              <button type="button" class="global_btn_mo">       
                    <?if($_SESSION['lang'] == 'EN') { ?>
                      ENG
                    <? } else { ?>
                      KOR
                    <? } ?> <p></p></button>
              <ul class="global_ul_mo">
                  <li class="<?php echo $_SESSION['lang'] == 'EN' ? '' : 'on'; ?>"><button class="langBtn" type="button" data-lang="KR">KOR</button></li>
                <li class="<?php echo $_SESSION['lang'] == 'EN' ? 'on' : ''; ?>"><button class="langBtn" type="button" data-lang="EN">ENG</button></li>
         
              </ul>
            </div>
            <ul class="sidebar_ul">
              <li class="<?= $current_page == '/' ? 'active' : '' ?>"><a href="/">Home</a></li>
              <li class="<?= strpos($current_page, '/whoweare/') !== false ? 'active' : '' ?>">
                <button class="btn-lnb whoweare">Who we are <p></p></button>
                <ul class="lnb__list">
                  <li class="<?= $current_page == '/whoweare/heritage.php' ? 'active' : '' ?>"><a href="/whoweare/heritage.php">HERITAGE</a></li>
                  <li class="<?= $current_page == '/whoweare/campaigns.php' ? 'active' : '' ?>"><a href="/whoweare/campaigns.php">CAMPAIGNS</a></li>
                  <li class="<?= $current_page == '/whoweare/brands.php' ? 'active' : '' ?>"><a href="/whoweare/brands.php">BRANDS</a></li>
                  <li class="<?= $current_page == '/whoweare/Innovations.php' ? 'active' : '' ?>"><a href="/whoweare/Innovations.php">INNOVATIONS</a></li>
                  <li class="<?= $current_page == '/whoweare/achievements.php' ? 'active' : '' ?>"><a href="/whoweare/achievements.php">ACHIEVEMENTS</a></li>
                </ul>
              </li>
              <li class="<?= $current_page == '/main/history.php' ? 'active' : '' ?>"><a href="/main/history.php">History</a></li>
              <li class="<?= (strpos($current_page, '/main/ir_material') !== false || strpos($current_page, '/main/announcements') !== false) ? 'active' : '' ?>">
                <button class="btn-lnb">Investors <p></p></button>
                <ul class="lnb__list">
                  <li class="<?= strpos($current_page, '/main/ir_material') !== false ? 'active' : '' ?>"><a href="/main/ir_material.php">IR Material</a></li>
                  <li class="<?= strpos($current_page, '/main/announcements') !== false ? 'active' : '' ?>"><a href="/main/announcements.php">Announcements</a></li>
                </ul>
              </li>
              <li class="<?= $current_page == '/main/ESG.php' ? 'active' : '' ?>"><a href="/main/ESG.php">ESG</a></li>
              <li class="<?= strpos($current_page, 'newsroom.php') !== false ? 'active' : '' ?>"><a href="/main/newsroom.php">Newsroom</a></li>
              <li class="<?= $current_page == '/main/Shareholders_Club.php' ? 'active' : '' ?>"><a href="/main/Shareholders_Club.php">Shareholders' Club</a></li>
            </ul>
          </nav>
        </div>
      </div>