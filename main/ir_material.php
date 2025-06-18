<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/header.php"; ?>
<?php

$page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;

$cd = $_REQUEST['cd'];
if ($cd == "All")
    $cd = "";
$irData = fetchIRData($DB, "ir%", $offset, $limit, $cd);
$totalCount = $irData['total_count'];
$totalPages = ceil($totalCount / $limit);
?>

<main class="main">
    <div class="section_2 ir_section IR_Material" id="IR_Material">
        <div class="ir_inner">
            <div class="title_box">
                <h1>IR Material</h1>
            </div>
            <div class="radio-btns">
                <label for="All" class="radio--typeA"><input type="radio" name="ir" id="All" value="" <?= $cd == "" ? "checked" : "" ?> /><em>All</em></label>
                <label for="Results" class="radio--typeA"><input type="radio" name="ir" id="Results" value="results"
                        <?= $cd == "results" ? "checked" : "" ?> /><em>Results</em></label>
                <label for="Presentations" class="radio--typeA"><input type="radio" name="ir" id="Presentations"
                        value="presentations" <?= $cd == "presentations" ? "checked" : "" ?> /><em>Presentations</em></label>
                <label for="Others" class="radio--typeA"><input type="radio" name="ir" id="Others" value="others"
                        <?= $cd == "others" ? "checked" : "" ?> /><em>Others</em></label>
            </div>
            <ul class="ir_ul">
                <?php foreach ($irData['posts'] as $row) { ?>
                    <li>
                        <a href="/main/ir_material_detail.php?b_idx=<?php echo $row['b_idx'] ?>&page=<?php echo $page ?>&cd=<?php echo $cd ?>">
                            <div class="title">
                                <h2><?php echo htmlspecialchars($row['subject']) ?></h2>
                                <span><?php echo date('Y.m.d', strtotime($row['w_dt'])) ?></span>
                            </div>
                            <div class="content">
                                <h6><?php echo nl2br($row['content']) ?></h6>
                            </div>
                        </a>
                    </li>
                <?php }
                if (empty($irData['posts'])) { ?>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // 모든 radio 버튼에 이벤트 리스너 추가
        document.querySelectorAll(".IR_Material .radio-btns input").forEach((radio) => {
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
</body>

</html>