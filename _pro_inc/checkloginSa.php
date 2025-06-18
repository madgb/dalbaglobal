<?PHP
if (!defined('DALBA')) exit('No direct script access allowed');

if (!isset($_SESSION['m_idx'])) {
	$UTIL->alertTour("정상적인 접근방법이 아닙니다!", "/master/login.php");
}