<?php
/**
 * 누베베CRM 업로드관리
 */
if(REALPATH($_SERVER['SCRIPT_FILENAME']) == REALPATH(__FILE__)){
	echo "<SCRIPT>alert('NO DIRECT SCRIPT ACCESS ALLOWED'); history.back();</SCRIPT>";
	exit;
}

// require(realpath(__DIR__ ."/../vendor/autoload.php"));
// use Aws\Exception\AwsException; 

include_once(realpath(__DIR__ ."/../_pro_inc/config.php"));
include_once(realpath(__DIR__ ."/../_pro_inc/class.customException.php"));
// include_once(realpath(__DIR__ ."/../_pro_inc/class.S3SERVICE.php"));


class UPLOAD {

	private $util;
	private $imageExtensions   = ['jpg', 'jpeg', 'png', 'gif'];
	private $fileExtensions    = ['pdf', 'doc', 'docx', 'txt', 'xls', 'xlsx', 'ppt', 'pptx', 'zip', 'rar', 'hwp', 'hwpx', 'jpg', 'jpeg', 'png', 'gif'];
	private $dondrawExtensions = ['kp', 'cs3', 'fbx', 'clip', 'obj', 'png', 'blend', 'exe', 'max', 'maya', 'jpg', 'sut', 'pdf', 'skp'];
	private $zipExtensions 		 = ['zip'];

	public function __construct(){
		$this->util      = new UTIL();
  }

	public function isImageExtension($extension) {
		return in_array($extension, $this->imageExtensions);
	}

	public function isFileExtension($extension) {
		return in_array($extension, $this->fileExtensions);
	}

	public function isDondrawExtension($extension) {
		return in_array($extension, $this->dondrawExtensions);
	}

	public function isZipExtension($extension) {
		return in_array($extension, $this->zipExtensions);
	}


	public function uploadFiles($FILES, $fileAttachType = "FILE", $uploadPath, $maxFileSize = MAXFILESIZE, $thumbSize= 500) {

    $uploadedFiles = [];
    $uploadFileSub = []; // ZIP 파일 내부 파일 정보를 저장할 배열

    // HANDLING SINGLE FILE
    if (isset($FILES['name']) && !is_array($FILES['name'])) {
      $this->processFile($FILES, $fileAttachType, $uploadPath, $maxFileSize, $uploadedFiles, $uploadFileSub, $thumbSize);
    }

    // HANDLING MULTIPLE FILES
    elseif (isset($FILES['name']) && is_array($FILES['name'])) {
			if (is_string($FILES['name'])) {
				$FILES = [
					'name'     => [$FILES['name']],
					'type'     => [$FILES['type']],
					'tmp_name' => [$FILES['tmp_name']],
					'error'    => [$FILES['error']],
					'size'     => [$FILES['size']],
				];
			}

			foreach ($FILES['name'] as $key => $name) {
				$fileData = [
					'name'     => $FILES['name'][$key],
					'type'     => $FILES['type'][$key],
					'tmp_name' => $FILES['tmp_name'][$key],
					'error'    => $FILES['error'][$key],
					'size'     => $FILES['size'][$key]
				];
				$this->processFile($fileData, $fileAttachType, $uploadPath, $maxFileSize, $uploadedFiles, $uploadFileSub, $thumbSize);
			}
    }

    if($fileAttachType == "DONDRAWZIP"){
			return [
				'uploadedFiles' => $uploadedFiles,
				'uploadFileSub' => $uploadFileSub
			];
		}else{
			return $uploadedFiles;
		}
	}


