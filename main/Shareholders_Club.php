<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/header.php"; ?>

<main class="main">
  <div class="club_inner">
    <div class="video_main pc_show">
      <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
        <source type="video/mp4" src="../_img/Shareholders'_Club/[stage2]Club_web.mp4" />
      </video>
    </div>
    <div class="video_main mo_show">
      <video class="video" autoplay muted playsinline loop data-autoplay="true">
        <source type="video/mp4" src="../_img/Shareholders'_Club/[stage2]Club_mob.mp4" />
      </video>
    </div>
    <div class="text_box">
      <h1>Shareholders' Club</h1>
      <span><?echo $Shareholders_span?></span>
      <p>
       <?echo $Shareholders_p?>
      </p>
      <h4>
        <?echo $Shareholders_h4?>
      </h4>
      <!-- <a href="#" class="arrow_right">
        <p></p>
      </a> -->
    </div>
  </div>
</main>
<footer class="footer">
  <?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/footer.php"; ?>
</footer>
</div>
</body>

</html>