<?php
include 'db_connection.php';
$conn = getConnection();
$sql = "SELECT * FROM question ORDER BY idx DESC";

$result = mysqli_query($conn, $sql);
?>

 <!DOCTYPE html>
 <html lang="ko">
 <head>
     <title>KHU Int'l TA Session - Jeongseon</title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
     <link rel="stylesheet" href="./css/common.css">
 </head>
 <body>
 <div class="chat_list_wrap">
     <div class="header" onclick="location.href='http://localhost'">
         경희대학교 국제학과 TA 질문 홈페이지
     </div>
     <div class="search">
         <input type="text" placeholder="질문 검색" />
     </div>
     <div class="list">
         <ul>
             <?php
             while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
             {
               echo '<li>';
               echo '<table onClick = location.href=\'question.php/?idx='.$row['idx'].'\' cellpadding="0" cellspacing="0">'.'<tr>';
               echo '<td class="question_num">'.'<!--question number-->'.$row['idx'].'</td>';

               // Title and preview
               echo '<td class="question_td">';
               echo '<div class="title">';
               echo $row['title'].'</div>';
               echo '<div class="question_preview">';
               echo $row['preview'].'</div> </td>';

               // Time
               echo '<td class="time_td">';
               echo '<div class="time">';
               echo $row['date'].'</div> </td> </tr> </table> </li>';
             }
            ?>
         </ul>
     </div>
 </div>

 <div class="ask_question">
   <button onclick="location.href='write.html'" type="button" name="button">글쓰기</button>

 </div>

</body>
 </html>
