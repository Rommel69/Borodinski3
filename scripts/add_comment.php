<?php
/**
 * Created by PhpStorm.
 * User: Predator
 * Date: 9/30/18
 * Time: 17:03
 */

require_once 'database_connect.php';

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
    session_start();
    $user_id = $_SESSION['user_id'];
    $text = sanitizeString($_POST['new_comment']);
    $date = date("d F o");
    $SQL = "INSERT INTO user_reviews (user_id, text, date) VALUES('{$user_id}',"
        . " '{$text}', '{$date}')";
    $result = $connection->query($SQL);
    if(!$result)die($connection->error);

    $message = "Отзыв успешно добавлен!";


    header("HTTP/1.1 301 Moved Permamentrly");
    header("Location: ../index.php?add_comment");
}