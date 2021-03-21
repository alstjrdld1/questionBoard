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
     <link rel="stylesheet" href="../css/common.css">
  </head>
  <body>
    <div class="chat_list_wrap">
        <div class="header" onclick="location.href='http://localhost'">
            International Finance TA Q&A
        </div>

        <div class="post_all">
          <div class="head">
            <div class="board_name">
                <h1>Finanace</h1>
            </div>

            <div class="question_title">
                <span> <?php echo $row['title']; ?> </span>
            </div>

            <div class="question_date">
              <span> <?php echo $row['date']; ?></span>
            </div>
          </div>

          <div class="question_body">
            <div class="question_img">
              <?php if($row['uploaded_file'] != null)
              {
                echo "<img src='/{$row['uploaded_file']}'/>";
              } ?>
            </div>
            <div class="question_content">
              <?php echo $row['content']; ?>
            </div>
          </div>
        </div>

        <div class="comments">
          <div class="comment_line">
            Comment
          </div>
            <?php
            $sql = "SELECT * FROM comments WHERE idx = ".$index;
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
              echo '<li>';
              echo '<table class="comment_border" cellpadding="0" cellspacing="0"> <tr>';

              // Time
              echo '<td class="comment_td">';
              echo '<div class = "date">';
              echo $row['date'].'</div>';

              // Title and preview
              echo '<div class="comment">';
              if($row['comment_img'] != null){
                echo "<div class=\"comment_img\">";
                echo "<img src='/images/comments/{$row['comment_img']}'></div>";
              }
              echo $row['comment'].'<div> </td> </tr> </table> </li>';

            }
            ?>
        </div>

        <fieldset class="make_comment">
          <form action ="/add_comment.php/?idx=<?php echo $index; ?>" class="enter_comment" method="post" enctype="multipart/form-data">
            <div class="comment_textarea">
              <textarea placeholder="댓글을 입력해주세요." name="new_comment" tabindex="3"></textarea>
            </div>
            <div class="fileUploadClass">
              <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
            </div>
            <div class="comment_submit">
              <input type="submit" name="" value="Send">
            </div>
          </form>
        </fieldset>
    </div>
  </body>
</html>
