<?php
require_once 'scripts/database_connect.php';
include_once 'header.php';
include_once 'navigation.php';

$article_id = $_GET['article_id'];
$SQL = "SELECT * FROM news WHERE id = {$article_id}";
$result = $connection->query($SQL);
if(!$result)die($connection->error);

$row = $result->fetch_array(MYSQLI_ASSOC);
$public_date = $row[date];
$content = $row["text"];
?>

<main>
    <a href="index.php?home">Назад</a>
    <div class="article">
        <b>Дата публикации:  <?php echo $public_date ?></b>
        <p class="content">
            <?php echo $content; ?>
        </p>
    </div>
</main>