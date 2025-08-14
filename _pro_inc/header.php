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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
    <link rel="stylesheet" href="/_css/modal.css" />
    <script src="/_js/common.js" defer></script>
    <script src="/_js/modal.js" defer></script>
   <?php 
    if($_SESSION['lang'] == "EN"){
      @require_once $_SERVER["DOCUMENT_ROOT"]."/_lang/en_US.php";
    } else {
      @require_once $_SERVER["DOCUMENT_ROOT"]."/_lang/ko_KR.php";
    }
  ?>
  </head>

  <body>
    <!-- The Modal -->
    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
          <div class="lang-select">
            <select id="langToggle">
              <option value="ko">Korean</option>
              <option value="en">English</option>
            </select>
          </div>
          <h1>d’Alba GLOBAL</h1>    
          <div class="modal-inner ko">    
            <h2>주식회사 달바글로벌</h2>
            <h2 class="bold">2025년 2분기 잠정 실적 컨퍼런스콜 안내</h2>

            <div class="section first">
              <h3>01 진행 일시</h3>
              <div class="section-content">
                <p>국문 컨퍼런스콜 : </p>
                <p>2025년 8월 8일 (금) 16:30 KST ~ 17:29 KST</p>
              </div>
            </div>

            <div class="section">
              <h3>02 접속 방법</h3>
              <div class="section-content">
                <p class="black-bg">
                  <a href="https://irsvc.teletogether.com/dalba/dalba.php?c=dalba&y=3034" target="_blank">
                    <img src="./_img/modal/modal_link_ko.png" />
                  </a>
                </p>
              </div>
            </div>

            <div class="section">
              <h3>03 진행 방법</h3>
              <div class="section-content">
                <p>2025년 2분기 경영 실적 관련 설명 후 Q&A 진행 예정</p>
              </div>
            </div>

            <div class="section">
              <h3>04 기타 사항</h3>
              <div class="section-content">
                <p>2025년 2분기 잠정 경영 실적 설명 자료는</p>
                <p>금융감독원 전자공시시스템 (<a href="https://dart.fss.or.kr" target="_blank">dart.fss.or.kr</a>)의</p>
                <p>잠정실적 공시 첨부파일 및 당사 홈페이지 (<a href="https://www.dalbaglobal.com" target="_blank">www.dalbaglobal.com</a>)의</p>
                <p>‘Investors’ → ‘IR Material’ 게시판을 참고 부탁드립니다.</p>
              </div>
            </div>
          </div>
            
          <div class="modal-inner en">    
            <h2>d'Alba Global Co., Ltd.</h2>
            <h2 class="bold">2025 2Q PRELIMINARY EARNINGS CONFERENCE CALL NOTICE</h2>

            <div class="section first">
              <h3>01 Date · Time</h3>
              <div class="section-content">
                <p>(ENG) Conference Call :</p>
                <p>2025.Aug 8th(Fri) 17:30 KST - 18:30 KST</p>
              </div>
            </div>

            <div class="section">
              <h3>02 How To Join</h3>
              <div class="section-content">
                <p class="black-bg">
                  <a href="https://irsvc.teletogether.com/dalbaglobal/dalbaglobal.php?c=dalbaglobal&y=3101" target="_blank">
                    <img src="./_img/modal/modal_link_en.png" />
                  </a>
                </p>
              </div>
            </div>

            <div class="section">
              <h3>03 Procedures</h3>
              <div class="section-content">
                <p>Presentation on '25.2Q preliminary results</p>
                <p>followed by Q&A session</p>
              </div>
            </div>

            <div class="section">
              <h3>04 Additional Info</h3>
              <div class="section-content">
                <p>Please refer to the '25.2Q preliminary earnings presentation</p>
                <p>available as an attachment on the disclosure</p>
                <p>at the DART system (<a href="https://dart.fss.or.kr" target="_blank">dart.fss.or.kr</a>)and</p>
                <p>on our website (<a href="https://www.dalbaglobal.com" target="_blank">www.dalbaglobal.com</a>)</p>
                <p>under the 'Investors' → 'IR Materials'.</p>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div id="wrap">
      <header class="header white">
          <div class="header__inner">
            <button type="button" class="ham_btn"></button>
            <a href="/" class="logo">
              <img src="/_img/common/logo_final.svg" alt="logo" />
            </a>
          <ul class="menu">
            <li class="<?= $current_page == '/' ? 'active' : '' ?>"><a href="/">Home</a></li>
            <li class="menu_first menu_depth <?= strpos($current_page, '/whoweare/') !== false ? 'active' : '' ?>">Who we are
            <ul class="sub_menu">
                <li><a href="#" data-target="section_02">HERITAGE</a></li>
                <li><a href="#" data-target="section_05">CAMPAIGNS</a></li>
                <li><a href="#" data-target="section_07">BRANDS</a></li>
                <li><a href="#" data-target="section_08">INNOVATIONS</a></li>

                <!-- 구버전 링크(페이지 이동) -->
                
                <!-- <li class="<?= $current_page == '/whoweare/heritage.php' ? 'active' : '' ?>"><a href="/whoweare/heritage.php">HERITAGE</a></li>
                <li class="<?= $current_page == '/whoweare/campaigns.php' ? 'active' : '' ?>"><a href="/whoweare/campaigns.php">CAMPAIGNS</a></li>
                <li class="<?= $current_page == '/whoweare/brands.php' ? 'active' : '' ?>"><a href="/whoweare/brands.php">BRANDS</a></li>
                <li class="<?= $current_page == '/whoweare/Innovations.php' ? 'active' : '' ?>"><a href="/whoweare/Innovations.php">INNOVATIONS</a></li> -->

                <!-- Achievement는 개편 전까지 숨기기 -->
                <!-- <li class="<?= $current_page == '/whoweare/achievements.php' ? 'active' : '' ?>"><a href="/whoweare/achievements.php">ACHIEVEMENTS</a></li>  -->
              </ul>
            </li>
            <li><a href="#" data-target="section_13">History</a></li>
            <!-- <li class="<?= $current_page == '/main/history.php' ? 'active' : '' ?>"><a href="/main/history.php">History</a></li> -->
            <li class="menu_depth <?= (strpos($current_page, '/main/ir_material') !== false || strpos($current_page, '/main/announcements') !== false) ? 'active' : '' ?>">Investors
              <ul class="sub_menu">
                <li><a href="#" data-target="section_14">IR Material</a></li>
                <li><a href="#" data-target="section_15">Announcements</a></li>

                <!-- <li><a href="/main/ir_material.php">IR Material</a></li>
                <li><a href="/main/announcements.php">Announcements</a></li> -->
              </ul>
            </li>

            <li><a href="#" data-target="section_16">ESG</a></li>
            <li><a href="#" data-target="section_19">Newsroom</a></li>
            <li><a href="#" data-target="section_20">Shareholders' Club</a></li>

            <!-- <li><a href="#" data-target="section_15">Shareholders' Club</a></li> -->

            <!-- <li class="<?= $current_page == '/main/ESG.php' ? 'active' : '' ?>"><a href="/main/ESG.php">ESG</a></li>
            <li class="<?= strpos($current_page, 'newsroom.php') !== false ? 'active' : '' ?>"><a href="/main/newsroom.php">Newsroom</a></li>
            <li class="<?= $current_page == '/main/Shareholders_Club.php' ? 'active' : '' ?>"><a href="/main/Shareholders_Club.php">Shareholders' Club</a></li> -->
          </ul>
          <div class="right-dropdown-section">
            <div class="global brand-site">
              <button type="button" class="brand_btn">
                <span class="header-icon icon-global"></span>
                <span>Brand Site</span>
                <span class="header-icon icon-down-arrow"></span>
              </button>
              <ul class="brand_ul header-dropdown-box">
                <li class="<?php echo $_SESSION['lang'] == 'EN' ? '' : 'on'; ?>"><a href="https://dalba.co.kr/" target="_blank">d'Alba Korea</a></li>
                <li class="<?php echo $_SESSION['lang'] == 'EN' ? 'on' : ''; ?>"><a href="https://dalba.com/" target="_blank">d'Alba USA</a></li>
              </ul>
            </div>
            <div class="global lang-box">
              <button type="button" class="global_btn">
                    <!-- <?php if($_SESSION['lang'] == 'EN') { ?>
                    <span>ENG</span> 
                    <?php } else { ?>
                    <span>KOR</span> 
                    <?php } ?>
                    <p></p> -->
                <span>Language</span>
                <span class="header-icon icon-down-arrow"></span>
              </button>
              <ul class="global_ul header-dropdown-box">
                <li class="<?php echo $_SESSION['lang'] == 'EN' ? '' : 'on'; ?>"><button class="langBtn" type="button" data-lang="KO">Korean</button></li>
                <li class="<?php echo $_SESSION['lang'] == 'EN' ? 'on' : ''; ?>"><button class="langBtn" type="button" data-lang="EN">English</button></li>
              </ul>
            </div>
          </div>
          <div class="mo-header-right-placeholder"></div>
      </div>
      </header>
      <!--  헤더 햄버거 버튼 눌렀을 때 나오는 사이드바 -->
      <div class="pc_sidebar">
        <div class="pc_sidebar__inner">
          <div class="pc_sidebar__header"><button type="button" class="x_btn"></button></div>
          <nav class="p_sidebar">
            <div class="dropdown-mo global_mo">
              <button type="button" class="dropdown-mo-btn global_btn_mo">       
                    <!-- <?php if($_SESSION['lang'] == 'EN') { ?>
                      ENG
                    <?php } else { ?>
                      KOR
                    <?php } ?> <p></p> -->
                Language
              </button>
              <ul class="dropdown-ul-mo global_ul_mo">
                <li class="<?php echo $_SESSION['lang'] == 'EN' ? '' : 'on'; ?>"><button class="langBtn" type="button" data-lang="KO">Korean</button></li>
                <li class="<?php echo $_SESSION['lang'] == 'EN' ? 'on' : ''; ?>"><button class="langBtn" type="button" data-lang="EN">English</button></li>
              </ul>
            </div>

            <!-- 모바일 브랜드사이트 버튼 디자인 및 동작 작업중 -->
            <div class="dropdown-mo brand-site">
              <button type="button" class="dropdown-mo-btn brand-site-btn">       
                Brand Site
              </button>
              <ul class="dropdown-ul-mo brand-site-ul">
                <li class="<?php echo $_SESSION['lang'] == 'EN' ? '' : 'on'; ?>"><a href="https://dalba.co.kr/" target="_blank">d'Alba Korea</a></li>
                <li class="<?php echo $_SESSION['lang'] == 'EN' ? 'on' : ''; ?>"><a href="https://dalba.com/" target="_blank">d'Alba USA</a></li>
              </ul>
            </div>
            <ul class="sidebar_ul">
              <li class="<?= $current_page == '/' ? 'active' : '' ?>"><a href="/">Home</a></li>
              <li class="<?= strpos($current_page, '/whoweare/') !== false ? 'active' : '' ?>">
                <button class="btn-lnb whoweare">Who we are <p></p></button>
                <ul class="lnb__list">
                  <li><a href="#" data-target="section_02">HERITAGE</a></li>
                  <li><a href="#" data-target="section_05">CAMPAIGNS</a></li>
                  <li><a href="#" data-target="section_07">BRANDS</a></li>
                  <li><a href="#" data-target="section_08">INNOVATIONS</a></li>
                  
                  <!-- <li class="<?= $current_page == '/whoweare/heritage.php' ? 'active' : '' ?>"><a href="/whoweare/heritage.php">HERITAGE</a></li>
                  <li class="<?= $current_page == '/whoweare/campaigns.php' ? 'active' : '' ?>"><a href="/whoweare/campaigns.php">CAMPAIGNS</a></li>
                  <li class="<?= $current_page == '/whoweare/brands.php' ? 'active' : '' ?>"><a href="/whoweare/brands.php">BRANDS</a></li>
                  <li class="<?= $current_page == '/whoweare/Innovations.php' ? 'active' : '' ?>"><a href="/whoweare/Innovations.php">INNOVATIONS</a></li> -->
                  <!-- <li class="<?= $current_page == '/whoweare/achievements.php' ? 'active' : '' ?>"><a href="/whoweare/achievements.php">ACHIEVEMENTS</a></li> -->
                </ul>
              </li>

              <li><a href="#" data-target="section_13">History</a></li>
              <!-- <li class="<?= $current_page == '/main/history.php' ? 'active' : '' ?>"><a href="/main/history.php">History</a></li> -->
              
              <li class="<?= (strpos($current_page, '/main/ir_material') !== false || strpos($current_page, '/main/announcements') !== false) ? 'active' : '' ?>">
                <button class="btn-lnb">Investors <p></p></button>
                <ul class="lnb__list">
                  <li><a href="#" data-target="section_14">IR Material</a></li>
                  <li><a href="#" data-target="section_15">Announcements</a></li>
                  
                  <!-- <li class="<?= strpos($current_page, '/main/ir_material') !== false ? 'active' : '' ?>"><a href="/main/ir_material.php">IR Material</a></li>
                  <li class="<?= strpos($current_page, '/main/announcements') !== false ? 'active' : '' ?>"><a href="/main/announcements.php">Announcements</a></li> -->
                </ul>
              </li>
              <li><a href="#" data-target="section_16">ESG</a></li>
              <li><a href="#" data-target="section_19">Newsroom</a></li>
              <li><a href="#" data-target="section_20">Shareholders' Club</a></li>
              
              <!-- <li class="<?= $current_page == '/main/ESG.php' ? 'active' : '' ?>"><a href="/main/ESG.php">ESG</a></li>
              <li class="<?= strpos($current_page, 'newsroom.php') !== false ? 'active' : '' ?>"><a href="/main/newsroom.php">Newsroom</a></li> -->
              
              <!-- <li class="<?= $current_page == '/main/Shareholders_Club.php' ? 'active' : '' ?>"><a href="/main/Shareholders_Club.php">Shareholders' Club</a></li> -->
            </ul>
          </nav>
        </div>
      </div>