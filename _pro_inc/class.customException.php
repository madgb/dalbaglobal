<?PHP
if(REALPATH($_SERVER['SCRIPT_FILENAME']) == REALPATH(__FILE__)){
  ECHO "<SCRIPT>alert('NO DIRECT SCRIPT ACCESS ALLOWED'); history.back();</SCRIPT>";
  exit;
}

class CustomException extends Exception {
	private $data;

	public function __construct($message, $code = 0, Exception $previous = null, $data = null) {
		parent::__construct($message, $code, $previous);
		$this->data = $data;
	}

	public function getData() {
		return $this->data;
	}
}


?>