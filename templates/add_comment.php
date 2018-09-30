<?php

require_once 'scripts/database_connect.php';
include_once 'header.php';
include_once 'navigation.php';

$SQL = "SELECT
  user_reviews.text,
  users.user_id,
  users.user_name,
  users.user_surname,
  users.user_pick_path
FROM
  users
  INNER JOIN user_reviews ON user_reviews.user_id = users.user_id
  ";


$result = $connection->query($SQL);



?>

<main class="main-comments">
    <a href="index.php?home" class="coomment-back comment-button">Назад</a>
    <h2 class="comments-title">Отзывы о нас</h2>
    <div class="service_message"><?php echo $message; ?></div>
    <form action="scripts/add_comment.php" method="POST" class="comments-form">
        
        <textarea name="new_comment" rows="10" cols="45">
            Пишите не стесняйтесь.
        </textarea>
        <input type="submit" name="submit" value="Отправить" class="comment-button">
    </form>
    
    <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { 
    
    $user_name = $row['user_name'];
    $user_lastname = $row['user_surname'];
    $text = $row['text'];
    $avatar_path = $row['user_pick_path'];
    
    
    ?>
    <div class="author_con">
                   <p class="comment-img">
                       <img src="<?php echo $avatar_path; ?>" alt="<?php echo $user_name . $user_lastname; ?>"
                     width="80" height="80">
                   </p>
                   <b class="comment-name"><?php echo $user_name . " " . $user_lastname; ?></b>
                   <p class="comment-text">
                     <?php echo $text; ?>
                   </p>
    </div>

<?php } ?>
    
</main>