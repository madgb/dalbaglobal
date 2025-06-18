<?PHP require_once $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/include_default_html.php";?>
<?PHP

try {
   $json = [];

   if(isset($_FILES['upload']) == false) throw new Exception("FILES 데이터를 가져올 수 없습니다!", 1);
   if ($_FILES['upload']['error'] !== UPLOAD_ERR_OK) {
      throw new Exception("File upload error: " . $_FILES['upload']['error'], 3);
  }
   if($_FILES['upload']['size'] == 0) throw new Exception("Error Uploaded", 2);

   // $maxSize = 20 * 1024 * 1024;
   if ($_FILES['upload']['size'] > MAXFILESIZE) throw new Exception("첨부파일은 20메가이상 업로드할수 없습니다.", 3);

   $file_extension = strtolower(pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION));

   if($file_extension != "jpg"
   && $file_extension != "png"
   && $file_extension != "jpeg"
   && $file_extension != "gif"
   && $file_extension != "pdf" ) throw new Exception("업로드 불가한 확장자 입니다.", 3);

   // 서버저장 파일명 변경
   $random        = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 3);
   $new_filename  = date("YmdHis")."_".$random.".".$file_extension;
   $target_file   = UPLOAD_PATH.$new_filename;


   // 파일 업로드
   if (!move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) throw new Exception("SYSTEM_ERROR :".$target_file."", 3);
   // if (!move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
  //   throw new Exception("SYSTEM_ERROR : " . $target_file . " - " . error_get_last()['message'], 3);
   // }

   $json["uploaded"] = true;
   $json["url"]      = UPLOAD_URL.$new_filename;

} catch (Exception $e) {

   $json["uploaded"] = false;
   $json["error"]    = array("message"=>$e->getMessage());

}
echo json_encode($json);
?>