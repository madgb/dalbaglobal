<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/header.php"; ?>
<main class="main">
    <div id="fullpage">
        <div class="section section_video ">
            <div class="video_main career pc_show">
                <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
                    <source type="video/mp4" src="../_img/common/[stage2]environment_web.mp4" />
                </video>
            </div>
            <div class="video_main career mo_show">
                <video class="video" autoplay muted playsinline loop data-autoplay="true">
                    <source type="video/mp4" src="../_img/common/[stage2]environment_mob_2.mp4" />
                </video>
            </div>
            <div class="text B text_ani">
                <h2>Environment</h2>
                <h6>
                    <b><?echo $Environment_b?></b>
                  <p>
                  <?echo $Environment_p?>
                  </p>
                </h6>
            </div>
        </div>
        <div class="section section_video ">
            <div class="video_main career pc_show">
                <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
                    <source type="video/mp4" src="../_img/common/[stage2]Social_web.mp4" />
                </video>
            </div>
            <div class="video_main career mo_show">
                <video class="video" autoplay muted playsinline loop data-autoplay="true">
                    <source type="video/mp4" src="../_img/common/[stage2]Social_mob.mp4" />
                </video>
            </div>
            <div class="text B text_ani">
                <h2>Social</h2>
                <h6>
                    <b><?echo $Social_b?></b>
                   <p>
                        <?echo $Social_p?>
                   </p>
                </h6>
            </div>
        </div>
        <div class="section section_video ">
            <div class="video_main career pc_show">
                <video class="video object-left" autoplay muted playsinline loop data-autoplay="true">
                    <source type="video/mp4" src="../_img/common/[stage2]Governance_web.mp4" />
                </video>
            </div>
            <div class="video_main career mo_show">
                <video class="video" autoplay muted playsinline loop data-autoplay="true">
                    <source type="video/mp4" src="../_img/common/[stage2]Governance_mob.mp4" />
                </video>
            </div>
            <div class="text B text_ani">
                <h2>Governance</h2>
                <h6>
                    <b><?echo $Governance_b?></b>
                    <p><?echo $Governance_p?></p>
                </h6>
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
        autoScrolling: true,
        scrollHorizontally: true,
        scrollOverflow: true,
        autoScrolling: true,
        fitToSection: true,
        afterLoad: function (origin, destination, direction) {
        const sections = document.querySelectorAll('.section');
        sections.forEach((section, index) => {
            const textEl = section.querySelector('.text_ani');
            if (textEl) {
                if (index === destination.index) {
                    textEl.classList.add('active'); // 애니메이션 클래스 추가
                } else {
                    textEl.classList.remove('active'); // 다른 섹션에서는 제거
                }
            }
        });
    },
    });
</script>

</html>