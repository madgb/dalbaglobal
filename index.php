<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/header.php"; ?>

<?php
$irData = fetchData($DB, "ir%");
$yearList = getYear($DB);
$announcementData = fetchData($DB, "announcements");
$newsData = fetchData($DB, "news%");
//$announcementData = fetchYearData($DB,"announcements", $yearList[0]);
$historyYearData = getHistoryYearData($DB);
?>

<main class="main">
  <div  id="fullpage">
       <div class="section">
           <div class="slide01 home" id="home">
              <div class="video_main">
                <video class="video " autoplay muted playsinline loop data-autoplay="true">
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
       </div>
      <div class="section">
        <div class="slide02 mission" id="mission">
            <div class="video_main career pc_show">
              <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
                <source type="video/mp4" src="./_img/common/[stage1]Mission_web.mp4" />
              </video>
            </div>
            <div class="video_main career mo_show">
              <video class="video " autoplay muted playsinline loop data-autoplay="true">
                <source type="video/mp4" src="./_img/common/[stage1]Mission_mob.mp4" />
              </video>
            </div>
            <div class="text">
              <h2>Mission</h2>
              <p>
                <? echo $main_mission?>
              </p>
            </div>
          </div>
      </div>
      
      <div class="section">
          <div class="slide03 career" id="career">
            <div class="video_main">
              <video class="video pc_show object-left" autoplay muted playsinline loop data-autoplay="true">
                <source type="video/mp4" src="./_img/common/[stage1]Career_web.mp4" />
              </video>
              <video class="video mo_show " autoplay muted playsinline loop data-autoplay="true">
                <source type="video/mp4" src="./_img/common/[stage1]Career_mob.mp4" />
              </video>
            </div>
            <div class="text">
              <h2>Career</h2>
              <p>
                <? echo $Career_text?>
              </p>
              <a href="https://dalba.career.greetinghr.com/dalbaglobal" target="_blank"><span><? echo $Career_button?></span>
                <p></p>
              </a>
            </div>
          </div>
      </div>  
      <div class="section_2 section full_his">
          <!-- pc-history start -->
          <div class="history_inner">
            <h1>History</h1>
            <div class="history_cont" id="history_cont">
              <?
              $cnt = 0;
              foreach ($historyYearData as $year) {
                $historyMonthData = getHistoryMonthData($DB, $year);
                ?>
                <div class="item">
                  <h3 class=" <?= $cnt == 0 ? "active" : "" ?>"><?= $year ?></h3>
                  <button type="button" class="one <?= $cnt == 0 ? "active" : "" ?>"></button>
                  <div class="time_line">
                    <? foreach ($historyMonthData as $month) {
                      $historyData = getHistoryData($DB, $year, $month);
                      ?>
                      <div class="year">
                        <h4><?= $month ?></h4>
                        <ul>
                          <? foreach ($historyData as $data) { ?>
                            <li><?= $data['content'] ?></li>
                          <? } ?>
                        </ul>
                      </div>
                    <? } ?>
                  </div>
                </div>
                <? $cnt++;
              } ?>
            </div>
            <a href="/main/history.php" class="btn go_history_btn"><? echo $more?></a>
          </div>
          <!-- pc-history end -->
          <!-- mo-history start -->
          <div class="mo_his_inner history">
            <div class="cont">
              <h1>History</h1>
              <ul class="year_btn">
                <? foreach ($historyYearData as $year) { ?>
                  <li><a href="#tab_<?= $year ?>"><?= $year ?></a></li>
                <? } ?>
              </ul>
              <div class="tabcontent">
                <? foreach ($historyYearData as $year) {
                  $historyMonthData = getHistoryMonthData($DB, $year);
                  ?>
                  <div id="tab_<?= $year ?>" class="year_detail">
                    <? foreach ($historyMonthData as $month) {
                      $historyData = getHistoryData($DB, $year, $month);
                      ?>
                      <div class="item">
                        <h3><?= $month ?></h3>
                        <ol>
                          <? foreach ($historyData as $data) { ?>
                            <li><?= $data['content'] ?></li>
                          <? } ?>
                        </ol>
                      </div>
                    <? } ?>
                  </div>
                <? } ?>
              </div>
              <a href="./main/history.html" class="btn go_history_btn"><? echo $more?></a>
            </div>
          </div>
          <!-- mo-history end -->
        </div>
        <div class="section section_2 IR_Material full_ir" id="IR_Material">
          
           <!-- #### todo: mo에선 3개 게시글 리스트만 노출되게 #### -->
          <div class="ir_inner">
            <div class="title_box">
              <h1>IR Material</h1>
              <a href="/main/ir_material.php" class="pc_show"><? echo $more?></a>
            </div>
            <ul class="ir_ul">
              <?php foreach ($irData['posts'] as $row) { ?>
                <li>
                  <a href="./main/ir_material_detail.php?b_idx=<?php echo $row['b_idx'] ?>">
                    <div class="title">
                      <h2><?php echo htmlspecialchars($row['subject']) ?></h2>
                      <span><?php echo date('Y.m.d', strtotime($row['w_dt'])) ?></span>
                    </div>
                    <div class="content"> 
                     <h6> <?php echo nl2br($row['content']) ?></h6>
                    </div>
                  </a>
                </li>
              <?php } ?>
            </ul>
            <a href="/main/ir_material.php" class="btn go_history_btn mo_show"><? echo $more?></a>
          </div>
        </div>
        <div class="section section_2 Announcements full_ir " id="Announcements">
          
           <!-- #### todo: mo에선 3개 게시글 리스트만 노출되게 #### -->
          <div class="ir_inner">
            <div class="title_box">
              <h1>Announcements</h1>
              <a href="/main/announcements.php" class="pc_show"><? echo $more?></a>
            </div>
            <ul class="ir_ul">
              <?php foreach ($announcementData['posts'] as $row) { ?>
                <li>
                  <a href="/main/announcements_detail.php?b_idx=<?php echo $row['b_idx'] ?>">
                    <div class="title">
                      <h2><?php echo $row['subject'] ?></h2>
                      <span><?php echo date('Y.m.d', strtotime($row['w_ymd'])) ?></span>
                    </div>
                    <div class="content">
                     <h6> <?php echo nl2br($row['content']) ?></h6>
                    </div>
                  </a>
                </li>
              <?php } ?>
            </ul>
            <a href="./main/announcements.php" class="btn go_history_btn mo_show"><? echo $more?></a>
          </div>
        </div>
        <div class="section section_2 Newsroom full_ir" id="Newsroom">
          
           <!-- #### todo: mo에선 3개 게시글 리스트만 노출되게 #### -->
          <div class="ir_inner">
            <div class="title_box">
              <h1>Newsroom</h1>
              <a href="/main/newsroom.php" class="pc_show"><? echo $more?></a>
            </div>
            <ul class="ir_ul">
              <?php foreach ($newsData['posts'] as $row) { ?>
                <li>
                  <a target="_blank"
                    href="<?php echo (strpos($row['url'], 'https') === false ? 'http://' : '') . htmlspecialchars($row['url']) ?>">
                    <div class="title">
                      <h2><?php echo $row['subject'] ?></h2>
                      <span><?php echo date('Y.m.d', strtotime($row['w_dt'])) ?></span>
                    </div>
                    <div class="content">
                      <h6><?php echo nl2br($row['content']) ?></h6>
                    </div>
                  </a>
                </li>
              <?php } ?>
            </ul>
            <a href="/main/newsroom.php" class="btn go_history_btn mo_show"><? echo $more?></a>
          </div>
        </div>
          <div class="section fp-auto-height section_footer">
      <?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/footer.php"; ?>
    </div>
  </div>
  <a href="#" class="btn_gotop full_top">
    <span></span>
    <p>TOP</p>
  </a>

