<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/include_default_html.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/checkloginSa.php"; 

try {

	$json = [];
	
  // 요청 방식 확인
	if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
		throw new Exception("잘못된 접근방식입니다");
	}

	// 수신된 CSRF 토큰
	$received_csrf_token = isset($_SERVER['HTTP_X_CSRF_TOKEN']) ? $_SERVER['HTTP_X_CSRF_TOKEN'] : '';

	// 검증
	if (!$UTIL->hash_equals($_SESSION['csrfToken'], $received_csrf_token)) {
		throw new Exception("Invalid CSRF token", 1);
	}


	function handlePagination($total, $page = 1, $size = 10, $scale = 10, $arr = [], $urlarr = []) {
    $page = max(1, (int)$page);
    $size = max(1, (int)$size);
    $scale = max(1, (int)$scale);

    if ($total == 0) {
        return [
            'total' => 0, 'page' => 1, 'size' => $size, 'scale' => $scale,
            'arr' => $arr, 'urlarr' => $urlarr, 'start_page' => 1, 'page_max' => 1,
            'offset' => 0, 'block' => 0, 'tails' => '', 'no' => 0,
            'total_pages' => 1, 'total_blocks' => 1,
            'current_block' => 1, 'block_start' => 1, 'block_end' => 1
        ];
    }

    $total_pages   = ceil($total / $size);
    $page          = min($page, $total_pages);
    $offset        = ($page - 1) * $size;
    $block         = floor(($page - 1) / $scale);
    $current_block = $block + 1;

    $block_start   = ($current_block - 1) * $scale + 1;
    $block_end     = min($block_start + $scale - 1, $total_pages); // 중요!
    $no            = $total - $offset;
    $tails         = '';
    
    return [
        'total'         => $total,
        'page'          => $page,
        'size'          => $size,
        'scale'         => $scale,
        'arr'           => $arr,
        'urlarr'        => $urlarr,
        'start_page'    => $block_start,
        'page_max'      => $total_pages,
        'offset'        => $offset,
        'block'         => $block,
        'tails'         => $tails,
        'no'            => $no,
        'total_pages'   => $total_pages,
        'total_blocks'  => ceil($total_pages / $scale),
        'current_block' => $current_block,
        'block_start'   => $block_start,
        'block_end'     => $block_end
    ];
	}


	


	$searchArr = [];

	if(!empty($_POST['srhKey'])){
		$searchArr['srhKey']   = $DB->htmlfilter($_POST['srhKey']);
	}
	if(!empty($_POST['srhField'])){
		$searchArr['srhField'] = $DB->htmlfilter($_POST['srhField']);
	}
	
	if(!empty($_POST['s_date'])){
		$searchArr['s_date']   = $DB->htmlfilter($_POST['s_date']);
	}

	if(!empty($_POST['e_date'])){
		$searchArr['e_date']   = $DB->htmlfilter($_POST['e_date']);
	}

	
	$page = $_POST['page'] ? $_POST['page'] : 1;


	$listNum = isset($_POST['listcnt']) && $_POST['listcnt'] > 0 ? (int)$_POST['listcnt'] : 10;


	$bbs_category = $DB->htmlfilter($_POST['bbs_category']);
	if(!$bbs_category) throw new Exception("SYSTEM_ERROR : BBSCATEGORY", 1);
		
	$bbs_cd = $DB->htmlfilter($_POST['bbs_cd']);
	// if(!$bbs_cd) throw new Exception("SYSTEM_ERROR : BBSCD", 1);



	$where = "";

	// SEARCH
	if($bbs_cd != ""){

		$where = " AND bbs_cd = '".$bbs_cd."'";
	}else{

		switch($bbs_category){		
			case "ir":

				if($searchArr['srhField']){
					$where = " AND bbs_cd = '".$searchArr['srhField']."' ";

				}	else {
					$where = " AND bbs_cd IN ('ir_results', 'ir_presentations', 'ir_others') ";
				}


			break;

			case "ann":

				$where = " AND bbs_cd = 'announcements' ";

				if($searchArr['srhField']){
					$where.= " AND w_year = '".$searchArr['srhField']."' ";
				}

			break;

			case "news":

				if($searchArr['srhField']){
					$where = " AND bbs_cd = '".$searchArr['srhField']."' ";

				}	else {				
					$where = " AND bbs_cd IN ('news_corp', 'news_brand', 'news_blog', 'news_career', 'news_others') ";
				}
				
			break;

			case "history":

				$where = " AND bbs_cd = 'history' ";

				if($searchArr['srhField']){
					$where.= " AND w_year = '".$searchArr['srhField']."' ";
				}
				
			break;

			case "achi":

				$where = " AND bbs_cd = 'achievements' ";

			break;
		}
	}

	if($searchArr['srhKey'] != ""){
		$where.= " AND t1.subject Like '%".$searchArr['srhKey']."%'";
	}

	if($searchArr['s_date']){
		$where.= " AND date(t1.w_dt) >= '".$searchArr['s_date']."'";
	}

	if($searchArr['e_date']){
		$where.= " AND date(t1.w_dt) <= '".$searchArr['e_date']."'";
	}
	
	$order = " t1.w_dt DESC";
	

	$quCnt = "				
	SELECT 	  t1.* 
	FROM 	  	tb_board_info 		AS t1
	WHERE 		1=1 ";
	$quCnt.= $where;
	$reCnt = $DB->num_rows($quCnt);

	$arrvar  = [];
	$pageInfo = handlePagination($reCnt, $page, $listNum, 10, $arrvar, $_GET);

	$quList = "	
	SELECT 	  t1.*
	FROM 	  	tb_board_info as t1
	WHERE 		1=1 ";
	$quList.= $where;
	$quList.= "
	ORDER BY	t1.is_top ASC, ".$order;
	$quList.= " LIMIT ".$pageInfo['offset'].", ".$pageInfo['size'];

	$reList = $DB->get_results($quList);

	if($reList['cnt'] > 0){

		$json['st']  = true;
		$json['cnt'] = $reCnt;

		$no = $pageInfo["no"];

		foreach ($reList['result'] as $rwList) {

			switch($bbs_category){

				case "ir":
				case "ann":
				case "news":
				case "history":
				case "achi":

					$arrList[] = [
					  "no"      => $no
					, "bbsCd"   => $rwList['bbs_cd']
					, "v_bbsCd"   => preg_replace('/^(ir_|news_)/', '', $rwList['bbs_cd'])
					, "bIdx"    => $rwList['b_idx']
					, "subject" => $rwList['subject']
					, "content" => $rwList['content']
					, "isTop"   => $rwList['is_top']
					, "wYear"   => $rwList['w_year']
					, "wYmd"  	=> $rwList['w_ymd']
					, "wDt"     => $rwList['w_dt']
					, "wDate"   => $rwList['w_dt'] ? date("Y-m-d", strtotime($rwList['w_dt'])) : ""
					, "mDt"     => $rwList['m_dt'] ? $rwList['m_dt'] : ""
					];

				break;
			}

			$no--;
		}
	}
		

	$json['st']      = true;
	$json['cnt']     = $reCnt;
	$json['list']    = $arrList;
	$json['page']    = $pageInfo;
	$json['listNum'] = $listNum;
	$json['qu'] = $quList;


} catch (Exception $e) {


	$json['st']  = false;
	$json['msg'] = $e->getMessage();
}

echo json_encode($json);
exit;
?>