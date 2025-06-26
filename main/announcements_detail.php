<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/header.php"; ?>
<?php
$page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;
$b_idx = $_REQUEST['b_idx'];
$query = " SELECT b_idx, subject, bbs_cd, content, w_dt, w_year, w_ymd, url FROM tb_board_info WHERE b_idx = '$b_idx' ";
$post = $DB->get_row($query);
$year = $post['w_year'];

$attach_query = " SELECT * FROM tb_board_attach WHERE b_idx = '$b_idx' ";
$attach_result = $DB->get_results($attach_query);
$attach_row = [];
foreach ($attach_result['result'] as $attachment) {
    $attach_row[] = [
        'file_name' => $attachment['ba_file_org'],
        'file_path' => "/_upload_files/{$attachment['ba_file_chg']}",
    ];
}
?>
<main class="main">
    <div class="section_2 ir_section">
        <div class="ir_inner detail_page">
            <h1 class="title"><?= $post['subject'] ?></h1>
            <p class="day"><?= date('Y.m.d', strtotime(datetime: $post['w_ymd'])) ?></p>
            <div class="content">
                <?= $post['content'] ?>
            </div>
            <?php if ($attach_result['cnt'] > 0 || $post['url']) { ?>
            <div class="bottom_file_box">
                <?php if ($attach_result['cnt'] > 0) { ?>
                    <div class="files">
                        <span>첨부파일</span>
                        <div class="file_box">
                            <?php foreach ($attach_row as $attachment) { ?>
                                <p><a href="<?= $attachment['file_path'] ?>" download="<?= $attachment['file_name'] ?>"><?= $attachment['file_name'] ?></a></p>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($post['url']) { ?>
                    <a href="<?= $post['url'] ?>" target="_blank" class="yellow_link">링크바로가기</a>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="go_btn"><a href="/main/announcements.php?page=<?=$page?>&year=<?=$year?>" class="go_list_btn">목록으로</a></div>
        </div>
    </div>
</main>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/footer.php"; ?>
</div>
</body>

</html>