</main>

</div>
<script type="module" src="/_js/getBoardData.js?v=<?PHP echo TIME_HIS ?>"></script>
<script>
    new fullpage("#fullpage", {
    autoScrolling: true,
    scrollHorizontally: true,
    scrollOverflow: true,
    // 아래 옵션을 주면 fp-auto-height가 자동 처리돼요
    autoScrolling: true,
    fitToSection: true,
      afterLoad: function(origin, destination, direction){
    // destination.index는 0부터 시작하니까 3 이상이면 4번째 섹션부터
    if(destination.index >= 3){
      document.querySelector('header').classList.add('white');
    } else {
      document.querySelector('header').classList.remove('white');
    }
  }
  });
  // fullpage top button
  document.querySelector('.full_top').addEventListener('click', () => {
    fullpage_api.moveTo(1);
  });
  $("header").removeClass("white");

</script>

<script>
function showOnlyThreeOnMobile() {
  const lists = document.querySelectorAll('.ir_ul');
  lists.forEach(ul => {
    const lis = ul.querySelectorAll('li');
    if ($(window).width() <= 768) {
      lis.forEach((li, idx) => {
        li.style.display = idx < 3 ? '' : 'none';
      });
    } else {
      lis.forEach(li => li.style.display = '');
    }
  });
}
window.addEventListener('resize', showOnlyThreeOnMobile);
window.addEventListener('DOMContentLoaded', showOnlyThreeOnMobile);
</script>
</body>

</html>