
<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/include_default_html.php"; ?>

<?php
function fetchData($DB, $bbs_cd, $offset = 0, $limit = 5) {
  // 전체 개수 조회
  $count_query = "SELECT COUNT(*) AS total FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd'";
  $total_result = $DB->get_row($count_query);
  $total_count = $total_result ? intval($total_result['total']) : 0;

  // 게시물 조회
  $query = "SELECT * FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd' ORDER BY w_dt DESC LIMIT $offset, $limit";
  $list = $DB->get_results($query);
  $posts = [];

  foreach ($list['result'] as $row) {
      $posts[$row['b_idx']] = [
          'subject' => $row['subject'],
          'content' => $row['content'],
          'w_year' => $row['w_year'],
          'w_dt' => $row['w_dt'],
          'url' => $row['url'],
          'attachments' => []
      ];

      $attachQuery = "SELECT * FROM tb_board_attach WHERE b_idx = " . $row['b_idx'];
      $attachments = $DB->get_results($attachQuery);

      foreach ($attachments['result'] as $attachment) {
          $posts[$row['b_idx']]['attachments'][] = [
              'file_name' => $attachment['ba_file_org'],
              'file_path' => "/_upload_files/{$attachment['ba_file_chg']}",
          ];
      }
  }

  return [
      'posts' => $posts,
      'total_count' => $total_count
  ];
}

function getYear($DB) {
  $sql = "SELECT DISTINCT(w_year) FROM tb_board_info WHERE bbs_cd LIKE 'announcements' ORDER BY w_dt DESC";
  $result = $DB->get_results($sql);
  $years = [];
  foreach($result['result'] as $r) {
    $years[] = $r['w_year'];
  }
  rsort($years);
  return $years;
}

function fetchYearData($DB, $bbs_cd, $year, $offset = 0, $limit = 5) {
  // 전체 개수 조회
  $count_query = "SELECT COUNT(*) AS total FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd'AND w_year LIKE '$year'";
  $total_result = $DB->get_row($count_query);
  $total_count = $total_result ? intval($total_result['total']) : 0;

  // 게시물 조회
  $query = "SELECT * FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd' AND w_year LIKE '$year' ORDER BY w_dt DESC LIMIT $offset, $limit";
  $list = $DB->get_results($query);
  $posts = [];
  // print_r($query);

  foreach ($list['result'] as $row) {
  
      $posts[$row['b_idx']] = [
          'subject' => $row['subject'],
          'content' => $row['content'],
          'w_year' => $row['w_year'],
          'w_dt' => $row['w_dt'],
          'url' => $row['url'],
          'attachments' => []
      ];

      $attachQuery = "SELECT * FROM tb_board_attach WHERE b_idx = " . $row['b_idx'];
      $attachments = $DB->get_results($attachQuery);

      foreach ($attachments['result'] as $attachment) {
          $posts[$row['b_idx']]['attachments'][] = [
              'file_name' => $attachment['ba_file_org'],
              'file_path' => "/_upload_files/{$attachment['ba_file_chg']}",
          ];
      }
  }

  return [
      'posts' => $posts,
      'total_count' => $total_count
  ];
}

function getHistoryYearData($DB) {
  $sql = "SELECT DISTINCT(w_year) FROM tb_board_info WHERE bbs_cd LIKE 'history' ORDER BY w_dt DESC";
  $result = $DB->get_results($sql);
  $years = [];
  foreach($result['result'] as $r) {
    $years[] = $r['w_year'];
  }
  rsort($years);
  return $years;
}

function getHistoryMonthData($DB, $year) {
  $sql = " SELECT DISTINCT(subject) FROM tb_board_info WHERE bbs_cd LIKE 'history' AND w_year = '".$year."' ORDER BY subject DESC";
  $result = $DB->get_results($sql);
  $posts = [];
  foreach($result['result'] as $r) {
    $months[] = $r['subject'];
  }
  rsort($months);
  return $months;
}

function getHistoryData($DB, $year, $subject) {
  $sql = " SELECT * FROM tb_board_info WHERE bbs_cd LIKE 'history' AND w_year = '".$year."' AND subject = '".$subject."' ORDER BY w_dt DESC";
  $result = $DB->get_results($sql);
  $posts = [];
  foreach($result['result'] as $r) {
    $posts[] = [
      'subject' => $r['subject'],
      'content' => $r['content'],
      'w_year' => $r['w_year'],
      'w_dt' => $r['w_dt'],
      'url' => $r['url'],
    ];
  }
  return $posts;
}

