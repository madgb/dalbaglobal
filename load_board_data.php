<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/include_default_html.php"; ?>

<?php 
$bbs_cd = isset($_GET['bbs_cd']) ? $_GET['bbs_cd'] : '';
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 5;
$w_year = isset($_GET['w_year']) ? intval($_GET['w_year']) : '';  

$count_query = "SELECT COUNT(*) AS total FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd'";
if (!empty($w_year)) {
    $count_query .= " AND w_year = '$w_year'";
}
$total_result = $DB->get_row($count_query);
$total_count = $total_result ? intval($total_result['total']) : 0;

$query = "SELECT * FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd'";
if (!empty($w_year)) {
    $query .= " AND w_year = '$w_year'";
}
$query .= " ORDER BY w_dt DESC LIMIT $offset, $limit";
$result = $DB->get_results($query);
$posts = [];
foreach ($result['result'] as $row) {
    $post = [

        'subject' => htmlspecialchars($row['subject']),
        // 'content' => htmlspecialchars($row['content']),
        'content' => nl2br($row['content']),
        'w_dt' => date('Y.m.d', strtotime($row['w_dt'])),
        'w_year' => htmlspecialchars($row['w_year']),
        'url' => htmlspecialchars($row['url']),
        'attachments' => [],
        'bbsCd' => $row['bbs_cd']
    ];

    $attachmentQuery = "SELECT * FROM tb_board_attach WHERE b_idx = " . $row['b_idx'];
    $attachmentResult = $DB->get_results($attachmentQuery);
    if ($attachmentResult && isset($attachmentResult['cnt']) && $attachmentResult['cnt'] > 0) {
        foreach ($attachmentResult['result'] as $attachment) {
            $post['attachments'][] = [
                'file_name' => htmlspecialchars($attachment['ba_file_org']),
                'file_path' => "/_upload_files/" . htmlspecialchars($attachment['ba_file_chg'])
            ];
        }
    }

    $posts[] = $post;
}

header('Content-Type: application/json');
echo json_encode([
    'posts' => $posts,
    'total_count' => $total_count
]);
?>
