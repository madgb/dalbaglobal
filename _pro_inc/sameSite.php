<?PHP
if (!function_exists('session_start_samesite')) {

  // 쿠키 설정을 수정하는 함수
  function session_start_modify_cookie()
  {
    $headers = headers_list();
    krsort($headers);
    foreach ($headers as $header) {
      if (!preg_match('~^Set-Cookie: PHPSESSID=~', $header))
        continue;

      // 현재 HTTPS 사용 여부 체크
      $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;

      $header = preg_replace('~; secure(; HttpOnly)?$~', '', $header) . '; SameSite=Lax';

      // if ($isHttps) {
      //   $header = preg_replace('~; secure(; HttpOnly)?$~', '', $header) . '; secure; SameSite=None';
      // } else {
      //   $header = preg_replace('~; secure(; HttpOnly)?$~', '', $header) . '; SameSite=Lax';
      // }

      header($header, false);
      break;
    }
  }

  // session_start() 함수를 호출하고 쿠키 설정을 수정하는 함수
  function session_start_samesite($options = [])
  {
    if (headers_sent())
      return false;

    // PHP 세션 시작
    session_start($options);

    // 현재 세션 ID 확인
    $sessionId = session_id();

    // HTTPS 여부
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;

    // SameSite 설정
    $cookie = "PHPSESSID={$sessionId}; Path=/; ";
    if ($isHttps) {
      $cookie .= "Secure; SameSite=None; HttpOnly";
    } else {
      $cookie .= "SameSite=Lax; HttpOnly";
    }

    // Set-Cookie 강제 발행
    header("Set-Cookie: $cookie", false);

    return true;
  }

  // session_regenerate_id() 함수를 호출하고 쿠키 설정을 수정하는 함수
  function session_regenerate_id_samesite($delete_old_session = false)
  {
    $res = session_regenerate_id($delete_old_session);
    session_start_modify_cookie();
    return $res;
  }
}

?>