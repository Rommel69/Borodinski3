<?php

require_once 'scripts/database_connect.php';
include_once 'header.php';
include_once 'navigation.php';
require_once 'scripts/user_actions.php';



if(count($_POST) > 0) {
    $id                 = $_POST['p_id'];
    $name               = $_POST['p_name'];
    $type               = $_POST['p_type'];
    $price              = $_POST['p_price'];
    $description        = $_POST['p_description'];
    $amount             = $_POST['p_amount'];
    $in_stock           = $_POST['p_in_stock'];
    $produced_by        = $_POST['p_made'];
    $product_image      = $_POST['p_image'];
    

    if($amount > 0 ) {
        $in_stock = 1;
    }
    
    if($amount == 0) {
        $in_stock = 0;
    }

    
    $query = "UPDATE products SET name ='{$name}', type ='{$type}', price ='{$price}', description ='{$description}', 
                                  amount ='{$amount}', in_stock ='{$in_stock}', produced_by ='{$produced_by}', product_image = '{$product_image}'
              WHERE id = '$id'";
   
   $message = "База обновлена!";
   $result = $connection->query($query);
   if(!$result)die($connection->error);
}



?>
<style>
    main {
	background-color: #353535;
	display: flex;
	flex-direction: column;
	align-items: center;
}




a {
    color: white;
    text-decoration: none;
}

    .pure-table-bordered {
        width: 960px;
    }
</style>

<main>
   
    <h2>Список и наличие товаров</h2>
    <a href="index.php?wizard">Главное меню</a>
    <b><?php echo $message ?></b>
<table class="pure-table pure-table-bordered">
    <thead>
    <tr>
    <th>ID</th><th>Название</th><th>Тип</th><th>Цена</th><th>Описание</th><th>Количество</th><th>В наличии</th>
    <th>Производитель</th><th>Изображение</th><th>Удалить/Редактировать</th>
    </tr>
    </thead>

    <?php
    $SQL = "SELECT * FROM products";
    $result = $connection->query($SQL);
    if(!$result){die($connection->error);}

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $p_id   = $row['id'];
        $p_name = $row['name'];
        $p_type = $row['type'];
        $p_price = $row['price'];
        $p_description = $row['description'];
        $p_amount = $row['amount'];
        $p_instock = $row['in_stock'];
        $p_made = $row['produced_by'];
        $p_image = $row['product_image'];


    ?>
    <form action="?wizard_products" method="post" name="p_form">
    <tbody>
    <td><input type="hidden" name="p_id" value=" <?php echo $p_id; ?>"><?php echo $p_id; ?></td>
    <td><input type="text" name="p_name" value="<?php echo $p_name; ?>"></td>
    <td><input type="text" name="p_type" value="<?php echo $p_type; ?>"></td>
    <td><input type="text" name="p_price" value="<?php echo $p_price; ?>"></td>
    <td><textarea name="p_description"><?php echo $p_description; ?></textarea>
    </td><td><input type="text" name="p_amount" value="<?php echo $p_amount; ?>"></td>
    <td><input type="text" name="p_instock" value="<?php if($p_amount > 0) echo "В наличии"; else echo "Нет в наличии"; ?>"></td>
    <td><input type="text" name="p_made" value="<?php echo $p_made; ?>"></td>
    <td><input type="text" name="p_image" value="<?php echo $p_image; ?>"><img src="<?php echo $p_name; ?>" alt=" "> </td>
    <td><input type="submit" name="Update" value="Редактировать">
        <a href="scripts/delete_product.php?id=<?php echo $p_id;?>">Удалить</a> </td>
    </tbody>
    </form>
        <?php }?>
</table>
    
</main>

<?php include_once 'footer.php'; ?>