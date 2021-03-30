<?php
include 'db_connection.php';

$conn = getConnection();

$file_name = $_FILES['fileToUpload']['name']; // 사용자가 업로드한 이미지 이름
echo $file_name;
$file_tmp_name = $_FILES['fileToUpload']['tmp_name']; // 임시 디렉토리에 저장된 파일명
$fileToUpload_size = $_FILES['fileToUpload']['size']; // 파일 사이즈
$fileToUpload_type = $_FILES['fileToUpload']['type']; // 파일 타입

$save_dir = 'images/'; // 저장할 디렉토리 설정

// index 구하는 곳
$tmpNum = mysqli_query($conn, "SELECT COUNT(*) as cnt FROM question;"); // 쿼리로 인덱스 가져오는 문장
$tmpNum = mysqli_fetch_array($tmpNum); // 쿼리는 배열로 오니까 배열에서 번호만 뽑아내는 곳
$indexNum = $tmpNum['cnt'] + 1; // 지금 게시글은 현재 갯수 + 1 임

// 파일 이름 바꾸는 곳
$file_exe = '';
$dest_url = NULL;
$change_file_name = '';

// 업로드 된 파일이 있으면 진행
if($file_name != null){
  $real_name = $file_name; // 사용자가 올린 파일명
  $arr = explode(".", $real_name); // 원래 파일의 확장자명을 가져와서 그대로 적용
  // print_r($arr)하면 배열에 들어가 있는 정보 볼 수 있음
  $file_exe = $arr[1];

  $dest_url = $save_dir.$change_file_name;
  $change_file_name = "img_".$indexNum.".".$file_exe;

  if(!move_uploaded_file($file_tmp_name, $dest_url)){
    echo "실패 ㅋㅋ ";
  }
}

$title = $_POST['title']; // 게시글 제목
$password = $_POST['question_password_area']; // 게시글 내용
$desc = $_POST['description']; // 게시글 정보
$date = date("Y-m-d H:i:s"); // 게시글 작성 날자
$preview = substr($desc, 0, 100); // 미리보기

// 쿼리문 작성
$sql = "insert into question(idx, title, content, date, preview, uploaded_file, pw, category) values
        ({$indexNum}, '{$title}', '{$desc}', '{$date}', '{$preview}', '{$dest_url}', '{$password}', 'qna');";

if(mysqli_query($conn, $sql)){ // 쿼리 실행
  echo "<script type=\"text/javascript\"> alert(\"글쓰기완료요~~\")
        window.location.replace('http://localhost')</script>";
}
else{
  echo "<script type=\"text/javascript\"> alert(\"여러번 반복해도 안되면 관리자에게 문의해주세요.\n 010-4953-8759\")
        window.location.replace('http://localhost')</script>";
}


?>
