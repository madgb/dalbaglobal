<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/header.php"; ?>

<?php
$irData = fetchData($DB, "ir%");
$yearList = getYear($DB);
$announcementData = fetchData($DB, "announcements");
$newsData = fetchData($DB, "news%");
$historyYearData = getHistoryYearData_nolimit($DB);
$lang = $_SESSION['lang'] ? $_SESSION['lang'] : 'KR';
$langParam = $lang ? "&lang=" . urlencode($lang) : "";
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
    <div class="section section_video" id="section_02">
      <div class="video_main career pc_show">
        <video class="video object-left contain" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/common/[stage2]Piedmont_web.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/common/[stage2]Piedmont_mob.mp4" />
        </video>
      </div>
      <div class="text">
        <h2 class="fade-up">Alba Piedmont</h2>
        <p class="fade-up">
          <?php echo $Piedmont_text ?>
        </p>
        <a href="https://dalba.co.kr/main/html.php?htmid=story/story.html" class="arrow_right fade-up" target="_blank">
          LEARN MORE
          <p></p>
        </a>
      </div>
    </div>
    <div class="section section_video_B">
      <div class="video_main_B career pc_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/common/No.1-Vegan-PC.mp4" />
        </video>
      </div>
      <div class="video_main_B career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/common/No.1-Vegan-MO.mp4" />
        </video>
      </div>
    </div>
    <div class="section section_video back_ef">
      <div class="video_main career pc_show">
        <video class="video object-left contain" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/common/[stage2]White truffle_web.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/common/[stage2]White truffle_mob.mp4" />
        </video>
      </div>
      <div class="text ">
        <h2 class="fade-up">d’Alba White Truffle</h2>
        <p class="fade-up">
          <b><?php echo $Truffle_text_b ?></b>
          <?php echo $Truffle_text_p ?>
        </p>
        <a href="https://dalba.co.kr/main/html.php?htmid=story/white-truffle.html" class="arrow_right fade-up"
          target="_blank">
          LEARN MORE
          <p></p>
        </a>
      </div>
    </div>
    <!-- 헤리티지 끝 -->

    <!-- 캠페인 시작 (섹션 05) -->
    <div class="section section_video" id="section_05">
      <div class="gra_back"></div>
      <div class="video_main career pc_show">
        <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/compaign/hanhyejin-PC.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/compaign/hanhyejin-MO.mp4" />
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
          <source type="video/mp4" data-src="./_img/compaign/Irina-PC.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/compaign/Irina-MO.mp4" />
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

    <!-- 브랜드 시작 (섹션 07)-->
    <div class="section section_video" id="section_07">
      <div class="video_main career pc_show">
        <video class="video object-left contain" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/brand/dalba_brand_pc.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/brand/dalba_brand_mo.mp4" />
        </video>
      </div>
      <div class="text">
        <h2 class="fade-up">d’Alba</h2>
        <p class="fade-up">
          Premium Vegan Skincare Brand
        </p>
        <p class="fade-up">
          <?php echo $Skincare_Brand ?>
        </p>
        <a href="https://brand.naver.com/dalba" class="arrow_right fade-up" target="_blank">
          LEARN MORE
          <p></p>
        </a>
      </div>
    </div>

    <div class="section section_video">
      <div class="video_main career pc_show">
        <video class="video object-left contain" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/brand/veganery_pc.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/brand/veganery_mo.mp4" />
        </video>
      </div>
      <div class="text">
        <h2 class="fade-up">Veganery</h2>
        <p class="fade-up">
          Contemporary Inner Beauty Brand
        </p>
        <p class="fade-up">
          <?php echo $Beauty_Brand ?>
        </p>
        <a href="https://brand.naver.com/veganery" class="arrow_right fade-up" target="_blank">
          LEARN MORE
          <p></p>
        </a>
      </div>
    </div>

    <div class="section section_video">
      <div class="video_main career pc_show">
        <video class="video object-left contain" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/brand/truffle_de_alba_pc.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/brand/truffle_de_alba_mo.mp4" />
        </video>
      </div>
      <div class="text">
        <h2 class="fade-up">Truffle di Alba</h2>
        <p class="fade-up">
          White Truffle-based Italian Fine Dining
        </p>
        <p class="fade-up">
          <?php echo $Fine_Dining ?>
        </p>
        <a href="https://www.instagram.com/truffle_di_alba/" class="arrow_right fade-up" target="_blank">
          LEARN MORE
          <p></p>
        </a>
      </div>
    </div>
    <!-- 브랜드 끝 -->

    <!-- innovation start (섹션 08) -->
    <div class="section innovation" id="section_08">
      <div class="section_video_text">
        <div class="video-background">
          <video class="pc_show" controls muted playsinline loop>
            <source type="video/mp4" data-src="./_img/Innovations/First-Spray-Serum-PC.mp4" />
          </video>
          <video class="mo_show" controls muted playsinline loop preload="auto">
            <source type="video/mp4" data-src="./_img/Innovations/First-Spray-Serum-MO.mp4" />
          </video>
          <div class="text_overlay pc_show">
            <h1>First Spray Serum</h1>
            <div class="sub">
              <span><?php echo $Spray_Serum_span ?></span>
              <p><?php echo $Spray_Serum_p ?></p>
            </div>
          </div>

          <div class="text_boxB text_overlay">
            <h1>First Spray Serum</h1>
            <div class="sub">
              <span><?php echo $Spray_Serum_span ?></span>
              <p><?php echo $Spray_Serum_p ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section innovation">
      <div class="section_video_text">
        <div class="video-background">
          <video class="pc_show" controls muted playsinline loop>
            <source type="video/mp4" data-src="./_img/Innovations/Toneup-Sunscreen-PC.mp4" />
          </video>
          <video class="mo_show" controls muted playsinline loop preload="auto">
            <source type="video/mp4" data-src="./_img/Innovations/Toneup-Sunscreen-MO.mp4" />
          </video>

          <div class="text_overlay pc_show">
            <h1>
              Waterful Tone-up<br />
              Sunscreen
            </h1>
            <div class="sub">
              <span><?php echo $Tone_up_Sunscreen_span ?></span>
              <p><?php echo $Tone_up_Sunscreen_p ?></p>
            </div>
          </div>

          <div class="text_boxB text_overlay">
            <h1>
              Waterful Tone-up<br />
              Sunscreen
            </h1>
            <div class="sub">
              <span><?php echo $Tone_up_Sunscreen_span ?></span>
              <p><?php echo $Tone_up_Sunscreen_p ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section innovation">
      <div class="section_video_text">
        <div class="video-background">
          <video class="pc_show" controls muted playsinline loop>
            <source type="video/mp4" data-src="./_img/Innovations/Double-Cream-PC.mp4" />
          </video>
          <video class="mo_show" controls muted playsinline loop preload="auto">
            <source type="video/mp4" data-src="./_img/Innovations/Double-Cream-MO.mp4" />
          </video>
          <div class="text_overlay pc_show">
            <h1>
              White Truffle<br />
              Double Serum & Cream
            </h1>
            <div class="sub">
              <span><?php echo $Double_Serum_span ?></span>
              <p><?php echo $Double_Serum_p ?></p>
            </div>
          </div>

          <div class="text_boxB text_overlay">
            <h1>
              White Truffle<br />
              Double Serum & Cream
            </h1>
            <div class="sub">
              <span><?php echo $Double_Serum_span ?></span>
              <p><?php echo $Double_Serum_p ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- innovation end -->

    <!-- 미션 시작 (섹션 11) -->
    <div class="section" id="section_11">
      <div class="slide02 mission" id="mission">
        <div class="video_main career pc_show">
          <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
            <source type="video/mp4" data-src="./_img/common/[stage1]Mission_web.mp4" />
          </video>
        </div>
        <div class="video_main career mo_show">
          <video class="video " autoplay muted playsinline loop data-autoplay="true">
            <source type="video/mp4" data-src="./_img/common/[stage1]Mission_mob.mp4" />
          </video>
        </div>
        <div class="text">
          <h2>Mission</h2>
          <p>
            <?php echo $main_mission ?>
          </p>
        </div>
      </div>
    </div>

    <!-- 커리어 시작 (섹션 12) -->
    <div class="section" id="section_12">
      <div class="slide03 career" id="career">
        <div class="video_main">
          <video class="video pc_show object-left" autoplay muted playsinline loop data-autoplay="true">
            <source type="video/mp4" data-src="./_img/common/[stage1]Career_web.mp4" />
          </video>
          <video class="video mo_show " autoplay muted playsinline loop data-autoplay="true">
            <source type="video/mp4" data-src="./_img/common/[stage1]Career_mob.mp4" />
          </video>
        </div>
        <div class="text">
          <h2>Career</h2>
          <p>
            <?php echo $Career_text ?>
          </p>
          <a href="https://dalba.career.greetinghr.com/dalbaglobal"
            target="_blank"><span><?php echo $Career_button ?></span>
            <p></p>
          </a>
        </div>
      </div>
    </div>

    <!-- 히스토리 시작 (섹션 13) -->
    <!-- <div class="section_2 section full_his" id="section_13"> -->
    <div class="section_2 section his_section" id="section_13">
      <!-- pc-history start -->
      <div class="history_inner">
        <h1>History</h1>
        <div class="history_cont history_pc" id="history_pc">
          <?php
          $cnt = 0;
          foreach ($historyYearData as $year) {
            $historyMonthData = $lang == "EN" ? getHistoryMonthData_eng($DB, $year) : getHistoryMonthData($DB, $year);
            ?>
            <div class="item">
              <h3 class=" <?= $cnt == 0 ? "active" : "" ?>"><?= $year ?></h3>
              <button type="button" class="one <?= $cnt == 0 ? "active" : "" ?>"></button>
              <div class="time_line">
                <?php foreach ($historyMonthData as $month) {
                  $historyData = $lang == "EN" ? getHistoryData_eng($DB, $year, $month) : getHistoryData($DB, $year, $month);
                  ?>
                  <div class="year">
                    <h4><?= $month ?></h4>
                    <ul>
                      <?php foreach ($historyData as $data) { ?>
                        <li><?= $data['content'] ?></li>
                      <?php } ?>
                    </ul>
                  </div>
                <?php } ?>
              </div>
            </div>
            <?php $cnt++;
          } ?>
        </div>
      </div>
      <!-- pc-history end -->
      <!-- mo-history start -->
      <div class="mo_his_inner ">
        <div class="cont">
          <h1>History</h1>
          <ul class="year_btn" id="history_mo_years">
            <?php foreach ($historyYearData as $year) { ?>
              <li><a href="#tab_<?= $year ?>"><?= $year ?></a></li>
            <?php } ?>
          </ul>
          <div class="tabcontent history_mo" id="history_mo_content">
            <?php foreach ($historyYearData as $year) {
              $historyMonthData = $lang == "EN" ? getHistoryMonthData_eng($DB, $year) : getHistoryMonthData($DB, $year);
              ?>
              <div id="tab_<?= $year ?>" class="year_detail">
                <?php foreach ($historyMonthData as $month) {
                  $historyData = $lang == "EN" ? getHistoryData_eng($DB, $year, $month) : getHistoryData($DB, $year, $month);
                  ?>
                  <div class="item">
                    <h3><?= $month ?></h3>
                    <ol>
                      <?php foreach ($historyData as $data) { ?>
                        <li><?= $data['content'] ?></li>
                      <?php } ?>
                    </ol>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- mo-history end -->
    </div>

    <!-- IR Material 시작 (섹션 14) -->
    <div class="section section_2 IR_Material full_ir" id="section_14">

      <!-- #### todo: mo에선 3개 게시글 리스트만 노출되게 #### -->
      <div class="ir_inner">
        <div class="title_box">
          <h1>IR Material</h1>
          <a href="/main/ir_material.php<?php echo $langParam ? '?' . $langParam : ''; ?>"
            class="pc_show"><?php echo $more ?></a>
        </div>
        <ul class="ir_ul">
          <?php foreach ($irData['posts'] as $row) { ?>
            <li>
              <a href="./main/ir_material_detail.php?b_idx=<?php echo $row['b_idx'] . $langParam ?>">
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
        <a href="/main/ir_material.php<?php echo $langParam ? '?' . $langParam : ''; ?>"
          class="btn go_history_btn mo_show"><?php echo $more ?></a>
      </div>
    </div>

    <!-- Announcements 시작 (섹션 15) -->
    <div class="section section_2 Announcements full_ir " id="section_15">

      <!-- #### todo: mo에선 3개 게시글 리스트만 노출되게 #### -->
      <div class="ir_inner">
        <div class="title_box">
          <h1>Announcements</h1>
          <a href="/main/announcements.php<?php echo $langParam ? '?' . $langParam : ''; ?>"
            class="pc_show"><?php echo $more ?></a>
        </div>
        <ul class="ir_ul">
          <?php foreach ($announcementData['posts'] as $row) { ?>
            <li>
              <a href="/main/announcements_detail.php?b_idx=<?php echo $row['b_idx'] . $langParam ?>">
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
        <a href="./main/announcements.php<?php echo $langParam ? '?' . $langParam : ''; ?>"
          class="btn go_history_btn mo_show"><?php echo $more ?></a>
      </div>
    </div>

    <!-- ESG section start (section 16)-->
    <div class="section section_video esg-section" id="section_16">
      <div class="video_main career pc_show">
        <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/common/[stage2]Environment_web.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/common/[stage2]Environment_mob.mp4" />
        </video>
      </div>
      <div class="text B text_ani">
        <h2>Environment</h2>
        <h6>
          <b><?php echo $Environment_b ?></b>
          <p>
            <?php echo $Environment_p ?>
          </p>
        </h6>
      </div>
    </div>
    <div class="section section_video esg-section">
      <div class="video_main career pc_show">
        <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/common/[stage2]Social_web.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/common/[stage2]Social_mob.mp4" />
        </video>
      </div>
      <div class="text B text_ani">
        <h2>Social</h2>
        <h6>
          <b><?php echo $Social_b ?></b>
          <p>
            <?php echo $Social_p ?>
          </p>
        </h6>
      </div>
    </div>
    <div class="section section_video esg-section">
      <div class="video_main career pc_show">
        <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/common/[stage2]Governance_web.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" data-src="./_img/common/[stage2]Governance_mob.mp4" />
        </video>
      </div>
      <div class="text B text_ani">
        <h2>Governance</h2>
        <h6>
          <b><?php echo $Governance_b ?></b>
          <p><?php echo $Governance_p ?></p>
        </h6>
      </div>
    </div>
    <!-- ESG section end -->

    <!-- Newsroom start (section 19) -->
    <div class="section section_2 Newsroom full_ir" id="section_19">

      <!-- #### todo: mo에선 3개 게시글 리스트만 노출되게 #### -->
      <div class="ir_inner">
        <div class="title_box">
          <h1>Newsroom</h1>
          <a href="/main/newsroom.php" class="pc_show"><?php echo $more ?></a>
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
        <a href="/main/newsroom.php" class="btn go_history_btn mo_show"><?php echo $more ?></a>
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
    const videos = document.querySelectorAll('.innovation .video-background video');

    videos.forEach((video) => {
      const section = video.closest('.section');
      const isMobile = window.innerWidth <= 768;
      const overlay = section.querySelector(isMobile ? '.text_boxB.text_overlay' : '.text_overlay.pc_show');

      video.addEventListener('play', () => {
        setTimeout(() => {
          if (overlay) {
            overlay.classList.add('hide-overlay');
          }
        }, 2500); // 3초 후 숨김
      });
    });

    const isMobile = window.innerWidth <= 768;
    isHeaderAlwaysVisible = isMobile;

    if (isMobile) {
      header.classList.remove("hidden"); // 모바일은 항상 보이게
      return; // 마우스 이벤트 등록 안함
    }
    // header.classList.remove("hidden");

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

  function isMobileDevice() {
    return window.innerWidth <= 768;
  }

  function preloadVideosInSection(section) {
    const isMobile = isMobileDevice();
    const classToLoad = isMobile ? ".mo_show" : ".pc_show";

    const sources = section.querySelectorAll(`${classToLoad} > source[data-src]`);
    sources.forEach(source => {
      const video = source.closest("video");
      const dataSrc = source.getAttribute("data-src");

      if (dataSrc && !source.src) {
        source.src = dataSrc;
        video.load(); // 썸네일/controls 노출 보장
      }
    });
  }

  function loadVideosInSection(section) {
    const isMobile = isMobileDevice();
    const classToLoad = isMobile ? ".mo_show" : ".pc_show";

    const sources = section.querySelectorAll(`${classToLoad} > source[data-src]`);
    sources.forEach(source => {
      const video = source.closest("video");
      if (source.src && video.readyState < 3) {
        video.play().catch(() => { });
      }
    });
  }

  // fullpage 초기화
  new fullpage("#fullpage", {
    autoScrolling: true,
    scrollHorizontally: true,
    scrollOverflow: true,
    fitToSection: true,

    onLeave: function (origin, destination, direction) {
      // 현재 위치에서 다음 위치로 이동하기 직전
      preloadVideosInSection(destination.item);  // 바로 다음 섹션을 미리 준비
    },

    afterLoad: function (origin, destination, direction) {
      const isMobile = window.innerWidth <= 768;

      loadVideosInSection(destination.item);

      // 모바일이 아니면 헤더 숨김/표시 조건 적용
      if (!isMobile) {
        if (destination.index === 0) {
          header.classList.remove("hidden");
          isHeaderAlwaysVisible = true;
        } else {
          header.classList.add("hidden");
          isHeaderAlwaysVisible = false;
        }
      } else {
        // 모바일이면 항상 보여지도록
        header.classList.remove("hidden");
        isHeaderAlwaysVisible = true;
      }

      // 헤더 색상 전환
      // white 2, 4 
      if (destination.index === 2) {
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

      // fade-up 애니메이션 트리거
      // 먼저 모든 fade-up에서 active 제거 (선택사항)
      document.querySelectorAll('.fade-up').forEach(el => el.classList.remove('active'));

      // 현재 섹션 안의 fade-up에 active 추가
      currentSection.querySelectorAll('.fade-up').forEach(el => el.classList.add('active'));
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