$irData = fetchData($DB, "ir%");
$yearList = getYear($DB);
$announcementData = fetchData($DB, "announcements");
$newsData = fetchData($DB, "news%");
//$announcementData = fetchYearData($DB,"announcements", $yearList[0]);
$historyYearData = getHistoryYearData($DB);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>d`Alba GLOBAL</title>
    <!-- Favicon -->
    <link rel="icon" href="./_img/common/favicon.png" />
    <!-- OpenGraph -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="d`Alba GLOBAL" />
    <meta property="og:description" content="d`Alba GLOBAL" />
    <meta property="og:image" content="./_img/common/opengraph.png" />
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
    <!-- Custom CSS & JS -->
    <link rel="stylesheet" href="./_css/reset.css" />
    <link rel="stylesheet" href="./_css/setting.css" />
    <link rel="stylesheet" href="./_css/common.css" />
    <link rel="stylesheet" href="./_css/sub.css" />
    <link rel="stylesheet" href="./_css/attribute.css" />
    <script src="./_js/common.js" defer></script>
  </head>

  <body>
    <div id="wrap">
      <header class="header">
          <div class="header__inner">
            <button type="button" class="ham_btn"></button>
            <a href="./index.php" class="logo">
              <img src="./_img/common/logo.svg" alt="" />
            </a>
          <ul class="menu">
            <li class="menu_first">Who we are       
            <ul class="sub_menu">
                <li><a href="./whoweare/heritage.html">HERITAGE</a></li>
                <li><a href="./whoweare/campaigns.html">CAMPAIGNS</a></li>
                <li><a href="./whoweare/brands.html">BRANDS</a></li>
                <li><a href="./whoweare/Innovations.html">INNOVATIONS</a></li>
                <li><a href="#">ACHIEVEMENTS</a></li>
              </ul>
            </li>
            <li><a href="#">Mission</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">History</a></li>
            <li><a href="#">Investors</a></li>
            <li><a href="./main/ESG.html">ESG</a></li>
            <li><a href="#">Newsroom</a></li>
            <li><a href="./main/Shareholders_Club.html">Shareholders</a>' Club</li>
          </ul>
            <div class="global">
              <button type="button" class="global_btn"><span>KOR</span> <p></p></button>
              <ul class="global_ul">
                <li class="on">KOR</li>
                <li>ENG</li>
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
              <button type="button" class="global_btn_mo">KOR <p></p></button>
              <ul class="global_ul_mo">
                <li class="on">KOR</li>
                <li>ENG</li>
              </ul>
            </div>
            <ul class="sidebar_ul">
              <!-- <li><a href="#home">Home</a></li> -->
              <li>
                <button class="btn-lnb">Home <p></p></button>
                <ul class="lnb__list">
                  <li><a href="./whoweare/heritage.html">HERITAGE</a></li>
                  <li><a href="./whoweare/campaigns.html">CAMPAIGNS</a></li>
                  <li><a href="./whoweare/brands.html">BRANDS</a></li>
                  <li><a href="./whoweare/Innovations.html">INNOVATIONS</a></li>
                  <li><a href="#">ACHIEVEMENTS</a></li>
                </ul>
              </li>
              <li><a href="">Mission</a></li>
              <li><a href="">History</a></li>
              <li><a href="">Career</a></li>
              <li>
                <button class="btn-lnb">Investors <p></p></button>
                <ul class="lnb__list">
                  <li><a href="">IR Material</a></li>
                  <li><a href="">Announcements</a></li>
                </ul>
              </li>
              <li><a href="./main/ESG.html">ESG</a></li>
              <li><a href="">Newsroom</a></li>
              <li><a href="./main/Shareholders_Club.html">Shareholders' Club</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <main class="main">
        <div class="section_1 relative">
          <div class="swiper-container fixed">
            <div class="swiper-wrapper">
              <div class="swiper-slide slide01 home" id="home">
                <div class="video_main">
                  <video class="video " autoplay muted playsinline loop>
                    <source type="video/mp4" src="./_img/common/main_video_2.mp4" />
                  </video>
                </div>
                <div class="text">
                  <h1>
                    Global No.1 <br class="mo_show" />Pioneer of the<br />
                    Premium Beauty Lifestyle
                  </h1>
                </div>
              </div>
              <div class="swiper-slide slide02 mission" id="mission">  
                <!-- <div class="video_main career">
                  <video class="video" autoplay muted playsinline loop>
                    <source type="video/mp4" src="./_img/common/career_back.mp4" />
                  </video>
                </div>
                <div class="video_3">
                  <video class="video" autoplay muted playsinline loop>
                  <source src="./_img/common/Mission.mov" type='video/mp4; codecs="hvc1"'>
                    <source type="video/webm" src="./_img/common/Mission.webm" />
                  </video>
                </div> -->
                <div class="video_main career pc_show">
                  <video class="video object-left" autoplay muted playsinline loop>
                    <source type="video/mp4" src="./_img/common/[stage1]Mission_web.mp4" />
                  </video>
                </div>
                <div class="video_main career mo_show">
                  <video class="video " autoplay muted playsinline loop>
                    <source type="video/mp4" src="./_img/common/[stage1]Mission_mob.mp4" />
                  </video>
                </div>
                <div class="text">
                  <h2>Mission</h2>
                  <p>
                    고객 라이프스타일 영역에서
                    진정한 프리미엄의 가치를 제공하는 것이 회사의 사명으로,<br />
                    전 세계 고객들에게 끊임없이 색다른 시도와 도전을 통해<br class="pc_show" />
                    새로운 뷰티 패러다임을 제시하는 것을 목표로 합니다.
                  </p>
                </div>
              </div>
              <div class="swiper-slide slide03 career" id="career">
                <div class="video_main">
                  <!-- <video class="video" autoplay muted playsinline loop>
                  <source src="./_img/common/Career.mov" type='video/mp4; codecs="hvc1"'>
                    <source type="video/webm" src="./_img/common/Career.webm" />
                  </video> -->
                  <video class="video pc_show object-left" autoplay muted playsinline loop>
                    <source type="video/mp4" src="./_img/common/[stage1]Career_web.mp4" />
                  </video>
                  <video class="video mo_show " autoplay muted playsinline loop>
                    <source type="video/mp4" src="./_img/common/[stage1]Career_mob.mp4" />
                  </video>
                </div>
                <div class="text">
                  <h2>Career</h2>
                  <p>
                    달바글로벌과 함께 글로벌 프리미엄 뷰티의<br class="mo_show" />
                    새로운 기준을 제시할 분을 찾습니다.<br />
                    달바의 성공 DNA를 기반으로 회사와 커리어의 동반<br class="mo_show" /> 성장을 실현하는 여정에 합류하세요.
                  </p>
                  <a href="https://dalba.career.greetinghr.com/dalbaglobal" target="_blank"
                    ><span>채용 확인하기</span>
                    <p></p
                  ></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="scroll-page relative">
          <div class="absolute">
            <div class="section_2 ">
                  <!-- pc-history start -->
                  <div class="history_inner">
                    <h1>History</h1>
                    <div class="history_cont">
                      <?
                        $cnt = 0;                        
                        foreach($historyYearData as $year) {
                          $historyMonthData = getHistoryMonthData($DB, $year);
                      ?>
                      <div class="item">
                        <h3><?=$year?></h3>
                        <button type="button" class="one <?=$cnt == 0 ? "active" : "" ?>"></button>
                        <div class="time_line">
                        <? foreach($historyMonthData as $month) { 
                            $historyData = getHistoryData($DB, $year, $month);
                        ?>
                            <div class="year">
                              <h4><?=$month?></h4>
                              <ul>
                                <? foreach($historyData as $data) { ?>
                                  <li><?=$data['content']?></li>
                                <? } ?>
                              </ul>
                            </div>
                          <? } ?> 
                        </div> 
                      </div>
                      <? $cnt++;  }?>
                  </div>
                  </div>
                  <!-- pc-history end -->      
                  <!-- mo-history start -->
                  <div class="mo_his_inner history">
                    <div class="cont">
                      <h1>History</h1>
                      <ul class="year_btn">
                        <? foreach($historyYearData as $year) { ?>
                          <li><a href="#tab_<?=$year?>"><?=$year?></a></li>
                        <? } ?>
                      </ul>
                      <div class="tabcontent">
                        <? foreach ($historyYearData as $year) { 
                            $historyMonthData = getHistoryMonthData($DB, $year);
                        ?>
                        <div id="tab_<?=$year?>" class="year_detail">
                          <? foreach ($historyMonthData as $month) { 
                            $historyData = getHistoryData($DB, $year, $month);
                          ?>
                          <div class="item">
                            <h3><?=$month?></h3>
                            <ol>
                              <? foreach($historyData as $data) { ?>
                                <li><?=$data['content']?></li>
                              <? } ?>
                            </ol>
                          </div>
                          <? } ?>
                        </div>
                        <? } ?>
                      </div>
                    </div>
                  </div>
                  <!-- mo-history end -->
            </div>
            <div class="section_2 IR_Material " id="IR_Material">
              <div class="ir_inner">
              <div class="title_box">  
                <h1>IR Material</h1>
                <a href="#">더보기</a>
              </div>
                <div class="radio-btns">
                  <label for="All" class="radio--typeA"><input type="radio" name="ir" id="All" checked /><em>All</em></label>
                  <label for="Results" class="radio--typeA"><input type="radio" name="ir" id="Results" /><em>Results</em></label>
                  <label for="Presentations" class="radio--typeA"><input type="radio" name="ir" id="Presentations" /><em>Presentations</em></label>
                  <label for="Others" class="radio--typeA"><input type="radio" name="ir" id="Others" /><em>Others</em></label>
                </div>
                <ul class="ir_ul">
                  <?php foreach($irData['posts'] as $row) {?>
                  <li>
                    <div class="title">
                      <h2><?php echo htmlspecialchars($row['subject'])?></h2>
                      <span><?php echo date('Y.m.d', strtotime($row['w_dt']))?></span>
                    </div>
                    <div class="content">
                    <p><?php echo nl2br($row['content']) ?></p>
                      <button type="button" class="plus"></button>
                    </div>


                    <div class="file">
                      
                      <?php if (!empty($row['attachments'])) { ?>
                        <div class="file_box">
                          <span>첨부파일</span>
                          <div class="item">
                            <?php foreach ($row['attachments'] as $attachment) { 
                              ?>
                              <a href="<?php echo $attachment['file_path']; ?>" download="<?php echo $attachment['file_name']?>">
                                <button type="button"><?php echo htmlspecialchars($attachment['file_name']); ?></button>
                              </a>
                            <?php } ?>

                          </div>
                        </div>

                      <?php }?>

                      <?php if (!empty($row['url'])) { ?>
                        <a href="<?php echo (strpos($row['url'], 'https') === false ? 'http://' : '')  . htmlspecialchars($row['url']) ?>" class="link_go">링크 바로가기</a>
                      <?php } ?>

                    </div>
                  </li>


                  <?php } ?>
                </ul>

                <!-- 여기 더보기 버튼 삭제해주세요. 퍼블에서 지웠더니 라디오 버튼 기능이 안먹어서 일단 살려두었습니다. -->
                <button type="button" class="IR_Material btn" data-bbs="ir%" data-offset="<?= count($irData['posts']) ?>" <?= ($irData['total_count'] <= 5) ? 'style="display:none;"' : '' ?> data-total="<?php echo $irData['total_count']?>">더보기</button>

              </div>
            </div>
            <div class="section_2 Announcements " id="Announcements">
              <div class="ir_inner"> 
                <div class="title_box">  
                  <h1>Announcements</h1>
                <a href="#">더보기</a>
                </div>
                <ul class="ir_ul">
                <?php foreach($announcementData['posts'] as $row) {?>
                  <li>
                    <div class="title">
                      <h2><?php echo $row['subject']?></h2>
                      <span><?php echo date('Y.m.d', strtotime($row['w_dt']))?></span>
                    </div>
                    <div class="content">
                    <p><?php echo nl2br($row['content']) ?></p>
                      <button type="button" class="plus"></button>
                    </div>
                    <div class="file">


                      <?php if (!empty($row['attachments'])) { ?>
                        <div class="file_box">
                          <span>첨부파일</span>
                          <div class="item">

                            <?php foreach ($row['attachments'] as $attachment) { 
                              ?>
                              <a href="<?php echo $attachment['file_path']; ?>" download="<?php echo $attachment['file_name']?>">
                                <button type="button"><?php echo $attachment['file_name']; ?></button>
                              </a>
                            <?php } ?>

                          </div>
                        </div>
                      <?php }?>

                      <?php if (!empty($row['url'])) { ?>
                        <a href="<?php echo (strpos($row['url'], 'http') === false ? 'http://' : '') . htmlspecialchars($row['url']) ?>" class="link_go" target="_blank">링크 바로가기</a>
                      <?php } ?>
                      <!-- <a href="<?php echo (strpos($row['url'], 'https') === false ? 'http://' : '')  . htmlspecialchars($row['url']) ?>" class="link_go">링크 바로가기</a> -->
                    </div>
                  </li>
                  <?php } ?>
                </ul>
                <!-- <button type="button" class="btn" data-offset="5">더보기</button> -->
                <!-- 여기 더보기 버튼 삭제해주세요. 퍼블에서 지웠더니 라디오 버튼 기능이 안먹어서 일단 살려두었습니다. -->
                <button type="button" class="btn" data-bbs="announcements" data-offset="5" <?= ($announcementData['total_count'] <= 5) ? 'style="display:none;"' : '' ?> data-total="<?php echo $announcementData['total_count']?>">더보기</button>
              </div>
            </div>
            <div class="section_2 Newsroom "  id="Newsroom">
              <div class="ir_inner"> 
                <div class="title_box">  
                  <h1>Newsroom</h1>
                <a href="#">더보기</a>
              </div>
                <div class="radio-btns news">
                  <label for="news_all" class="radio--typeA"><input type="radio" name="news" id="news_all" checked /><em>All</em></label>
                  <label for="Corp" class="radio--typeA"><input type="radio" name="news" id="Corp" /><em>Corp</em></label>
                  <label for="Brand" class="radio--typeA"><input type="radio" name="news" id="Brand" /><em>Brand</em></label>
                  <label for="Blog" class="radio--typeA"><input type="radio" name="news" id="Blog" /><em>Blog</em></label>
                  <label for="Career" class="radio--typeA"><input type="radio" name="news" id="Career" /><em>Career</em></label>
                  <label for="news_others" class="radio--typeA"><input type="radio" name="news" id="news_others" /><em>Others</em></label>
                </div>
                <ul class="ir_ul news_ul">
                  <?php foreach($newsData['posts'] as $row) {?>
                    <li>
                    <!-- <a href="<?php echo (strpos($row['url'], 'https') === false ? 'http://' : '') . htmlspecialchars($row['url']) ?>>"> -->
                    <a  target="_blank" href="<?php echo (strpos($row['url'], 'https') === false ? 'http://' : '') . htmlspecialchars($row['url']) ?>">  
                    <div class="title">
                        <h2><?php echo $row['subject'] ?></h2>
                        <span><?php echo date('Y.m.d', strtotime($row['w_dt'])) ?></span>
                      </div>
                      <div class="content">
                        <p><?php echo nl2br($row['content']) ?></p>
                        <span></span>
                      </div>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
                <!-- 여기 더보기 버튼 삭제해주세요. 퍼블에서 지웠더니 라디오 버튼 기능이 안먹어서 일단 살려두었습니다. -->
                <button type="button" class="btn" data-bbs="news%" data-offset="5" <?= ($newsData['total_count'] <= 5) ? 'style="display:none;"' : '' ?> data-total="<?php echo $newsData['total_count']?>">더보기</button>

              </div>
            </div>
            <footer class="footer">
              <div class="footer__inner">
                <div class="footer_logo"><img src="./_img/common/logo_footer.svg" alt="" /></div>
                <p>
                  주식회사 달바글로벌 서울특별시 마포구 마포대로 78, 12층<br class="mo_show" />
                  (도화동, 자람빌딩) (04031)<br />
                  CEO 반성연. Hosting by NHN Commerce Tel 02-332-7727.<br class="mo_show" /> Email dalba@dalba.com Information manager 유명한<br />
                  Business Registeration No. 840-88-00333. <br class="mo_show" />Online Sales Reg No. 제 2016-서울마포-0721호<br />
                  © Bmonument.
                </p>
              </div>
            </footer>
          </div>
        </div>
        <a href="#" class="btn_gotop">
          <span></span>
          <p>TOP</p>
        </a>

      </main>
      <!-- <footer class="footer">
        <div class="footer__inner">
          <div class="footer_logo"><img src="./_img/common/logo_footer.svg" alt="" /></div>
          <p>
            주식회사 달바글로벌 서울특별시 마포구 마포대로 78, 12층<br class="mo_show" />
            (도화동, 자람빌딩) (04031)<br />
            CEO 반성연. Hosting by NHN Commerce Tel 02-332-7727.<br class="mo_show" /> Email dalba@dalba.com Information manager 유명한<br />
            Business Registeration No. 840-88-00333. <br class="mo_show" />Online Sales Reg No. 제 2016-서울마포-0721호<br />
            © Bmonument.
          </p>
        </div>
      </footer> -->
    </div>
	<script type="module" src="/_js/getBoardData.js?v=<?PHP echo TIME_HIS?>"></script>  
  <script>
    $(window).on("scroll", function () {
  if ($(window).scrollTop() > 0) {
    $("header").addClass("white");
  } else {
    $("header").removeClass("white");
  }
});
  </script>
</body>
</html>
