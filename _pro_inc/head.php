<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/include_default_html.php"; ?>

<?php
function fetchData($DB, $bbs_cd, $offset = 0, $limit = 5) {
  // 전체 개수 조회
  $count_query = "SELECT COUNT(*) AS total FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd'";
  $total_result = $DB->get_row($count_query);
  $total_count = $total_result ? intval($total_result['total']) : 0;

  // 게시물 조회
  $query = "SELECT * FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd' ORDER BY w_dt DESC LIMIT $offset, $limit";
  $list = $DB->get_results($query);
  $posts = [];

  foreach ($list['result'] as $row) {
      $posts[$row['b_idx']] = [
          'b_idx' => $row['b_idx'],
          'subject' => $row['subject'],
          'content' => $row['content'],
          'w_ymd' => $row['w_ymd'],
          'w_year' => $row['w_year'],
          'w_dt' => $row['w_dt'],
          'url' => $row['url'],
          'attachments' => []
      ];

      $attachQuery = "SELECT * FROM tb_board_attach WHERE b_idx = " . $row['b_idx'];
      $attachments = $DB->get_results($attachQuery);

      foreach ($attachments['result'] as $attachment) {
          $posts[$row['b_idx']]['attachments'][] = [
              'file_name' => $attachment['ba_file_org'],
              'file_path' => "/_upload_files/{$attachment['ba_file_chg']}",
          ];
      }
  }

  return [
      'posts' => $posts,
      'total_count' => $total_count
  ];
}

function getYear($DB) {
  $sql = "SELECT DISTINCT(w_year) FROM tb_board_info WHERE bbs_cd LIKE 'announcements' ORDER BY w_dt DESC";
  $result = $DB->get_results($sql);
  $years = [];
  foreach($result['result'] as $r) {
    $years[] = $r['w_year'];
  }
  rsort($years);
  return $years;
}

function fetchYearData($DB, $bbs_cd, $year, $offset = 0, $limit = 5) {
  // 전체 개수 조회
  $count_query = "SELECT COUNT(*) AS total FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd'AND w_year LIKE '$year'";
  $total_result = $DB->get_row($count_query);
  $total_count = $total_result ? intval($total_result['total']) : 0;

  // 게시물 조회
  $query = "SELECT * FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd' AND w_year LIKE '$year' ORDER BY w_dt DESC LIMIT $offset, $limit";
  $list = $DB->get_results($query);
  $posts = [];
  // print_r($query);

  foreach ($list['result'] as $row) {
  
      $posts[$row['b_idx']] = [
          'b_idx' => $row['b_idx'],
          'subject' => $row['subject'],
          'content' => $row['content'],
          'w_year' => $row['w_year'],
          'w_ymd' => $row['w_ymd'],
          'w_dt' => $row['w_dt'],
          'url' => $row['url'],
          'attachments' => []
      ];

      $attachQuery = "SELECT * FROM tb_board_attach WHERE b_idx = " . $row['b_idx'];
      $attachments = $DB->get_results($attachQuery);

      foreach ($attachments['result'] as $attachment) {
          $posts[$row['b_idx']]['attachments'][] = [
              'file_name' => $attachment['ba_file_org'],
              'file_path' => "/_upload_files/{$attachment['ba_file_chg']}",
          ];
      }
  }

  return [
      'posts' => $posts,
      'total_count' => $total_count
  ];
}

function getHistoryYearData($DB, $limit = 4, $offset = 0) {
  $sql = "SELECT DISTINCT(w_year) FROM tb_board_info WHERE bbs_cd LIKE 'history' ORDER BY w_year DESC LIMIT $offset, $limit";
  $result = $DB->get_results($sql);
  $years = [];
  foreach($result['result'] as $r) {
    $years[] = $r['w_year'];
  }
  rsort($years);
  return $years;
}
function getHistoryYearData_nolimit($DB) {
  $sql = "SELECT DISTINCT(w_year) FROM tb_board_info WHERE bbs_cd LIKE 'history' ORDER BY w_year DESC";
  $result = $DB->get_results($sql);
  $years = [];
  foreach($result['result'] as $r) {
    $years[] = $r['w_year'];
  }
  rsort($years);
  return $years;
}

