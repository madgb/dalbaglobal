<?PHP
if(REALPATH($_SERVER['SCRIPT_FILENAME']) == REALPATH(__FILE__)){
	echo "<SCRIPT>alert('NO DIRECT SCRIPT ACCESS ALLOWED'); history.back();</SCRIPT>";
	exit;
}

define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "");
define("BASE_URL", "/");

if (defined('NOW_YEAR')) {
    echo '<pre>';
    debug_print_backtrace();
    echo '</pre>';
    exit;
}

define('DALBA',	true);


if(!isset($_SERVER["SERVER_NAME"])){
	$serverName = "keyofpaper.gabia.io";
}else{
	$serverName = $_SERVER["SERVER_NAME"];
}

//SITE 도메인 주소
if(!isset($_SERVER["HTTPS"])) { 
  $siteDomain = "http://".$serverName."/";
} else {
  $siteDomain = "https://".$serverName."/";
}
// $siteDomain = "https://".$serverName."/";


define('SITE_DOMAIN',		$siteDomain);
define('SITE_NM',			  "페이퍼키즈");
define('PATH',          str_replace('_pro_inc', '', str_replace('\\', '/', dirname(__FILE__)))); 

// SQL DEBUG true인 경우 sql문 노출
// define('DISPLAY_DEBUG', true);

// 모바일기기
define('MOBILE_AGENT', 'phone|samsung|lgtel|mobile|[^A]skt|nokia|blackberry|BB10|android|sony|iphone|ipod|ipad|ios|windows phone|symbian|htc|palmos|fennec|opera mini|tablet|webos|ucbrowser|kindle|silk|zte|huawei|miui');

define('CSS_URL', 		  SITE_DOMAIN."_css/");
define('IMG_URL', 		  SITE_DOMAIN."_img/");
define('JS_URL', 		   	SITE_DOMAIN."_js/");
define('MASTER_URL', 		SITE_DOMAIN."master/");
define('MASTER_JS_URL', SITE_DOMAIN."master/_js/");
define('ASSET_URL', 		SITE_DOMAIN."master/assets/");
define('UPLOAD_URL', 		SITE_DOMAIN."_upload_files/");
define('UPLOAD_FORM', 	SITE_DOMAIN."_upload_form/");

define('CSS_PATH', 		  PATH."_css/");
define('IMG_PATH', 		  PATH."_img/");
define('JS_PATH', 	   	PATH."_js/");
define('MASTER_PATH', 	PATH."master/");
define('ASSET_PATH', 		PATH."master/assets/");
define('UPLOAD_PATH', 	PATH."_upload_files/");
define('UPLOAD_SECURE', PATH."_upload_secure/");

define('NOW_YEAR',    	date('Y', time()));
define('NOW_MONTH',   	date('m', time()));
define('NOW_DAY',     	date('d', time()));
define('TIME_YMD',    	date('Y-m-d', time()));
define('TIME_YMD_NEXT', date('Y-m-d', strtotime('+1 day', time()))); 
define('TIME_YMD_PREV', date('Y-m-d', strtotime('-1 day', time()))); 
define('TIME_HIS',    	date('H:i:s', time()));
define('TIMEYMD',     	date('Ymd', time()));
define('TIME_YMDHIS', 	date('Y-m-d H:i:s', time()));
define('PAGE', 		   		"1");


$maxFileSize = 10 * 1024 * 1024; 		
define('MAXFILESIZE', 	$maxFileSize);

// SSL 방식 접속여부 확인
if(isset($_SERVER["HTTPS"])) {
	//header('Location: https://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']);
}