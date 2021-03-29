<?php
  include 'db_connection.php';
  $conn = getConnection();

  $comment = $_POST['new_comment'];
  $index = $_GET['idx'];

  $sql = "insert into comments(idx, comment, date)
          values({$index},'{$comment}', '".date("Y-m-d H:i:s")."')";

  if(mysqli_query($conn, $sql)){
    echo "<script type=\"text/javascript\">
            window.location.replace('http://localhost/question.php/?idx={$index}')
          </script>"; 
  }
  else{
    echo "fail";
  }
?>
