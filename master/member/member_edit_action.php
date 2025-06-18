<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/include_default_html.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/passwordHash.php";?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/user_function.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/checkloginSa.php"; ?>
<?php header('Content-Type: application/json'); ?>
<?php
$m_idx = $_SESSION['m_idx'];

$currentPassword = trim($_POST['current_password']);
$newPassword = trim($_POST['new_password']);
$confirmPassword = trim($_POST['confirm_password']);

// 비밀번호 확인
if ($newPassword !== $confirmPassword) {
  echo json_encode(["status" => "error", "message" => "새 비밀번호와 확인 비밀번호가 일치하지 않습니다."],  JSON_UNESCAPED_UNICODE);
  exit;
}

// 데이터베이스에서 현재 비밀번호 조회
$query = "SELECT user_pwd FROM tb_member WHERE m_idx = $m_idx";
$result = $DB->get_row($query);

if (!$result) {
  echo json_encode(["status" => "error", "message" => "사용자 정보를 찾을 수 없습니다."]);
  exit;
}

$dbPassword = $result['user_pwd'];

// 현재 비밀번호가 맞는지 확인
if (!validate_password($currentPassword, $dbPassword)) {
  echo json_encode(["status" => "error", "message" => "현재 비밀번호가 일치하지 않습니다."], JSON_UNESCAPED_UNICODE);
  exit;
}

// 새로운 비밀번호 암호화 및 업데이트
$hashedPassword = create_hash($newPassword);

$data = ['user_pwd' => $hashedPassword];
$where = ['m_idx' => $m_idx];

$result = $DB->update("tb_member", $data, $where);

if ($result) {
  echo json_encode(["status" => "success", "message" => "비밀번호가 성공적으로 변경되었습니다."]);
} else {
  echo json_encode(["status" => "error", "message" => "비밀번호 변경에 실패했습니다."]);
}
exit;

// if (validate_password($currentPassword, $dbPassword)) {
//     // 새로운 비밀번호 암호화
//     // $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
//     $hashedPassword = create_hash($newPassword);
   
//     $data = [
//         'user_pwd' => $hashedPassword
//       ];
//       $where = [
//         'm_idx' => $m_idx
//       ];
//       $result = $DB->update("tb_member",$data,$where);
//     // 비밀번호 변경 완료
//     echo "<script>
//             alert('비밀번호가 성공적으로 변경되었습니다.');
//             location.replace('/master/ir_list.php'); // 메인 페이지로 리다이렉트
//           </script>";
// } else {
//     echo "<script>
//             alert('현재 비밀번호가 일치하지 않습니다.');
//             location.replace('/master/ir_list.php'); // 메인 페이지로 리다이렉트
//           </script>";
// }

?>



