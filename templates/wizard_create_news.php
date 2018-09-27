<?php


require_once 'scripts/database_connect.php';
include_once 'header.php';
include_once 'navigation.php';
require_once 'scripts/user_actions.php';

$current_time = date("d M");
$current_day = date("d");
$current_month = date("M");

if(count($_POST)) {
    $date = $_POST['date'];
    $current_day = $_POST['day'];
    $current_month = $_POST['month'];
    $text = $_POST['article_text'];
    
    $message = "Новость успешно добавлена!";
    
    add_news($connection, $date, $text, $current_day, $current_month);
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
    <h2>Добавить товар</h2>
    <a href="index.php?wizard">Главное Меню</a>
    <a href="index.php?wizard_add_news">Назад</a>
    <div><?php  if(isset($message)) echo $message; ?></div>
    <form action="" method="post" enctype="multipart/form-data">
        <label>
            <input type="hidden" name="date" value="<?php echo $current_time; ?>"/>
            <input type="hidden" name="day" value="<?php echo $current_day; ?>"/>
            <input type="hidden" name="month" value="<?php echo $current_month; ?>"/>
        </label>
        <label> Содержание новости<br>
            <textarea rows="10" cols="25" name="article_text"></textarea>
        </label>
       
        <input type="submit" value="Отправить" name="add_news">
    </form>
</main>