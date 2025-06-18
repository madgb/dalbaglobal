<?PHP
function number_format_zero($number, $int = 0) {  //입력값 없을때 nan 나오는거 방지
    // NaN이나 INF인 경우 0으로 처리
    if (is_nan($number) || is_infinite($number)) {
        return number_format(0);
    }
    
    // 정상 숫자인 경우 포맷 적용
    return number_format($number, $int);
}

function round_zero($number, $int = 0) {  //입력값 없을때 nan 나오는거 방지
    // NaN이나 INF인 경우 0으로 처리
    if (is_nan($number) || is_infinite($number)) {
        return round(0);
    }
    
    // 정상 숫자인 경우 포맷 적용
    return round($number, $int);
}
########## 일반 파일 업로드 

function uploadFile($HTTP_POST_FILES, $el_name, $el, $_P_DIR_FILE,$filename_org="",$is_arr=""){
	//echo "el_name = ".$el_name."<br>";
	//echo "function file name = ".$_FILES[$el_name]['name']."<br>";
	//exit;
	
	if($is_arr == "Y"){ // 배열로 넘어온 파일 업로드 시작 
		if ($el['name']){
			$file_name = $el['name'];
			$full_filename = explode(".", "$file_name");
			$extension = $full_filename[sizeof($full_filename)-1];
			########## 등록한 파일이 업로드가 허용되지 않는 확장자를 갖는 파일인지를 검사한다. ##########
			if(!strcmp($extension,"html") || !strcmp($extension,"htm") || !strcmp($extension,"cgi") ||
				!strcmp($extension,"php") || !strcmp($extension,"php3") || !strcmp($extension,"pl") ||
				!strcmp($extension,"php4") || !strcmp($extension, "inc")|| !strcmp($extension, "php5")){
				exit;
			}

			$imsi_filename = str_replace($file_name,randomChar(5),$file_name).".".$extension; // 한글명일때를 대비하여 파일명을 교체한다.
			$file_name = time()."-".$imsi_filename;
			if(!is_dir($_P_DIR_FILE)){
				mkdir($_P_DIR_FILE, 0777);
				chmod($_P_DIR_FILE, 0777);
			}

			$toName = $_P_DIR_FILE.$file_name;
			$fromName = $el['tmp_name'];
			if(!move_uploaded_file($fromName,$toName)) {
				
				exit;
			}
			
			########## 신규파일 업로드시 기존 파일은 삭제... ##########
			if($file_name && $filename_org){
				unlink($_P_DIR_FILE.$filename_org);
			}
			return $file_name;
		}
	} else { // 배열이 아닌 일반변수로 넘어온 파일 업로드 시작 
		if ($_FILES[$el_name]['name']){
			$file_name = $_FILES[$el_name][name];
			$full_filename = explode(".", "$file_name");
			$extension = $full_filename[sizeof($full_filename)-1];
			########## 등록한 파일이 업로드가 허용되지 않는 확장자를 갖는 파일인지를 검사한다. ##########
			if(!strcmp($extension,"html") || !strcmp($extension,"htm") || !strcmp($extension,"cgi") ||
				!strcmp($extension,"php") || !strcmp($extension,"php3") || !strcmp($extension,"pl") ||
				!strcmp($extension,"php4") || !strcmp($extension, "inc")|| !strcmp($extension, "php5")){
				exit;
			}

			$imsi_filename = str_replace($file_name,randomChar(5),$file_name).".".$extension; // 한글명일때를 대비하여 파일명을 교체한다.
			$file_name = time()."-".$imsi_filename;

			if(!is_dir($_P_DIR_FILE)){
				mkdir($_P_DIR_FILE, 0777); 
				chmod($_P_DIR_FILE, 0777);
			}

			$toName = $_P_DIR_FILE.$file_name;
			$fromName = $_FILES[$el_name]['tmp_name'];
			if(!move_uploaded_file($fromName,$toName)) {
				//error_frame($_FILES[$el_name][name]." => ".$toName." UPLOAD_COPY_FAILURE");
				//echo $_FILES[$el_name][name]." => ".$toName." UPLOAD_COPY_FAILURE <br>";
				exit;
			}
			
			########## 신규파일 업로드시 기존 파일은 삭제... ##########
			if($file_name && $filename_org){
				unlink($_P_DIR_FILE.$filename_org);
			}
			return $file_name;
		}
	} // 배열이 아닌 일반변수로 넘어온 파일 업로드 종료

	return "";
	
}

function randomChar($rsltea){
	srand((double)microtime() * 1000000);
	$patternA = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";  //26
		for($i=1;$i<=$rsltea;$i++){
			$pick2 = rand(0,25);
			$rsltea = $rsltea.substr($patternA,$pick2,1);
			//echo $rsltea."<br>";
		}
	$rsltea = substr($rsltea,1,$rsltea);
	return $rsltea;
}

#### SQL 필터링 간략화
//  function sqlfilter($str) {
// 	// $str = urldecode($str);
//  	if (!get_magic_quotes_gpc()) $str = addslashes($str);
// 	$str=str_replace("javascript:;","\#", $str);
//  	$str=str_replace(";","\;", $str);

//  	return $str;
//  }

function sqlfilter($str) {
	$str = trim($str);
	$str = stripslashes($str); // 백슬래시 제거
	$str = htmlspecialchars($str, ENT_QUOTES, 'UTF-8'); // xss 방지
	return $str;
}

######## 에러메시지 출력 없이 페이지 replace
function no_error_replace($url) {
	echo "
	<script type='text/javascript'>
		location.replace('".$url."');
	</script>
	";
	exit;
}
######## 에러메시지 출력후 back
function error_back($msg) {
	echo ("
	<script type='text/javascript'>
	<!--
		alert ('$msg');
		history.back();
	//-->
	</script>
	");
	exit;
}

######## 에러메시지 출력 후 페이지 replace
function error_replace($msg,$url) {
	echo "
	<script type='text/javascript'>
		alert ('$msg');
		location.replace('".$url."');
	</script>
	";
	exit;
}