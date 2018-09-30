<?php
require_once 'scripts/database_connect.php';
include_once 'header.php';
include_once 'navigation.php';



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



if(isset($_POST['submit'])) {
    
    $text = sanitizeString($_POST['text']);
    $user_id = $_POST['user_id'];
    $id = $_POST['review_id'];
    $SQL = "UPDATE user_reviews SET text = '{$text}' WHERE user_id = $user_id AND id =$id ";
    $result = $connection->query($SQL);
    if(!$result)die($connection->error);
    
    $message = "Записаь обновлена!";
}

if(isset($_POST['delete'])) {
    
    $review_id = $_POST['review_id'];
    $SQL = "DELETE FROM user_reviews WHERE id = '{$review_id}'";
    $result = $connection->query($SQL);
    $message = "Запись удалена!";
}
?>

<style>

     main {
	background-color: #353535;
	display: flex;
	flex-direction: column;
	align-items: center;
}

input {
   padding-left: 25px;
}

a {
    color: white;
}
</style>

<main>
    <h2>Отзывы пользователей</h2>
    <a href="index.php?wizard">Главное меню</a>
    <div><?php if(isset($message)) echo $message; ?></div>

        <table class="pure-table pure-table-bordered">
            <thead>
            <tr>
            <th>Дата</th>
            <th>Имя пользователя</th>
            <th>Фамилия:</th>
            <th>Email</th>
            <th>Текст отзыва</th>
            <th>Удалить/Изменить</th>
            </tr>
            </thead>
            <?php
            
            
            $SQL = "SELECT
  user_reviews.text,
  users.user_id,
  users.user_name,
  users.user_surname,
  users.user_pick_path,
  user_reviews.date,
  users.user_email,
  users.user_login,
  user_reviews.user_id AS user_id1,
  user_reviews.id
FROM
  users
  INNER JOIN user_reviews ON user_reviews.user_id = users.user_id";

$result = $connection->query($SQL);
            
            
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            
                $review_id      =   $row['id'];
                $last_name      =   $row['user_surname'];
                $first_name     =   $row['user_name'];
                $email          =   $row['user_email'];
                $review_text    =   $row['text'];
                $date           =   $row['date'];
                $user_id        = $row['user_id'];
                
            ?>
                <form action="?wizard_moder_comments" method="post">
            <tbody>
                <tr>

                    <td><?php echo $date;?></td>
                    <td><?php echo $first_name ;?></td>
                    <td><?php echo $last_name;?></td>
                    <td><?php echo $email ;?></td>
                    <td><textarea name="text"><?php echo $review_text; ?></textarea></td>
                   <input type="hidden" name="review_id" value="<?php echo $review_id;?>">
                   <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <td>
                        <input type="submit" value="Изменить" name="submit">
                        <input type="submit" value="Удалить" name="delete">
                        </td>

                </tr>
            </tbody>
                </form>
            <?php } ?>
        </table>
</main>