function getHistoryMonthData($DB, $year) {
  $sql = " SELECT DISTINCT(subject) FROM tb_board_info WHERE bbs_cd LIKE 'history' AND w_year = '".$year."' ORDER BY w_dt DESC";
  $result = $DB->get_results($sql);
  $posts = [];
  foreach($result['result'] as $r) {
    $months[] = $r['subject'];
  }
  return $months;
}

function getHistoryMonthData_eng($DB, $year) {
  $sql = " SELECT DISTINCT(subject_eng) FROM tb_board_info WHERE bbs_cd LIKE 'history' AND w_year = '".$year."' ORDER BY w_dt DESC";
  $result = $DB->get_results($sql);
  $posts = [];
  foreach($result['result'] as $r) {
    $months[] = $r['subject_eng'];
  }
  return $months;
}

function getHistoryData($DB, $year, $subject) {
  $sql = " SELECT * FROM tb_board_info WHERE bbs_cd LIKE 'history' AND w_year = '".$year."' AND subject = '".$subject."' ORDER BY w_dt DESC";
  $result = $DB->get_results($sql);
  $posts = [];
  foreach($result['result'] as $r) {
    $posts[] = [
      'subject' => $r['subject'],
      'content' => $r['content'],
      'w_year' => $r['w_year'],
      'w_dt' => $r['w_dt'],
      'url' => $r['url'],
    ];
  }
  return $posts;
}

function getHistoryData_eng($DB, $year, $subject) {
  $sql = " SELECT * FROM tb_board_info WHERE bbs_cd LIKE 'history' AND w_year = '".$year."' AND subject_eng = '".$subject."' ORDER BY w_dt DESC";
  $result = $DB->get_results($sql);
  $posts = [];
  foreach($result['result'] as $r) {
    $posts[] = [
      'subject' => $r['subject_eng'],
      'content' => $r['content_eng'],
      'w_year' => $r['w_year'],
      'w_dt' => $r['w_dt'],
      'url' => $r['url'],
    ];
  }
  return $posts;
}

function fetchIRData($DB, $bbs_cd = "ir%", $offset = 0, $limit = 5, $cd = "") {
  // 전체 개수 조회
  if($cd == "") {
    $count_query = "SELECT COUNT(*) AS total FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd'";
  } else {
    $count_query = "SELECT COUNT(*) AS total FROM tb_board_info WHERE bbs_cd = 'ir_$cd'";
  }
  
  $total_result = $DB->get_row($count_query);
  $total_count = $total_result ? intval($total_result['total']) : 0;

  // 게시물 조회
  if($cd == "") {
    $query = "SELECT * FROM tb_board_info WHERE bbs_cd LIKE '$bbs_cd' ORDER BY w_dt DESC LIMIT $offset, $limit";
  } else {
    $query = "SELECT * FROM tb_board_info WHERE bbs_cd = 'ir_$cd' ORDER BY w_dt DESC LIMIT $offset, $limit";
  }
  $list = $DB->get_results($query);
  $posts = [];

  foreach ($list['result'] as $row) {
      $posts[$row['b_idx']] = [
          'b_idx' => $row['b_idx'],
          'subject' => $row['subject'],
          'content' => $row['content'],
          'w_year' => $row['w_year'],
          'w_dt' => $row['w_dt'],
          'url' => $row['url'],
          'attachments' => []
      ];

      $attachQuery = "SELECT * FROM tb_board_attach WHERE b_idx = " . $row['b_idx'];
      $attachments = $DB->get_results($attachQuery);

      foreach ($attachments['result'] as $attachment) {
          $posts[$row['b_idx']]['attachments'][] = [
              'file_name' => $attachment['ba_file_org'],
              'file_path' => "/_upload_files/{$attachment['ba_file_chg']}",
          ];
      }
  }

  return [
      'posts' => $posts,
      'total_count' => $total_count
  ];
}
?>