<?php
include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/include_default_html.php"; // 공통함수 인클루드
unset($_SESSION['m_idx']);
unset($_SESSION["m_type"]);
unset($_SESSION["user_id"]);
unset($_SESSION["user_name"]);
unset($_SESSION["csrfToken"]);

?>
<script>
    location.replace("./login.php");
</script>