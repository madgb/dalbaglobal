<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/include_default_html.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/checkloginSa.php"; 

try {
    $json = [];
    // 요청 방식 확인
	if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
		throw new Exception("잘못된 접근방식입니다");
	}
  
    $fdArr = [];
    $mdate = $DB->htmlfilter($_POST['mdate']);
    $export = $DB->htmlfilter($_POST['export']);
    $growth = $DB->htmlfilter($_POST['growth']);
    $profit = $DB->htmlfilter($_POST['profit']);
    $cerum_sales = $DB->htmlfilter($_POST['cerum_sales']);

    $fdArr = [
        'mdate' => $mdate
    , 'export' => $export
    , 'growth' => $growth
    , 'profit' => $profit
    , 'cerum_sales' => $cerum_sales
    ];

    $b_idx = "1";

    $whArr['b_idx'] = $b_idx;
    $reUp = $DB->update("tb_achievement_info", $fdArr, $whArr, 1);

    if($reUp === false) throw new Exception("SYSTEM_ERROR : UPDATE", 1);
    $o_files = $_POST['o_files'];

    $url = "/master/board/achi_list.php";
    $UTIL->alertTour("수정되었습니다.", $url);
    exit;
  
  } catch (Exception $e) {
  
    $UTIL->historyBack($e->getMessage());
  }
  
  ?>