	// 썸네일 생성
	private function createThumbnail($sourceFile, $targetFile, $newWidth) {

		list($width, $height, $type) = getimagesize($sourceFile);

		switch ($type) {
			case IMAGETYPE_JPEG:
				$sourceImage = imagecreatefromjpeg($sourceFile);
			break;
			case IMAGETYPE_PNG:
				$sourceImage = imagecreatefrompng($sourceFile);
			break;
			case IMAGETYPE_GIF:
				$sourceImage = imagecreatefromgif($sourceFile);
			break;
			default:
				throw new Exception("Unsupported image type.");
		}

		$newHeight = ($height / $width) * $newWidth;
		$thumbnail = imagecreatetruecolor($newWidth, $newHeight);

		imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

		switch ($type) {
			case IMAGETYPE_JPEG:
				imagejpeg($thumbnail, $targetFile);
			break;
			case IMAGETYPE_PNG:
				imagepng($thumbnail, $targetFile);
				break;
			case IMAGETYPE_GIF:
				imagegif($thumbnail, $targetFile);
				break;
		}
		imagedestroy($sourceImage);
		imagedestroy($thumbnail);
	}

	private function convertFileNameEncoding($fileName) {
    $encoding = mb_detect_encoding($fileName, ['UTF-8', 'CP949', 'EUC-KR', 'ISO-8859-1', 'CP437'], true);

    if ($encoding === false) {
        $encoding = 'CP437';
    }
    return mb_convert_encoding($fileName, 'UTF-8', $encoding);
	}

	// ZIP파일 파일 추출
	// private function extractZipFiles($zipFilePath, &$uploadFileSub = []) {

  //   $zip = new ZipArchive;

  //   if ($zip->open($zipFilePath) === TRUE) {

	// 		for ($i = 0; $i < $zip->numFiles; $i++) {

	// 			$fileName      = $zip->getNameIndex($i);
	// 			$fileName      = $this->convertFileNameEncoding($fileName);

	// 			$fileStat      = $zip->statIndex($i);
	// 			$fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
					
	// 			if ($fileExtension === 'zip') {
						
	// 				$tmpZipFilePath = sys_get_temp_dir() . '/' . basename($fileName);
	// 				copy("zip://".$zipFilePath."#".$fileName, $tmpZipFilePath);
	// 				$this->extractZipFiles($tmpZipFilePath, $uploadFileSub);

	// 			} else {

	// 				$uploadFileSub[] = [
	// 					'orgFile'   => $fileName,
	// 					'chgFile'   => $fileName,
	// 					'fileSize'  => $fileStat['size'],
	// 					'extension' => $fileExtension
	// 				];
	// 			}
	// 		}
	// 		$zip->close();

  //   } else {
  //     throw new Exception("ZIP 파일을 열 수 없습니다.", 1);
  //   }	
	// }
	private function extractZipFiles($zipFilePath, &$uploadFileSub = []) {

    $zip = new ZipArchive;

    if ($zip->open($zipFilePath) === TRUE) {

			for ($i = 0; $i < $zip->numFiles; $i++) {

				$fileName = $zip->getNameIndex($i);
				$fileName = $this->convertFileNameEncoding($fileName);
				$fileStat = $zip->statIndex($i);

				// 폴더여부 확인
				if (substr($fileName, -1) === '/') {
					continue;
				}

				$fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

				// print_r("file_name : ".$fileName."fileExtension : ".$fileExtension);
				// exit;
				
				// ZIP 파일 정보
				if ($fileExtension !== 'zip') {
					$uploadFileSub[] = [
						'orgFile'   => $fileName,
						'chgFile'   => $fileName,
						'fileSize'  => $fileStat['size'],
						'extension' => $fileExtension
					];
				} else {

					// ZIP 파일 중첩 - 재귀 호출
					$tmpZipFilePath = sys_get_temp_dir() . '/' . basename($fileName);
					copy("zip://" . $zipFilePath . "#" . $fileName, $tmpZipFilePath);
					$this->extractZipFiles($tmpZipFilePath, $uploadFileSub);
				}
			}
		$zip->close();

    } else {
      throw new Exception("ZIP 파일을 열 수 없습니다.", 1);
    }
	}


