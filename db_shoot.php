<?php
include 'db_connection.php';
$conn = getConnection();

$title = $_POST['title'];
$desc = $_POST['description'];

$count = mysqli_query($conn, "select count(*) as cnt from question");
$count = mysqli_fetch_array($count);

$countint = $count['cnt'] + 1;
echo $countint;

$sql = "insert into question(idx, title, content, date, preview) values
        (".$countint.", '".$title."', '".$desc."', '".date("Y-m-d H:i:s")."', '".substr($desc, 0, 100)."');";

if(!$conn){
  echo "<script type=\"text/javascript\"> alert(\"여러번 반복해도 안되면 관리자에게 문의해주세요.\n 010-4953-8759\")
        window.location.replace('http://localhost')</script>";
}
else{
  if(mysqli_query($conn, $sql)){
      echo "<script type=\"text/javascript\"> alert(\"글쓰기완료요~~\")
            window.location.replace('http://localhost')</script>";
  }
  else{
    echo "<script type=\"text/javascript\"> alert(\"여러번 반복해도 안되면 관리자에게 문의해주세요.\n 010-4953-8759\")
          window.location.replace('http://localhost')</script>";
  }
}

?>
