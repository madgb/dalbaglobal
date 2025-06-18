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

	
	function isImageExtension($extension) {
		$imageExtensions   = ['jpg', 'jpeg', 'png', 'gif'];
		return in_array($extension, $imageExtensions);
	}

	function isFileExtension($extension) {
		$fileExtensions    = ['pdf', 'doc', 'docx', 'txt', 'xls', 'xlsx', 'ppt', 'pptx', 'zip', 'rar', 'hwp', 'hwpx', 'jpg', 'jpeg', 'png', 'gif'];
		return in_array($extension, $fileExtensions);
	}

	function isZipExtension($extension) {
		$zipExtensions 		 = ['zip'];
		return in_array($extension, $zipExtensions);
	}

	function uploadFiles($FILES, $fileAttachType = "FILE", $uploadPath, $maxFileSize = MAXFILESIZE, $thumbSize= 500) {

    $uploadedFiles = [];
    $uploadFileSub = []; // ZIP 파일 내부 파일 정보를 저장할 배열

    // HANDLING SINGLE FILE
    if (isset($FILES['name']) && !is_array($FILES['name'])) {
      processFile($FILES, $fileAttachType, $uploadPath, $maxFileSize, $uploadedFiles, $uploadFileSub, $thumbSize);
    }

    // HANDLING MULTIPLE FILES
    elseif (isset($FILES['name']) && is_array($FILES['name'])) {
			if (is_string($FILES['name'])) {
				$FILES = [
					'name'     => [$FILES['name']],
					'type'     => [$FILES['type']],
					'tmp_name' => [$FILES['tmp_name']],
					'error'    => [$FILES['error']],
					'size'     => [$FILES['size']],
				];
			}

			foreach ($FILES['name'] as $key => $name) {
				$fileData = [
					'name'     => $FILES['name'][$key],
					'type'     => $FILES['type'][$key],
					'tmp_name' => $FILES['tmp_name'][$key],
					'error'    => $FILES['error'][$key],
					'size'     => $FILES['size'][$key]
				];
				processFile($fileData, $fileAttachType, $uploadPath, $maxFileSize, $uploadedFiles, $uploadFileSub, $thumbSize);
			}
    }

		return $uploadedFiles;
	}

	// 업로드
	function processFile($file, $fileAttachType, $uploadPath, $maxFileSize, &$uploadedFiles, &$uploadFileSub = [], $thumbSize = 300) {

    try {

			// 파일 업로드 오류 처리
			switch ($file['error']) {
				case UPLOAD_ERR_OK:
				break;
				case UPLOAD_ERR_INI_SIZE:
					throw new Exception("THE UPLOADED FILE EXCEEDS THE UPLOAD_MAX_FILESIZE", 1);
				case UPLOAD_ERR_FORM_SIZE:
					throw new Exception("THE UPLOADED FILE EXCEEDS THE MAX_FILE_SIZE ", 1);
				case UPLOAD_ERR_PARTIAL:
					throw new Exception("THE UPLOADED FILE WAS ONLY PARTIALLY UPLOADED", 1);
				case UPLOAD_ERR_NO_FILE:
					throw new Exception("NO FILE WAS UPLOADED", 1);
				case UPLOAD_ERR_NO_TMP_DIR:
					throw new Exception("MISSING A TEMPORARY FOLDER", 1);
				case UPLOAD_ERR_CANT_WRITE:
					throw new Exception("FAILED TO WRITE FILE TO DISK", 1);
				case UPLOAD_ERR_EXTENSION:
					throw new Exception("A PHP EXTENSION STOPPED THE FILE UPLOAD", 1);
				default:
					throw new Exception("UNKNOWN UPLOAD ERROR", 1);
			}

			// 파일 사이즈 체크
			if ($file['size'] > $maxFileSize) {
				throw new Exception("첨부파일은 ". ($maxFileSize / 1048576) ."메가이상 업로드할수 없습니다.", 1);
			}

			// 파일 확장자 처리
			$file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

			if ($fileAttachType == 'IMAGE' && !isImageExtension($file_extension)) {
				throw new Exception("업로드 불가한 이미지 파일 확장자 입니다.", 1);
			} elseif ($fileAttachType == 'FILE' && !isFileExtension($file_extension)) {
				throw new Exception("업로드 불가한 파일 확장자 입니다.", 1);
			}


			// 파일 이름 생성
			$random       = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 2);
			$new_filename = date("YmdHis") . "_" . $random . "." . $file_extension;
			$target_file  = $uploadPath . $new_filename;

			// 파일을 로컬에 저장
			if (!move_uploaded_file($file['tmp_name'], $target_file)) {
				$error = error_get_last();
				throw new Exception("SYSTEM_ERROR : FILE UPLOAD failed with error: " . $error['message']);
			}

			// 업로드된 파일 정보 저장
			$uploadedFiles[] = [
				'orgFile'   => $file['name'],
				'chgFile'   => $new_filename,
				'fileSize'  => $file['size'],
				'extension' => $file_extension
			];


    } catch (Exception $e) {
      throw $e;
    }
	}


	$fdArr = [];

	$subject = $DB->htmlfilter($_POST['subject']);
	$subject_eng = $DB->htmlfilter($_POST['subject_eng']);
	//$content = $DB->htmlfilter($_POST['content']);
	$content = $DB->escape($_POST['content']);
	$content_eng = $DB->escape($_POST['content_eng']);
	$bbs_cd = $DB->htmlfilter($_POST['bbs_cd']);
	
	if(!$subject) throw new CustomException("제목을 입력하세요", 1, null, "subject");
	// if(!$content) throw new CustomException("내용을 입력하세요", 1, null, "content");
	
	$url = $DB->htmlfilter($_POST['url']);

	$w_dt = $DB->htmlfilter($_POST['w_dt']);
	if(!$w_dt) {
		$w_dt = date("Y-m-d");
	}
	if(!$w_dt) throw new CustomException("등록일을 입력하세요", 1, null, "w_dt");


	// 게시판 공통사항
	$fdArr = [
		"bbs_cd"   => $bbs_cd
	, "subject"  => $subject
	, "subject_eng"  => $subject_eng
	, "content"  => $content
	, "content_eng"  => $content_eng
	, "ip"       => $_SERVER['REMOTE_ADDR']
	, "is_view"  => "Y"
	, "url"      => $url
	, "w_dt"     => $w_dt
	];

	$fdArr["m_idx"] = $_SESSION['m_idx'];

	$url = "/master/board/ir_list.php";

	switch($bbs_cd){

		case "ir_results" :
			$fileAttachType = "FILE";
		break;

		case "ir_presentations" :
			$fileAttachType = "FILE";
		break;

		case "ir_others" :
			$fileAttachType = "FILE";					
		break;

		case "announcements" :
			$fileAttachType = "FILE";					

			$w_ymd = $DB->htmlfilter($_POST['w_ymd']);
			if(!$w_ymd) throw new Exception("내용을 입력하세요", 1, null, "w_ymd");
			$fdArr['w_year'] = substr($w_ymd, 0, 4);
			$fdArr['w_ymd'] = $w_ymd;

			$url = "/master/board/ann_list.php";
		break;
		
		case "history" :

			$w_year = $DB->htmlfilter($_POST['w_year']);
			if(!$w_year) throw new Exception("내용을 입력하세요", 1, null, "w_year");
			$fdArr['w_year'] = $w_year;

			$url = "/master/board/history_list.php";
		break;
		
		case "achievements" :

			$w_year = $DB->htmlfilter($_POST['w_year']);
			if(!$w_year) throw new Exception("연도를 입력하세요", 1, null, "w_year");
			$fdArr['w_year'] = $w_year;

			$url = "/master/board/achi_list.php";
		break;

		default : 
			$url = "/master/board/news_list.php";
		break;
	}

	// 수정
	if($_POST['b_idx'] !=""){


		$b_idx = $DB->htmlfilter($_POST['b_idx']);

		$fdArr['m_dt']  = date("Y-m-d H:i:s");
		$whArr['b_idx'] = $b_idx;
		$reUp = $DB->update("tb_board_info", $fdArr, $whArr, 1);

		if($reUp === false) throw new Exception("SYSTEM_ERROR : UPDATE", 1);
		$o_files = $_POST['o_files'];

	
		// 기존 첨부파일 DB삭제
		$quAddFile = "SELECT ba_idx, ba_file_chg FROM tb_board_attach WHERE b_idx = '".$b_idx."'";
		$reAddFile = $DB->get_results($quAddFile);
		foreach ($reAddFile['result'] as $rwAddFile) {

			if (!in_array($rwAddFile['ba_idx'], $o_files)) {

				$whFileArr          = [];
				$whFileArr['ba_idx'] = $rwAddFile['ba_idx'];
	
				$reFiledel = $DB->delete("tb_board_attach", $whFileArr, 1);
				if($reFiledel == false) throw new Exception("SYSTEM_ERROR : OLD FILE DELETE", 1);
			}
		}
	}


	// 입력
	else{


		$DB->query("BEGIN");
		$reIn = $DB->insert("tb_board_info", $fdArr);
		if($reIn === false) throw new Exception("SYSTEM_ERROR : INSERT", 1);

		$b_idx = $DB->lastid();
	}


	// 첨부파일 이미지 처리
	if (isset($_FILES['f_files'])) {

		$uploadedFiles = uploadFiles($_FILES['f_files'], $fileAttachType, UPLOAD_PATH);

		// 단일 파일 업로드 처리
		$file = $uploadedFiles[0];
		
		if (count($uploadedFiles) == 1) {
			$fdArrThImg['b_idx']  			= $b_idx;
			$fdArrThImg['ba_file_org']  = $file['orgFile'];
			$fdArrThImg['ba_file_chg']  = $file['chgFile'];
			$fdArrThImg['ba_file_size'] = $file['fileSize'];

			$reImg = $DB->insert("tb_board_attach", $fdArrThImg);
			if($reImg === false) throw new Exception("SYSTEM_ERROR : INSERT ATTACH", 1);

		} 
	
		// 다중 파일 업로드 처리
		else {

			foreach ($uploadedFiles as $file) {
				$fdArrThImg = [
					'b_idx'        => $b_idx,
					'ba_file_org'  => $file['orgFile'],
					'ba_file_chg'  => $file['chgFile'],
					'ba_file_size' => $file['fileSize'],
				];

				$reImg = $DB->insert("tb_board_attach", $fdArrThImg);
				if($reImg === false) throw new Exception("SYSTEM_ERROR : INSERT ATTACH", 1);
			}
		}
	}


	$DB->query("COMMIT");
	
	$msg = "저장되었습니다";

	$json['st']  = true;
	$json['msg'] = $msg;
	$json['url'] = $url;

} catch (Exception $e) {


	$json['st']  = false;
	$json['msg'] = $e->getMessage();
}

echo json_encode($json);
exit;
?>