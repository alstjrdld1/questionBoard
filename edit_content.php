<?php
$index = $_GET['idx'];

include 'db_connection.php';
$conn = getConnection();
$sql = "SELECT * FROM question WHERE idx = ".$index;


$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <title>KHU Int'l TA Session - Jeongseon</title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
     <link rel="stylesheet" href="/css/common.css">
  </head>
  <body>
    <div class="chat_list_wrap">
        <div class="header" onclick="location.href='http://localhost'">
            International Finance TA Q&A
        </div>

        <form class="post_all" action="/db_fix_shoot.php/?idx=<?php echo $index ?>" method="post">
          <div class="board_name">
            <h1>질문수정하기</h1>
          </div>
          <table>
            <div class="contents_here">
              <div class="enter_title">
                <tr>
                  <th scope="row">제목</th>
                  <td> <input type="text" name="title" placeholder="<?php echo $row['title'] ?>" disabled> </td>
                </tr>
              </div>

              <div class="file_upload">
                <tr>
                  <th scope = "row">사진</th>
                  <td>
                    <?php if($row['uploaded_file'] != null)
                    {
                      echo "<img src='/{$row['uploaded_file']}'/>";
                    } ?></td>
                </tr>

              </div>

              <div class="enter_content">
                <tr>
                  <th scope="row">본문</th>
                  <td> <textarea type="text" placeholder="사진은 변경이 안됩니다 ㅠㅠ 바꾸시려면 a159083@khu.ac.kr로 메일 주거나 아주 급한 경우는 010-4953-8759로 전화나 문자 부탁드립니다 새벽에 하시면 수정 안해드릴겁니다." name="description"></textarea></td>
                </tr>
              </div>
            </div>

          </table>
          <div class="ask_question">
            <input type="submit" name = "submit" value ="완료"></button>
          </div>
        </form>
    </div>
  </body>
</html>
