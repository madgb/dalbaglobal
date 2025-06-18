<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/include_default_html.php"; ?>

<?php 
$bbs_cd = isset($_GET['bbs_cd']) ? $_GET['bbs_cd'] : '';
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$w_year = isset($_GET['w_year']) ? intval($_GET['w_year']) : '';  
$ans = strpos($bbs_cd, 'news') ? true : false;

// 전체 개수 조회
$count_query = "SELECT COUNT(*) AS total FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd'";
if (!empty($w_year)) {
    $count_query .= " AND YEAR(w_dt) = '$w_year'";
}
$total_result = $DB->get_row($count_query);
$total_count = $total_result ? intval($total_result['total']) : 0;

// 게시물 조회
$query = "SELECT * FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd'";
if (!empty($w_year)) {
    $query .= " AND YEAR(w_dt) = '$w_year'";
}
$query .= " ORDER BY w_dt DESC LIMIT $offset, 5";
$result = $DB->get_results($query);

if($result && $result['cnt']>0 && strpos($bbs_cd, 'news')!==false) {
      foreach ($result['result'] as $row) {
        echo '<li>';
        echo '<a href="'. htmlspecialchars($row['url']) .'">';
        echo '<div class="title"><h2>' . htmlspecialchars($row['subject']) . '</h2><span>' . date('Y.m.d', strtotime($row['w_dt'])) . '</span></div>';
        echo '<div class="content"><p>' . htmlspecialchars($row['content']) . '</p><span></span></div>';
        echo '</a></li>';
      }
}
else{
    foreach ($result['result'] as $row) {
        $attachments = [];
        $attachmentQuery = "SELECT * FROM tb_board_attach WHERE b_idx = " . $row['b_idx'];
        $attachmentResult = $DB->get_results($attachmentQuery);

        if ($attachmentResult) {
            foreach ($attachmentResult['result'] as $attachment) {
                $attachments[] = [
                    'file_name' => htmlspecialchars($attachment['ba_file_org']),
                    'file_path' => "/_upload_files/" . htmlspecialchars($attachment['ba_file_chg'])
                ];
            }
        }

        echo '<li>';
        echo '<div class="title"><h2>' . htmlspecialchars($row['subject']) . '</h2><span>' . date('Y.m.d', strtotime($row['w_dt'])) . '</span></div>';
        echo '<div class="content"><p>' . htmlspecialchars($row['content']) . '</p><button type="button" class="plus"></button></div>';
        echo '<div class="file"><div class="file_box"><span>첨부파일</span><div class="item">';
        
        if (!empty($attachments)) {
            foreach ($attachments as $attachment) {
                echo '<a href="' . $attachment['file_path'] . '" download="' . $attachment['file_name'] . '">';
                echo '<button type="button">' . $attachment['file_name'] . '</button></a>';
            }
        }
        echo '</div></div>';

        echo '<a href="' . (strpos($row['url'], 'http') === false ? 'http://' : '') . htmlspecialchars($row['url']) . '" class="link_go">링크 바로가기</a></div>';
        echo '</li>';
    }
}
?>