<?php
// 파일 경로 확인
$file_path = $_GET['file']; // 예시로 URL에 파일 이름을 받음

// 실제 파일 경로 확인
$full_path = $_SERVER['DOCUMENT_ROOT'] . '/_upload_files/' . $file_path; // 업로드된 디렉토리

// 파일이 존재하는지 확인
if (file_exists($full_path)) {
    // MIME 타입 설정 (파일 확장자에 맞게 설정)
    $file_info = pathinfo($full_path);
    $ext = strtolower($file_info['extension']);
    
    switch ($ext) {
        case 'jpg':
        case 'jpeg':
            $mime_type = 'image/jpeg';
            break;
        case 'png':
            $mime_type = 'image/png';
            break;
        case 'pdf':
            $mime_type = 'application/pdf';
            break;
        case 'txt':
            $mime_type = 'text/plain';
            break;
        // 추가적으로 다른 확장자도 설정 가능
        default:
            $mime_type = 'application/octet-stream'; // 기본적으로 바이너리 파일
    }

    // 파일 다운로드 헤더 설정
    header('Content-Type: ' . $mime_type);
    header('Content-Disposition: attachment; filename="' . basename($full_path) . '"');
    header('Content-Length: ' . filesize($full_path));
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // 파일 내용 출력
    readfile($full_path);
    exit;
} else {
    // 파일이 존재하지 않으면 오류 메시지 출력
    echo "파일이 존재하지 않습니다.";
}
?>