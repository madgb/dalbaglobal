<?PHP
if(REALPATH($_SERVER['SCRIPT_FILENAME']) == REALPATH(__FILE__)){
	echo "<SCRIPT>alert('NO DIRECT SCRIPT ACCESS ALLOWED'); history.back();</SCRIPT>";
	exit;
}

// $config  = parse_ini_file(__DIR__.'/dbConfig.ini');
// DB_HOST = '58.229.163.40'
// DB_USER = 'root'
// DB_PASS = 'dalba0309!@#'
// DB_NAME = 'dalba_sys'
define('DB_HOST', 'localhost');
define('DB_USER', 'dalbauser');
define('DB_PASS', 'dalba@0309##');
define('DB_NAME', 'dalba_sys');
?>