	// 업로드 처리 (S3포함)
	private function processFile($file, $fileAttachType, $uploadPath, $maxFileSize, &$uploadedFiles, &$uploadFileSub = [], $thumbSize = 300) {

    try {

			// 파일 업로드 오류 처리
			switch ($file['error']) {
					case UPLOAD_ERR_OK:
							break;
					case UPLOAD_ERR_INI_SIZE:
							throw new Exception("THE UPLOADED FILE EXCEEDS THE UPLOAD_MAX_FILESIZE", 1);
					case UPLOAD_ERR_FORM_SIZE:
							throw new Exception("THE UPLOADED FILE EXCEEDS THE MAX_FILE_SIZE ", 1);
					case UPLOAD_ERR_PARTIAL:
							throw new Exception("THE UPLOADED FILE WAS ONLY PARTIALLY UPLOADED", 1);
					case UPLOAD_ERR_NO_FILE:
							throw new Exception("NO FILE WAS UPLOADED", 1);
					case UPLOAD_ERR_NO_TMP_DIR:
							throw new Exception("MISSING A TEMPORARY FOLDER", 1);
					case UPLOAD_ERR_CANT_WRITE:
							throw new Exception("FAILED TO WRITE FILE TO DISK", 1);
					case UPLOAD_ERR_EXTENSION:
							throw new Exception("A PHP EXTENSION STOPPED THE FILE UPLOAD", 1);
					default:
							throw new Exception("UNKNOWN UPLOAD ERROR", 1);
			}

			// 파일 사이즈 체크
			if ($file['size'] > $maxFileSize) {
				throw new Exception("첨부파일은 ". ($maxFileSize / 1048576) ."메가이상 업로드할수 없습니다.", 1);
			}

			// 파일 확장자 처리
			$file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

			if ($fileAttachType == 'IMAGE' && !$this->isImageExtension($file_extension)) {
				throw new Exception("업로드 불가한 이미지 파일 확장자 입니다.", 1);
			} elseif ($fileAttachType == 'FILE' && !$this->isFileExtension($file_extension)) {
				throw new Exception("업로드 불가한 파일 확장자 입니다.", 1);
			} elseif ($fileAttachType == 'DONDRAW' && !$this->isDondrawExtension($file_extension)) {
				throw new Exception("업로드 불가한 파일 확장자 입니다.", 1);
			} elseif ($fileAttachType == 'DONDRAWZIP' && !$this->isZipExtension($file_extension)) {
				throw new Exception("업로드 불가한 파일 확장자 입니다.", 1);
			}


			// 파일 이름 생성
			$random       = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 2);
			$new_filename = date("YmdHis") . "_" . $random . "." . $file_extension;
			$target_file  = $uploadPath . $new_filename;

			
			
			// fileAttachType이 DZIP인 경우 S3 업로드 처리
			if ($fileAttachType == 'DONDRAWZIP') {

				
				// S3Service 클래스를 사용하여 S3에 업로드
				$s3Service = new S3Service();

				$s3Key     = S3_UPLOADPATH.$new_filename;  
				$s3Service->setUploadToS3($file['tmp_name'], $s3Key);


				// 업로드된 파일 정보 저장 (S3 경로 포함)
				$uploadedFiles[] = [
					'orgFile'   => $file['name'],
					'chgFile'   => $new_filename,
					'fileSize'  => $file['size'],
					'extension' => $file_extension,
				];

				$this->extractZipFiles($file['tmp_name'], $uploadFileSub);

			} else {


				// 파일을 로컬에 저장
				if (!move_uploaded_file($file['tmp_name'], $target_file)) {
					$error = error_get_last();
					throw new Exception("SYSTEM_ERROR : FILE UPLOAD failed with error: " . $error['message']);
				}


				// 이미지의 경우 썸네일 생성
				if ($fileAttachType == 'IMAGE') {
					$this->createThumbnail($target_file, $uploadPath . 'thumb_' . $new_filename, $thumbSize);
				}


				// 업로드된 파일 정보 저장
				$uploadedFiles[] = [
					'orgFile'   => $file['name'],
					'chgFile'   => $new_filename,
					'fileSize'  => $file['size'],
					'extension' => $file_extension
				];
			}

    } catch (Exception $e) {
        throw $e;
    }
	}


	
	// private function processFile($file, $fileAttachType, $uploadPath, $maxFileSize, &$uploadedFiles, &$uploadFileSub = [], $thumbSize = 300) {

  //   try {

	// 		// 파일 업로드 오류 처리
	// 		switch ($file['error']) {
	// 			case UPLOAD_ERR_OK:
	// 				break;
	// 			case UPLOAD_ERR_INI_SIZE:
	// 				throw new Exception("THE UPLOADED FILE EXCEEDS THE UPLOAD_MAX_FILESIZE", 1);
	// 			case UPLOAD_ERR_FORM_SIZE:
	// 				throw new Exception("THE UPLOADED FILE EXCEEDS THE MAX_FILE_SIZE ", 1);
	// 			case UPLOAD_ERR_PARTIAL:
	// 				throw new Exception("THE UPLOADED FILE WAS ONLY PARTIALLY UPLOADED", 1);
	// 			case UPLOAD_ERR_NO_FILE:
	// 				throw new Exception("NO FILE WAS UPLOADED", 1);
	// 			case UPLOAD_ERR_NO_TMP_DIR:
	// 				throw new Exception("MISSING A TEMPORARY FOLDER", 1);
	// 			case UPLOAD_ERR_CANT_WRITE:
	// 				throw new Exception("FAILED TO WRITE FILE TO DISK", 1);
	// 			case UPLOAD_ERR_EXTENSION:
	// 				throw new Exception("A PHP EXTENSION STOPPED THE FILE UPLOAD", 1);
	// 			default:
	// 				throw new Exception("UNKNOWN UPLOAD ERROR", 1);
	// 		}

	// 		// 파일 사이즈 체크
	// 		if ($file['size'] > $maxFileSize) {
	// 			throw new Exception("첨부파일은 ". ($maxFileSize / 1048576) ."메가이상 업로드할수 없습니다.", 1);
	// 		}

	// 		// 파일 확장자 처리
	// 		$file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

	// 		if ($fileAttachType == 'IMAGE' && !$this->isImageExtension($file_extension)) {
	// 			throw new Exception("업로드 불가한 이미지 파일 확장자 입니다.", 1);
	// 		} elseif ($fileAttachType == 'FILE' && !$this->isFileExtension($file_extension)) {
	// 			throw new Exception("업로드 불가한 파일 확장자 입니다.", 1);
	// 		} elseif ($fileAttachType == 'DONDRAW' && !$this->isDondrawExtension($file_extension)) {
	// 			throw new Exception("업로드 불가한 파일 확장자 입니다.", 1);
	// 		} elseif ($fileAttachType == 'DONDRAWZIP' && !$this->isZipExtension($file_extension)) {
	// 			throw new Exception("업로드 불가한 파일 확장자 입니다.", 1);
	// 		}

	// 		// 파일 이동 처리
	// 		$random       = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 2);
	// 		$new_filename = date("YmdHis") . "_" . $random . "." . $file_extension;
	// 		$target_file  = $uploadPath . $new_filename;

	// 		// if (!move_uploaded_file($file['tmp_name'], $target_file)) throw new Exception("SYSTEM_ERROR : FILE UPLOAD", 1);

	// 		if (!move_uploaded_file($file['tmp_name'], $target_file)) {
	// 			$error = error_get_last();
	// 			throw new Exception("SYSTEM_ERROR : FILE UPLOAD failed with error: " . $error['message']);
	// 		}
		

	// 		// 이미지의 경우 썸네일 생성
	// 		if ($fileAttachType == 'IMAGE') {
	// 			$this->createThumbnail($target_file, $uploadPath . 'thumb_' . $new_filename, $thumbSize);
	// 		}

	// 		// 업로드된 파일 정보 저장
	// 		$uploadedFiles[] = [
	// 			'orgFile'   => $file['name'],
	// 			'chgFile'   => $new_filename,
	// 			'fileSize'  => $file['size'],
	// 			'extension' => $file_extension
	// 		];

	// 		// ZIP 파일 처리
	// 		if ($fileAttachType == 'DZIP') {
	// 			$this->extractZipFiles($target_file, $uploadFileSub);
	// 		}

  //   } catch (Exception $e) {
  //     throw $e;
  //   }
	// }



}
?>
