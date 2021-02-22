<?php
function getConnection(){
  $conn = mysqli_connect(
    'localhost',
    'root',
    '1124ms',
    'minstone_test');

    return $conn;
}
?>
