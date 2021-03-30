<?php
include 'db_connection.php';
$conn = getConnection();

$index = $_GET['idx'];
$desc = $_POST['description'];

$sql = "UPDATE question SET content='{$desc}' WHERE idx = {$index}";

$ok = mysqli_query($conn, $sql);

if($ok){
  echo "<script type=\"text/javascript\"> alert('성공')
        window.location.replace('http://localhost')</script>";
}
else{
  echo "<script type=\"text/javascript\"> alert(\"여러번 반복해도 안되면 관리자에게 문의해주세요.\n 010-4953-8759\")
        window.location.replace('http://localhost')</script>";
}

?>
