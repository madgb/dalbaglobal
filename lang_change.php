<?php

include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/include_default_html.php"; // 공통함수 인클루드


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    $lang = $_POST['lang'];
    if($lang == 'EN') {
        $_SESSION['lang'] = 'EN';
    } else {
        $_SESSION['lang'] = 'KR';
    }

    echo json_encode(['success' => true]); 
    exit;

}

no_error_replace('/');
exit;