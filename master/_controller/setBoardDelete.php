<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/include_default_html.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/checkloginSa.php"; 


try {

  // 요청 방식 확인
	if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
		throw new Exception("잘못된 접근방식입니다");
	}

	$b_idx = $DB->htmlfilter($_POST['bIdx']);
	if ($b_idx == "") throw new Exception("선택된 항목이 없습니다.", 1);

	$bbs_category = $DB->htmlfilter($_POST['bbs_category']);
	if ($bbs_category == "") throw new Exception("잘못된 접근방법입니다..", 1);


	$whArr = ["b_idx"=>$b_idx];
	$re       = $DB->delete("tb_board_info", $whArr);
	$reAttach = $DB->delete("tb_board_attach", $whArr);

	$url = "/master/board/".$bbs_category."_list.php";

	$UTIL->alertTour("삭제되었습니다", $url);
	exit;

} catch (Exception $e) {

  $UTIL->historyBack($e->getMessage());
}

?>