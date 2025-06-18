<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/header.php"; ?>
<?php

$page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;

$cd = $_REQUEST['cd'] ? $_REQUEST['cd'] : "All";
if ($cd == "All")
    $cd = "news%";
$newsData = fetchData($DB, $cd, $offset, $limit);
$totalCount = $newsData['total_count'];
$totalPages = ceil($totalCount / $limit);
?>
<main class="main">
    <div class="section_2 news_section">
        <div class="ir_inner">
            <div class="title_box">
                <h1>Newsroom</h1>
            </div>
            <div class="radio-btns news">
                <label for="news_all" class="radio--typeA"><input type="radio" name="news" id="news_all" value="All"
                        <?= $cd == "news%" ? "checked" : "" ?> /><em>All</em></label>
                <label for="Corp" class="radio--typeA"><input type="radio" name="news" id="Corp" value="news_corp"
                        <?= $cd == "news_corp" ? "checked" : "" ?> /><em>Corp</em></label>
                <label for="Brand" class="radio--typeA"><input type="radio" name="news" id="Brand" value="news_brand"
                        <?= $cd == "news_brand" ? "checked" : "" ?> /><em>Brand</em></label>
                <label for="Blog" class="radio--typeA"><input type="radio" name="news" id="Blog" value="news_blog"
                        <?= $cd == "news_blog" ? "checked" : "" ?> /><em>Blog</em></label>
                <label for="Career" class="radio--typeA"><input type="radio" name="news" id="Career" value="news_career"
                        <?= $cd == "news_career" ? "checked" : "" ?> /><em>Career</em></label>
                <label for="news_others" class="radio--typeA"><input type="radio" name="news" id="news_others"
                        value="news_others" <?= $cd == "news_others" ? "checked" : "" ?> /><em>Others</em></label>
            </div>
            <ul class="ir_ul news_ul">
                <?php foreach ($newsData['posts'] as $row) { ?>
                    <li>
                        <a target="_blank" href="<?=$row['url']?>">
                            <div class="title">
                                <h2><?= $row['subject'] ?></h2>
                                <span><?php echo date('Y.m.d', strtotime($row['w_dt'])) ?></span>
                            </div>
                            <div class="content">
                              <h6>  <?= $row['content'] ?></h6>
                                <span></span>
                            </div>
                        </a>
                    </li>
                <?php }
                if (empty($newsData['posts'])) { ?>
                    <li class="no-data">게시물이 없습니다.</li>
                <?php } ?>
            </ul>
            <ul class="pagination">
                <?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/pagination.php"; ?>
            </ul>
        </div>
    </div>
</main>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/footer.php"; ?>
</div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // 모든 radio 버튼에 이벤트 리스너 추가
        document.querySelectorAll(".news_section .radio-btns input").forEach((radio) => {
            radio.addEventListener("change", function () {
                // 선택된 radio 버튼의 ID 또는 value 가져오기
                const selectedValue = this.value || this.id;
                // 현재 URL에서 `cd` 파라미터를 변경하여 페이지 재로드
                const url = new URL(window.location.href);
                url.searchParams.set("cd", selectedValue); // `cd` 파라미터 설정
                url.searchParams.set("page", 1); // `page` 파라미터 설정
                window.location.href = url.toString(); // 페이지 재로드
            });
        });
    });
</script>

</html>