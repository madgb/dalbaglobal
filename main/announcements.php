<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/header.php"; ?>
<?php

$page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;

$yearList = getYear($DB);
$year = $_REQUEST['year'] ? $_REQUEST['year'] : $yearList[0];
$announcementData = fetchYearData($DB, "announcements", $year, $offset, $limit);
$totalCount = $announcementData['total_count'];
$totalPages = ceil($totalCount / $limit);

?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#year_select').on('change', function () {
            const selectedYear = $(this).val(); // 선택된 값 가져오기
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('year', selectedYear);
            currentUrl.searchParams.set('page', 1); // Reset to the first page
            window.location.href = currentUrl.toString(); // 페이지 이동
        });
    });
</script>
<main class="main">
    <div class="section_2 anno_section">
        <div class="ir_inner">
            <div class="title_box">
                <h1>Announcements</h1>
            </div>
            <div class="select_box">
                <select name="year_select" id="year_select" class="nice-select select-primary">
                    <?php foreach($yearList as $y) {?>
                      <option value="<?php echo $y?>" <?=$y == $year ? "selected" : ""?>><?php echo $y?></option>
                    <?php }?>
                </select>
            </div>
            <ul class="ir_ul">
                <?php foreach ($announcementData['posts'] as $row) { ?>
                <li>
                    <a href="/main/announcements_detail.php?b_idx=<?php echo $row['b_idx'] ?>&page=<?php echo $page ?>&year=<?php echo $year ?>">
                        <div class="title">
                            <h2><?=$row['subject']?></h2>
                            <span><?php echo date('Y.m.d', strtotime($row['w_ymd'])) ?></span>
                        </div>
                        <div class="content">
                           <h6> <?php echo nl2br($row['content']) ?></h6>
                        </div>
                    </a>
                </li>
                <?php } if(empty($announcementData['posts'])) {?>
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

</html>