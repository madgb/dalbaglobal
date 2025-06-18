<?PHP
if(!function_exists('session_start_samesite')) {
    
  // 쿠키 설정을 수정하는 함수
  function session_start_modify_cookie()
  {
    $headers = headers_list();
    krsort($headers);
    foreach ($headers as $header) {
      if (!preg_match('~^Set-Cookie: PHPSESSID=~', $header)) continue;
      $header = preg_replace('~; secure(; HttpOnly)?$~', '', $header) . '; secure; SameSite=None';
      header($header, false);
      break;
    }
  }

  // session_start() 함수를 호출하고 쿠키 설정을 수정하는 함수
  function session_start_samesite($options = [])
  {
    $res = session_start($options);
    session_start_modify_cookie();
    return $res;
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