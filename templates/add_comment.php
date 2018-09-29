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

if(count($_POST) > 0) {
    $user_id = $_SESSION['user_id'];
    $text = sanitizeString($_POST['new_comment']);
    $date = date("d F o");
    $SQL = "INSERT INTO user_reviews (user_id, text, date) VALUES('{$user_id}',"
    . " '{$text}', '{$date}')";
    $result = $connection->query($SQL);
    if(!$result)die($connection->error);
    
    $message = "Отзыв успешно добавлен!";
}



/* 
 * Copyright (c) 2018, Predator
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 * * Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

?>

<main class="main-comments">
    <a href="index.php?home" class="coomment-back comment-button">Назад</a>
    <h2 class="comments-title">Отзывы о нас</h2>
    <div class="service_message"><?php echo $message; ?></div>
    <form action="?add_comment" method="POST" class="comments-form">
        
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