<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/include_default_html.php"; ?>
<?php 

// 요청 방식 확인
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    throw new Exception("잘못된 접근방식입니다");
}

?>