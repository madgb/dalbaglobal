<?php
include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/include_default_html.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/passwordHash.php";
include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/user_function.php";

// 예외 처리 추가
try {


    if($_SERVER['REQUEST_METHOD'] != "POST")  throw new Exception("잘못된 접근방법입니다.", 1);

    $id       = trim(sqlfilter($_POST['userId']));
    $password = trim(sqlfilter($_POST['userPw']));
    
    $qu = "SELECT * FROM tb_member WHERE user_id = '$id'";
    $rw = $DB->get_row($qu);
    
    if(validate_password($password, $rw["user_pwd"])) {

        $_SESSION["m_idx"]     = $rw["m_idx"];
        $_SESSION["m_type"]    = $rw["m_type"];
        $_SESSION["user_id"]   = $rw["user_id"];
        $_SESSION["user_name"] = $rw["user_name"];
        $_SESSION['csrfToken'] = bin2hex(md5(uniqid(mt_rand(), true)));

        header("Location:./board/ir_list.php");
        exit;

    } throw new Exception("로그인 실패!! 아이디 또는 비밀번호를 확인하세요", 1);


}catch(Exception $e){
    echo "
    <script>
        alert('".$e->getMessage()."');
        history.back();
    </script>";
    exit;
}

?>