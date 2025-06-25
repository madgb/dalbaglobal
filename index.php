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
  <div id="fullpage">
    <div class="section">
      <div class="slide01 home" id="home">
        <div class="video_main">
          <video class="video" autoplay muted playsinline loop data-autoplay="true">
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
    <!-- 헤리티지 시작 -->
    <div class="section section_video">
      <div class="video_main career pc_show">
        <video class="video object-left contain" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/common/[stage2]Piedmont_web.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/common/[stage2]Piedmont_mob.mp4" />
        </video>
      </div>
      <div class="text">
        <h2 class="fade-up_2">Alba Piedmont</h2>
        <p class="fade-up_2">
          <? echo $Piedmont_text ?>
        </p>
        <a href="https://dalba.co.kr/main/html.php?htmid=story/story.html" class="arrow_right fade-up_2"
          target="_blank">
          LEARN MORE
          <p></p>
        </a>
      </div>
    </div>
    <div class="section section_video_B">
      <div class="video_main_B career pc_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/common/No.1-Vegan-PC.mp4" />
        </video>
      </div>
      <div class="video_main_B career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/common/No.1-Vegan-MO.mp4" />
        </video>
      </div>
    </div>
    <div class="section section_video back_ef">
      <div class="video_main career pc_show">
        <video class="video object-left contain" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/common/[stage2]White truffle_web.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/common/[stage2]White truffle_mob.mp4" />
        </video>
      </div>
      <div class="text ">
        <h2 class="fade-up">d’Alba White Truffle</h2>
        <p class="fade-up">
          <b><? echo $Truffle_text_b ?></b>
          <? echo $Truffle_text_p ?>
        </p>
        <a href="https://dalba.co.kr/main/html.php?htmid=story/white-truffle.html" class="arrow_right fade-up"
          target="_blank">
          LEARN MORE
          <p></p>
        </a>
      </div>
    </div>
    <!-- 헤리티지 끝 -->

    <!-- 캠페인 시작 -->
    <div class="section section_video">
      <div class="gra_back"></div>
      <div class="video_main career pc_show">
        <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/compaign/hanhyejin-PC.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/compaign/hanhyejin-MO.mp4" />
        </video>
      </div>
      <div class="text_left">
        <div class="text_box">
          <h3>Brand model</h3>
          <h1>Han, Hyejin</h1>
          <h2>Spray your serum</h2>
        </div>
      </div>
    </div>
    <div class="section section_video">
      <div class="gra_back"></div>
      <div class="video_main career pc_show">
        <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/compaign/Irina-PC.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/compaign/Irina-MO.mp4" />
        </video>
      </div>
      <div class="text_left">
        <div class="text_box">
          <h3>Global model</h3>
          <h1>Irina Shayk</h1>
          <h2>Weightless protection for ultimate comfort</h2>
        </div>
      </div>
    </div>
    <!-- 캠페인 끝 -->

    <!-- 브랜드 시작 -->
    <div class="section brands_back brand_01">
      <div class="item_box">
        <div class="item d’Alba">
          <div class="tit">
            <h1>d’Alba</h1>
            <a href="https://brand.naver.com/dalba" target="_blank" class="arrow_right"></a>
          </div>
          <div class="text">
            <h2>Premium Vegan Skincare Brand</h2>
            <h3>
              <? echo $Skincare_Brand ?>
            </h3>
          </div>
        </div>
        <div class="item Veganery">
          <div class="tit">
            <h1>Veganery</h1>
            <a href="https://brand.naver.com/veganery" target="_blank" class="arrow_right"></a>
          </div>
          <div class="text">
            <h2>Contemporary Inner Beauty Brand</h2>
            <h3>
              <? echo $Beauty_Brand ?>
            </h3>
          </div>
        </div>
        <div class="item Truffle">
          <div class="tit">
            <h1>Truffle di Alba</h1>
            <a href="https://www.instagram.com/truffle_di_alba/" target="_blank" class="arrow_right"></a>
          </div>
          <div class="text">
            <h2>White Truffle-based Italian Fine Dining</h2>
            <h3>
              <? echo $Fine_Dining ?>
            </h3>
          </div>
        </div>
      </div>
    </div>
    <!-- 브랜드 끝 -->

    <!-- innovation start -->
    <div class="section">
      <div class="section_video_text">
        <video class="pc_show" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/Innovations/First-Spray-Serum-PC.mp4" />
        </video>
        <video class="mo_show" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/Innovations/First-Spray-Serum-MO.mp4" />
        </video>
        <div class="text_boxB">
          <h1>First Spray Serum</h1>
          <div class="sub">
            <span><? echo $Spray_Serum_span ?></span>
            <p><? echo $Spray_Serum_p ?></p>
          </div>
          <!-- <a href="#" class="arrow_right">
            <p></p>
          </a> -->
        </div>
      </div>
    </div>
    <div class="section right">
      <div class="section_video_text B">
        <div class="text_boxB">
          <h1>
            Waterful Tone-up<br />
            Sunscreen
          </h1>
          <div class="sub">
            <span><? echo $Tone_up_Sunscreen_span ?></span>
            <p>
              <? echo $Tone_up_Sunscreen_p ?>
            </p>
          </div>
          <!-- <a href="#" class="arrow_right">
            <p></p>
          </a> -->
        </div>
        <video class="pc_show" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/Innovations/Toneup-Sunscreen-PC.mp4" />
        </video>
        <video class="mo_show" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/Innovations/Toneup-Sunscreen-MO.mp4" />
        </video>
      </div>
    </div>
    <div class="section">
      <div class="section_video_text">
        <video class="pc_show" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/Innovations/Double-Cream-PC.mp4" />
        </video>
        <video class="mo_show" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/Innovations/Double-Cream-MO.mp4" />
        </video>
        <div class="text_boxB">
          <h1>
            White Truffle<br />
            Double Serum & Cream
          </h1>
          <div class="sub">
            <span><? echo $Double_Serum_span ?></span>
            <p>
              <? echo $Double_Serum_p ?>
            </p>
          </div>
          <!-- <a href="#" class="arrow_right">
            <p></p>
          </a> -->
        </div>
      </div>
    </div>
    <!-- innovation end -->

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
            <? echo $main_mission ?>
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
            <? echo $Career_text ?>
          </p>
          <a href="https://dalba.career.greetinghr.com/dalbaglobal"
            target="_blank"><span><? echo $Career_button ?></span>
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
        <a href="/main/history.php" class="btn go_history_btn"><? echo $more ?></a>
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
          <a href="./main/history.html" class="btn go_history_btn"><? echo $more ?></a>
        </div>
      </div>
      <!-- mo-history end -->
    </div>
    <div class="section section_2 IR_Material full_ir" id="IR_Material">

      <!-- #### todo: mo에선 3개 게시글 리스트만 노출되게 #### -->
      <div class="ir_inner">
        <div class="title_box">
          <h1>IR Material</h1>
          <a href="/main/ir_material.php" class="pc_show"><? echo $more ?></a>
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
        <a href="/main/ir_material.php" class="btn go_history_btn mo_show"><? echo $more ?></a>
      </div>
    </div>
    <div class="section section_2 Announcements full_ir " id="Announcements">

      <!-- #### todo: mo에선 3개 게시글 리스트만 노출되게 #### -->
      <div class="ir_inner">
        <div class="title_box">
          <h1>Announcements</h1>
          <a href="/main/announcements.php" class="pc_show"><? echo $more ?></a>
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
        <a href="./main/announcements.php" class="btn go_history_btn mo_show"><? echo $more ?></a>
      </div>
    </div>

    <!-- ESG section start -->
    <div class="section section_video esg-section">
      <div class="video_main career pc_show">
        <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/common/[stage2]environment_web.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/common/[stage2]environment_mob_2.mp4" />
        </video>
      </div>
      <div class="text B text_ani">
        <h2>Environment</h2>
        <h6>
          <b><? echo $Environment_b ?></b>
          <p>
            <? echo $Environment_p ?>
          </p>
        </h6>
      </div>
    </div>
    <div class="section section_video esg-section">
      <div class="video_main career pc_show">
        <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/common/[stage2]Social_web.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/common/[stage2]Social_mob.mp4" />
        </video>
      </div>
      <div class="text B text_ani">
        <h2>Social</h2>
        <h6>
          <b><? echo $Social_b ?></b>
          <p>
            <? echo $Social_p ?>
          </p>
        </h6>
      </div>
    </div>
    <div class="section section_video esg-section">
      <div class="video_main career pc_show">
        <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/common/[stage2]Governance_web.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="./_img/common/[stage2]Governance_mob.mp4" />
        </video>
      </div>
      <div class="text B text_ani">
        <h2>Governance</h2>
        <h6>
          <b><? echo $Governance_b ?></b>
          <p><? echo $Governance_p ?></p>
        </h6>
      </div>
    </div>
    <!-- ESG section end -->
    <div class="section section_2 Newsroom full_ir" id="Newsroom">

      <!-- #### todo: mo에선 3개 게시글 리스트만 노출되게 #### -->
      <div class="ir_inner">
        <div class="title_box">
          <h1>Newsroom</h1>
          <a href="/main/newsroom.php" class="pc_show"><? echo $more ?></a>
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
        <a href="/main/newsroom.php" class="btn go_history_btn mo_show"><? echo $more ?></a>
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
  const header = document.querySelector("header");
  let isHeaderAlwaysVisible = false;
  let isMouseInTopArea = false;

  document.addEventListener("DOMContentLoaded", () => {
    isHeaderAlwaysVisible = true;
    header.classList.remove("hidden");

    document.addEventListener("mousemove", function (e) {
      const inTopArea = e.clientY < 100;
      const inHeader = header.contains(e.target);

      if (isHeaderAlwaysVisible) {
        header.classList.remove("hidden");
        return;
      }

      if (inTopArea || inHeader) {
        if (!isMouseInTopArea) {
          header.classList.remove("hidden");
          isMouseInTopArea = true;
        }
      } else {
        if (isMouseInTopArea) {
          header.classList.add("hidden");
          isMouseInTopArea = false;
        }
      }
    });

    header.addEventListener("mouseenter", () => {
      if (!isHeaderAlwaysVisible) {
        header.classList.remove("hidden");
      }
    });

    header.addEventListener("mouseleave", () => {
      if (!isHeaderAlwaysVisible && !isMouseInTopArea) {
        header.classList.add("hidden");
      }
    });
  });

  // fullpage 초기화
  new fullpage("#fullpage", {
    autoScrolling: true,
    scrollHorizontally: true,
    scrollOverflow: true,
    fitToSection: true,

    afterLoad: function (origin, destination, direction) {
      // 0번째 슬라이드면 항상 헤더 보이게
      if (destination.index === 0) {
        header.classList.remove("hidden");
        isHeaderAlwaysVisible = true;
      } else {
        header.classList.add("hidden");
        isHeaderAlwaysVisible = false;
      }

      // 헤더 색상 전환
      if (destination.index >= 2) {
        header.classList.add('white');
      } else {
        header.classList.remove('white');
      }

      // ESG 전용 텍스트 애니메이션
      const currentSection = destination.item;
      const isEsgSection = currentSection.classList.contains('esg-section');
      document.querySelectorAll('.text_ani').forEach(el => el.classList.remove('active'));
      if (isEsgSection) {
        const textEl = currentSection.querySelector('.text_ani');
        if (textEl) textEl.classList.add('active');
      }
    }
  });

  // Top 버튼
  document.querySelector('.full_top').addEventListener('click', () => {
    fullpage_api.moveTo(1);
  });

  // 초기 헤더 상태 조정
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