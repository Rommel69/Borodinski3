<?php

require_once 'scripts/database_connect.php';
include_once 'header.php';
include_once 'navigation.php';
require_once 'scripts/user_actions.php';


if(count($_POST) > 0) {
    
    $article_id = $_POST['article_id'];
    $date = $_POST['date'];
    $text = $_POST['text'];
    
    $SQL = "UPDATE news SET date = '{$date}', text = '{$text}' WHERE id = $article_id";
    $result = $connection->query($SQL);
    if(!$result) die($connection->error);
}

?>
<style>
    form {
        display: flex;
        flex-direction: column;
    }
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
    <h2>Новости</h2>
    <a href="index.php?wizard">Главное меню</a>
    <a href="index.php?wizard_create_news">Добавить новость</a>
    <div><?php if(isset($_SESSION['cond_message'])) echo $_SESSION['cond_message']; ?></div>
    <form name="news" method="POST" action="">
        <table>
            <thead>
            <th>Номер статьи</th>
            <th>Дата</th>
            <th>Текст</th>
            </thead>
            <?php
            
            $sql = "SELECT * FROM news ORDER BY date";
            
            $result = $connection->query($sql);
            
            if(!$result)die($connection->error);
            
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            
                $article_id     =   $row['id'];
                $article_date   =   $row['date'];
                $text           =   $row['text'];
                
                
            ?>
            <tbody>
                <tr>
                    <td><input type="text" name="article_id" value="<?php echo $article_id;?>"></td>
                    <td><input type="text" name="date" value="<?php echo $article_date;?>"></td>
                    <td><input type="text" name="text" value="<?php echo $text ;?>"></td>
                    <td>
                        <input type="submit" value="Обновить" name="sub_news">
                        <a href="scripts/delete_news.php?id=<?php echo $article_id; ?>">Удалить</a></td>
                    <td></td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </form>
</main>