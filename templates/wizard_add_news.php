<?php

require_once 'scripts/database_connect.php';
include_once 'header.php';
include_once 'navigation.php';
require_once 'scripts/user_actions.php';


if(count($_POST) > 0) {
    
    $article_id = $_POST['n_id'];
    $date = $_POST['n_date'];
    $text = $_POST['n_text'];
    
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
   <table class="pure-table pure-table-bordered">
       <thead>
       <tr>
       <th>ID</th><th>Дата</th><th>Содержание</th><th>Удалить/Изменить</th>
       </tr>
       </thead>

       <?php

       $SQL = "SELECT * FROM news ORDER BY id";
       $result = $connection->query($SQL);
       if(!$result){die($connection->error);}

       while($row = $result->fetch_array(MYSQLI_ASSOC)) {

           $n_id    = $row['id'];
           $n_date  = $row['date'];
           $n_text  = $row['text'];

       ?>

       <form action="?wizard_moder_comments" method="post">
       <tbody>
       <td><input type="hidden" value="<?php echo $n_id; ?>" name="n_id"><?php echo $n_id; ?></td>
       <td><input type="text" name="n_date" value="<?php echo $n_date; ?>"></td>
       <td><textarea name="n_text" cols="25"><?php echo $n_text; ?></textarea> </td>
       <td><input type="submit" name="submit" value="Изменить">
       <a href="scripts/delete_news.php?id=<?php echo $n_id;?>">Удалить</a> </td>

       </tbody>
       </form>

       <?php } ?>
   </table>
</main>