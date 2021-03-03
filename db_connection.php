<?php
function getConnection(){
  $conn = mysqli_connect(
    'localhost',
    'kms1998',
    'alstjrdld1!',
    'kms1998');

    return $conn;
}
?>
