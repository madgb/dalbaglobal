<?php
/* 직접 접근 방지 */
if (realpath($_SERVER['SCRIPT_FILENAME']) === realpath(__FILE__)) {
    exit('NO DIRECT SCRIPT ACCESS ALLOWED');
}

/* DB 상수 */
define('DB_HOST', 'localhost');
define('DB_USER', 'dalbauser');
define('DB_PASS', 'dalba@0309##');
define('DB_NAME', 'dalba_sys');

/* 실제 연결 */
$mysql   = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$gconnet = $mysql;                  // ★ 반드시 추가: include_default_html.php에서 쓰는 이름

if (!$mysql) {
    die('DB Connection Error: ' . mysqli_connect_error());
}
mysqli_set_charset($mysql, 'utf8mb4');
?>
