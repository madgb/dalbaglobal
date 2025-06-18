<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/header.php"; ?>

<main class="main">
  <div id="fullpage">
    <div class="section section_video">
      <div class="video_main career pc_show">
        <video class="video object-left contain" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="../_img/common/[stage2]Piedmont_web.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="../_img/common/[stage2]Piedmont_mob.mp4" />
        </video>
      </div>
      <div class="text">
        <h2  class="fade-up_2" >Alba Piedmont</h2>
        <p  class="fade-up_2">
        <?echo $Piedmont_text?>
        </p>
        <a href="https://dalba.co.kr/main/html.php?htmid=story/story.html" class="arrow_right fade-up_2" target="_blank">
          LEARN MORE
          <p></p>
        </a>
      </div>
    </div>
    <div class="section section_video_B">
      <div class="video_main_B career pc_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="../_img/common/No.1-Vegan-PC.mp4" />
        </video>
      </div>
      <div class="video_main_B career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="../_img/common/No.1-Vegan-MO.mp4" />
        </video>
      </div>
    </div>
    <div class="section section_video back_ef">
      <div class="video_main career pc_show">
        <video class="video object-left contain" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="../_img/common/[stage2]White truffle_web.mp4" />
        </video>
      </div>
      <div class="video_main career mo_show">
        <video class="video" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="../_img/common/[stage2]White truffle_mob.mp4" />
        </video>
      </div>
      <div class="text " >
        <h2 class="fade-up">d’Alba White Truffle</h2>
        <p  class="fade-up">
          <b><?echo $Truffle_text_b?></b>
         <?echo $Truffle_text_p?>
        </p>
        <a href="https://dalba.co.kr/main/html.php?htmid=story/white-truffle.html" class="arrow_right fade-up" target="_blank">
          LEARN MORE
          <p></p>
        </a>
      </div>
    </div>
    <div class="section fp-auto-height section_footer">
      <?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/footer.php"; ?>
    </div>
  </div>
</main>
</div>
</body>
<script>
  new fullpage("#fullpage", {
     licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',
    autoScrolling: true,
    scrollHorizontally: true,
    scrollOverflow: true,
    // 아래 옵션을 주면 fp-auto-height가 자동 처리돼요
    fitToSection: true, 
  onLeave: function(origin, destination, direction) {
    const prev = origin.item.querySelectorAll('.fade-up, .fade-up_2');
    prev.forEach(el => {
      el.classList.remove('active');
    });

    const next = destination.item.querySelectorAll('.fade-up, .fade-up_2');
    next.forEach(el => {
      el.classList.add('active');
    });
  },  // 첫 번째 섹션 로딩 시 fade 효과 주기
  afterRender: function () {
    const firstSection = document.querySelector('.section'); // 첫 섹션
    const fadeEls = firstSection.querySelectorAll('.fade-up, .fade-up_2');
    fadeEls.forEach(el => {
      el.classList.add('active');
    });
  }
  });      
</script>

</html>