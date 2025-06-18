<?php
/**
 * @version 0.1
 */
// if(REALPATH($_SERVER['SCRIPT_FILENAME']) == REALPATH(__FILE__)){
//   ECHO "<SCRIPT>alert('NO DIRECT SCRIPT ACCESS ALLOWED'); history.back();</SCRIPT>";
//   exit;
// }

// include_once(realpath(__DIR__ ."/../_pro_inc/config.php"));
include_once $_SERVER['DOCUMENT_ROOT']."/_pro_inc/config.php";


class UTIL{

	function __construct(){

	}

	function alertParentTour($msg,$url,$parent="",$opt=""){
		$escapedmsg = json_encode($msg);		
		echo "<script>alert(".$escapedmsg.");".$parent." window.parent.location.href='".$url."';".$opt."</script>"; exit;
	}


	function ParentTour($url){
		echo "<script> parent.location.href='".$url."';</script>"; exit;
	}


	function alertTour($msg,$url){
		$escapedmsg = json_encode($msg);		
		echo "<script>alert(".$escapedmsg."); location.href='".$url."';</script>"; exit;
	}


	function alert($msg){
		$escapedmsg = json_encode($msg);		
		echo "<script>alert(".$escapedmsg.");</script>";
	}


	function metaTour($url){
		echo "<meta http-equiv='Refresh' content='0; URL=".$url."'>"; exit;
	}


	function jsonHistoryBack($msg){
		$escapedmsg = json_encode($msg);
		throw new Exception($msg, 1);
	}


	function historyBack($msg){
		$escapedmsg = json_encode($msg);
		echo "<script>
					window.onload = function() {
						alert(".$escapedmsg."); 
						history.back();
					};
					</script>"; 
		exit;
	}

	function mentWindowClose($msg){
		$escapedmsg = json_encode($msg);
		echo "<script>alert(".$escapedmsg."); window.close();</script>"; exit;
	}


	function metaClose($url){
	    echo "<script>window.opener.location.href = '".$url."'; window.close();</script>";
		exit;
	}


	function mentMetaClose($msg,$url){
		$escapedmsg = json_encode($msg);
	    echo "<script>alert(".$escapedmsg."); window.opener.location.href = '".$url."'; window.close();</script>";
		exit;
	}


	function alertAndRedirectParent($msg, $url) {
		echo "<script>";
		if (!empty($msg)) {
			$escapedMessage = json_encode($msg);
			echo "alert(" . $escapedMessage . ");";
		}
		echo "if (window.opener && !window.opener.closed) {
            window.opener.location.href = '" . $url . "'; 
          }
          window.close(); // 자식 창을 닫음
          </script>";
    exit;
	}

	function alertAndCloseChild($msg="") {
		$escapedmsg = json_encode($msg);
		echo "<script>";
		if (!empty($msg)) {
			echo "alert(" . $escapedmsg . ");";
		}
		echo "if (window.opener && !window.opener.closed) {
						window.opener.location.reload(); // 부모 창을 리로딩
					}
					window.close(); // 자식 창을 닫음
					</script>";
		exit;
	}


	function alertPostMsg($msg, $url){

		$escapedmsg = json_encode($msg);
		echo "<script>";
		if (!empty($msg)) {
			echo "alert(" . $escapedmsg . ");";
		}

		echo "window.opener.postMessage('paymentCancelled', '".SITE_DOMAIN."');
					window.close();
					</script>";
	}


	function winClose() {
    echo "<script> window.close();</script>";
    exit;
	}


	function hash_equals($known_string, $user_string) {
		if (!is_string($known_string) || !is_string($user_string)) {
				return false;
		}

		if (strlen($known_string) !== strlen($user_string)) {
				return false;
		}

		$res = $known_string ^ $user_string;
		$ret = 0;
		for ($i = strlen($res) - 1; $i >= 0; $i--) {
				$ret |= ord($res[$i]);
		}
		return $ret === 0;
	}

}
?>