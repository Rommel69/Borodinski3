<?php
require_once "scripts/wizard_model.php";
include_once 'header.php';
include_once 'navigation.php';
$admin_name = $_SESSION['user_name'];

$sql = "SELECT * FROM users ORDER BY user_id ASC";
$result = $connection->query($sql);


?>


<style>
    main {
	background-color: #f8f5f2;
	display: flex;
	flex-direction: column;
	align-items: center;
}
    a {
        color: black;

    }


</style>
<main>
    <h2>Добро пожаловать в панель управления сайтом <?php echo $admin_name; ?></h2>
    <b>Количество зарегистрированных пользователей:<?php echo $user_quantity; ?> </b>
    <nav class="wizard-nav">
        <ul>
            <li><a href="index.php?wizard_users">Редактировать пользователей</a></li>
            <li><a href="index.php?wizard_products">Просмотреть/Отредактировать товар</a></li>
            <li><a href="index.php?wizard_add_product">Добавить товар</a></li>
            <li><a href="index.php?wizard_add_news">Редактировать новости</a></li>
            <li><a href="index.php?wizard_orders">Заказы</a></li>
            <li><a href="index.php?wizard_moder_comments">Редактировать комментарии</a></li>
            <li><a href="index.php">Главная страница сайта</a></li>
            
        </ul>
    </nav>
    
    

</main>

<?php include_once 'footer.php'; ?>