<?php
  include 'db_connection.php';
  $conn = getConnection();

  $comment = $_POST['new_comment'];
  $index = $_GET['idx'];

  $file_name = $_FILES['fileToUpload']['name']; // 사용자가 업로드한 이미지 이름
  echo $file_name;
  $file_tmp_name = $_FILES['fileToUpload']['tmp_name']; // 임시 디렉토리에 저장된 파일명
  $fileToUpload_size = $_FILES['fileToUpload']['size']; // 파일 사이즈
  $fileToUpload_type = $_FILES['fileToUpload']['type']; // 파일 타입

  $save_dir = 'images/comments/'; // 저장할 디렉토리 설정

  // 사진의 갯수 index 구하는 곳
  $tmpNum = mysqli_query($conn, "SELECT COUNT(*) as cnt FROM comments WHERE idx={$index};"); // 쿼리로 인덱스 가져오는 문장
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

    $change_file_name = "img_{$index}_".$indexNum.".".$file_exe;
    $dest_url = $save_dir.$change_file_name;

    if(!move_uploaded_file($file_tmp_name, $dest_url)){
      echo "실패 ㅋㅋ ";
    }
  }


  $sql = "insert into comments(idx, comment, date, comment_img)
          values({$index},'{$comment}', '".date("Y-m-d H:i:s")."', '{$change_file_name}')";

  if(mysqli_query($conn, $sql)){
    echo "<script type=\"text/javascript\">
            window.location.replace('http://localhost/question.php/?idx={$index}')
          </script>";
  }
  else{
    echo "<script type=\"text/javascript\"> alert(\"error\");
          </script>";
  }
?>
