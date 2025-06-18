<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/header.php"; ?>

<main class="main">
  <div class="brands_back brand_01">
    <div class="item_box">
      <div class="item d’Alba">
        <div class="tit">
          <h1>d’Alba</h1>
          <a href="https://brand.naver.com/dalba" target="_blank" class="arrow_right"></a>
        </div>
        <div class="text">
          <h2>Premium Vegan Skincare Brand</h2>
          <h3>
            <?echo $Skincare_Brand?>
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
            <?echo $Beauty_Brand?>
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
           <?echo $Fine_Dining ?>
          </h3>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/footer.php"; ?>
</div>
</body>
<script>
  $(".brands_back .item.Veganery").hover(function () {
    $(".brands_back").addClass("brand_02");
    $(".brands_back").removeClass("brand_03");
  });
  $(".brands_back .item.Truffle").hover(function () {
    $(".brands_back").addClass("brand_03");
    $(".brands_back").removeClass("brand_02");
  });
  $(".brands_back .item.d’Alba").hover(function () {
    $(".brands_back").removeClass("brand_03 brand_02");
  });
</script>

</html>