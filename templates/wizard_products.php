<?php

require_once 'scripts/database_connect.php';
require_once 'header.php';
require_once 'navigation.php';
require_once 'scripts/user_actions.php';



if(count($_POST) > 0) {
    $id                 = $_POST['id'];
    $name               = $_POST['name'];
    $type               = $_POST['type'];
    $price              = $_POST['price'];
    $description        = $_POST['description'];
    $amount             = $_POST['amount'];
    $in_stock           = $_POST['in_stock'];
    $produced_by        = $_POST['produced_by'];
    $product_image      = $_POST['product_image'];
    
    if($in_stock == "В наличии" || $in_stock == "Да") {
        $in_stock = 1;
    }
    else {
    $in_stock = 0;    
    }
    $message = "База обновлена!";
    $query = "UPDATE products SET name = '{$name}', type = '{$type}', price = '{$price}', "
   . "description = '{$description}', amount = '{$amount}', in_stock = '{$in_stock}', "
   . "produced_by = '{$produced_by}' WHERE id = '{$id}'";
   
   $result = $connection->query($query);
}

?>
<style>
    main {
	background-color: #353535;
	display: flex;
	flex-direction: column;
	align-items: center;
}

table {
    padding: 10px;
    width: 320px;
    height: 120px;
}

table td {
    padding: 20px;
    text-align: center;
}
</style>

<main>
   
    <h2>Список и наличие товаров</h2>
    <a href="index.php?wizard">Главное меню</a>
    <form method="post" class="products-form" action="">
        <div class="form-wrap">
            <div><?php if(isset($message)) echo $message; ?></div>
            <div class="add-product"></div>
            <table class="product-table">
                <tr>
                    <td>Фото товара</td>
                    <td>Имя товара</td>
                    <td>Цена товара</td>
                    <td>Количество на складе</td>
                    <td>В наличии</td>
                    <td>Тип товара</td>
                    <td>Производитель товара</td>
                    <td>Описание товара</td>
                    <td>Удалить/Редактировать</td>
                </tr>
    
    <?php
        $sql = "SELECT products.*
        FROM   products
        ";
$result = $connection->query($sql);
if(!$result)die($connection->error);
    $i = 0;
    while($row = $result->fetch_array(MYSQLI_ASSOC)) { 
        
        $p_id = $row['id'];
        $p_name = $row['name'];
        $p_price = $row['price'];
        $p_amount = $row['amount'];
        $p_in_stock = $row['in_stock'];
        $p_type = $row['type'];
        $p_produced = $row['produced_by'];
        $p_description = $row['description'];
        
        
        ?>
                <tr>
                       
                    <td><img src="<?php echo $row['product_image']; ?>">  </td>
                    <td><input type="hidden" name="id" value="<?php echo $p_id; ?>">
                        <input type="text" name="name" value="<?php echo $p_name; ?>"></td>
                    <td><input type="text" name="price" value="<?php echo $p_price; ?>"></td>
                    <td><input type="text" name="amount" value="<?php echo $p_amount;?>"></td>
                    <td><input type="text" name="in_stock" value="<?php if($p_in_stock==1) echo "В наличии"; else echo"Нет в наличии"; ?>"></td>
                    <td><input type="text" name="type" value="<?php echo $p_type; ?>"></td>
                    <td><input type="text" name="produced_by" value="<?php echo $p_produced; ?>"></td>
                    <td><textarea name="description" rows="10" cols="15"><?php echo $p_description; ?></textarea></td>
                    
                    <td><input type="submit" name="submit" value="Обновнить">
                        <a href="scripts/delete_product.php?id=<?php echo $row['id'] ?> ">Удалить</a></td>
                    <?php $i++; }  ?>
                </tr>
                
            </table>
            
        </div>
        
    </form>
    
</main>

<?php require_once 'footer.php'; ?>