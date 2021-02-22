<?php
include 'db_connection.php';

$conn = getConnection();

$res = mysqli_query($conn, "select * from name");
$result = array();

while($row = mysqli_fetch_array($res)){
  array_push($result,
  array('myname' => $row[0]));
}

echo json_encode(array("이름" => $result), JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>
