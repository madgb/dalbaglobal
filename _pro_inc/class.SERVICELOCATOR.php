<?PHP
// if(REALPATH($_SERVER['SCRIPT_FILENAME']) == REALPATH(__FILE__)){
// 	echo "<SCRIPT>alert('NO DIRECT SCRIPT ACCESS ALLOWED'); history.back();</SCRIPT>";
// 	exit;
// }

class SERVICELOCATOR {

	private static $instances = [];

	private static $dependencies = [
		'LOGIN'     => ['DB'],
		'MEMBER'    => ['DB'],
		'BOARD'     => ['DB'],
		// 'REPORT'    => ['DB'],
	];

  public static function get($class, $db = null) {
		if (!isset(self::$instances[$class])) {
			self::$instances[$class] = self::createInstance($class, $db);
		}
    return self::$instances[$class];
  }

	// 리플렉션을 통해 클래스 인스턴스를 생성하고 필요한 의존성을 주입
	private static function createInstance($class, $db) {
		if (!isset(self::$dependencies[$class])) {
			throw new Exception("Service not found: " . $class);
		}

		// 클래스의 의존성 목록을 가져옴
		$dependencies = self::$dependencies[$class];
		$resolvedDependencies = [];

		// 의존성을 해결하여 인스턴스를 생성
		foreach ($dependencies as $dependency) {
			if ($dependency === 'DB') {
				$resolvedDependencies[] = $db;
			} else {
				$resolvedDependencies[] = self::get($dependency, $db);
			}
		}

		// 리플렉션을 사용해 클래스 인스턴스 생성
		$reflectionClass = new ReflectionClass($class);
		return $reflectionClass->newInstanceArgs($resolvedDependencies);
	}
}