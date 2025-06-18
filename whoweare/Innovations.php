<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/header.php"; ?>

<main class="main">
  <div id="fullpage" class="Innovations">
    <div class="section">
      <div class="section_video_text">
        <video class="pc_show" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="../_img/Innovations/First-Spray-Serum-PC.mp4" />
        </video>
        <video class="mo_show" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="../_img/Innovations/First-Spray-Serum-MO.mp4" />
        </video>
        <div class="text_boxB">
          <h1>First Spray Serum</h1>
          <div class="sub">
            <span><?echo $Spray_Serum_span ?></span>
            <p><?echo $Spray_Serum_p ?></p>
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
            <span><?echo $Tone_up_Sunscreen_span ?></span>
            <p>
              <?echo $Tone_up_Sunscreen_p ?>
            </p>
          </div>
          <!-- <a href="#" class="arrow_right">
            <p></p>
          </a> -->
        </div>
        <video class="pc_show" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="../_img/Innovations/Toneup-Sunscreen-PC.mp4" />
        </video>
        <video class="mo_show" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="../_img/Innovations/Toneup-Sunscreen-MO.mp4" />
        </video>
      </div>
    </div>
    <div class="section">
      <div class="section_video_text">
        <video class="pc_show" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="../_img/Innovations/Double-Cream-PC.mp4" />
        </video>
        <video class="mo_show" autoplay muted playsinline loop data-autoplay="true">
          <source type="video/mp4" src="../_img/Innovations/Double-Cream-MO.mp4" />
        </video>
        <div class="text_boxB">
          <h1>
            White Truffle<br />
            Double Serum & Cream
          </h1>
          <div class="sub">
            <span><?echo $Double_Serum_span ?></span>
            <p>
              <?echo $Double_Serum_p ?>
            </p>
          </div>
          <!-- <a href="#" class="arrow_right">
            <p></p>
          </a> -->
        </div>
      </div>
    </div>
    <div class="section fp-auto-height section_footer pc_show">
      <?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/footer.php"; ?>
    </div>
  </div>
</main>

 <div class="mo_show">     <?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/footer.php"; ?></div>
</div>
</body>
<script>
  new fullpage("#fullpage", {
    autoScrolling: true,
    scrollHorizontally: true,
    scrollOverflow: true,
    autoScrolling: true,
    fitToSection: true,
    responsiveWidth: 769,
  });
</script>

</html>