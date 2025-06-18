<?PHP 
include_once $_SERVER['DOCUMENT_ROOT']."/_pro_inc/sameSite.php";
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

ini_set("session.cache_expire", 120);				// 세션 유효시간 : 분
ini_set("session.gc_maxlifetime", 3600000);	// 세션 가비지 컬렉션(로그인시 세션지속 시간) : 초
// session_cache_limiter("private");						// session_start() 전에 위치
session_cache_limiter("nocache");

session_start_samesite();
date_default_timezone_set('Asia/Seoul');
header("Pragma: no-cache");
header("Cache-Control: no-cache,must-revalidate");
header('Content-Type: text/html; charset=UTF-8');

// error_reporting(E_ALL);
error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR  | E_PARSE | E_USER_ERROR | E_USER_WARNING );
ini_set("display_errors", "1");


// error_reporting(E_ALL & ~E_NOTICE);
// ini_set('display_errors', 0);
// ini_set('log_errors', 1);

include_once $_SERVER['DOCUMENT_ROOT']."/_pro_inc/config.php";
include_once $_SERVER['DOCUMENT_ROOT']."/_pro_inc/dbConn.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/class.DB.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/class.UTIL.php";
try {

	// DB 연동
	$DB   = new DB("127.0.0.1","dalbauser","dalba@0309##","dalba_sys");
	// $gconnet = mysqli_connect("127.0.0.1","dalbauser","dalba@0309##","dalba_sys");
	// // 연결 확인
	// if (!$gconnet) {
	// 		die("MySQL 연결 실패: " . mysqli_connect_error());
	// } else {
	// 		echo "MySQL 연결 성공!";
	// }
	// // echo "KKKK";
	// print_r($gconnet);

	mysqli_query($gconnet,"set names UTF8");

	$UTIL = new UTIL();


	// 리퍼러 URL 가져오기
	$referrer      = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'DIRECTACCESS';
	$currentDomain = parse_url(SITE_DOMAIN, PHP_URL_HOST);

	if ($referrer !== 'DIRECTACCESS') {
		$referrerDomain = parse_url($referrer, PHP_URL_HOST);
		if ($referrerDomain !== $currentDomain) {
			$_SESSION['REFERRER'] = $referrer;
		}
	}

}catch(Exception $e){
	echo $e->getMessage();
	exit;
}


?>