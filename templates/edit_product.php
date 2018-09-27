<?php

require_once '../scripts/database_connect.php';

include_once 'header.php';
include_once 'navigation.php';


if(count($_POST)>0) {
	$sql = "UPDATE products set name='" . $_POST["name"] .  "', type='" . $_POST["type"] . "', price='" . $_POST["price"] . "' WHERE id='" . $_POST["id"] . "'";
	mysqli_query($connection,$sql);
	$message = "Record Modified Successfully";
}
$select_query = "SELECT * FROM products WHERE id='" . $_GET["productId"] . "'";
$result = mysqli_query($connection,$select_query);
$row = mysqli_fetch_array($result);

?>

<main>
    
    <form action="" name="user_form" method="post" >
        <div>
            <div><?php if(isset($message)) { echo $message; } ?></div>
            <table>
                <tr>
                    <td>Редактировать товар</td>
                </tr>
                <tr>
                    <td><label>Имя товара</label></td>
                    <td><input type="hidden" name="product_id" value="<?php echo $row['id'] ?>"></td>
                    <td><input type="text" name="name" value="<?php echo $row['name'] ?>"></td>
                </tr>
                <tr>
                    <td>Тип товара</td>
                    <td><input type="text" name="type" value="<?php $row['type'] ?>"></td>
                </tr>
                
                <tr>
                    <td>Цена товара</td>
                </tr>
                
            </table>
        </div>
    </form>
    
    
    <form name="frmUser" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="index.php" class="link"><img alt='List' title='List' src='../images/list.png' width='15px' height='15px'/> List User</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Редактировать товар</td>
</tr>
<tr>
<td><label>Имя товара</label></td>
<td><input type="hidden" name="productId" class="txtField" value="<?php echo $row['id']; ?>">
    <input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>"></td>
</tr>

<td><label>Тип Товара</label></td>
<td><input type="text" name="type" class="txtField" value="<?php echo $row['type']; ?>"></td>
</tr>
<td><label>Цена товара</label></td>
<td><input type="text" name="price" class="txtField" value="<?php echo $row['price']; ?>"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</main>

<?php include_once 'footer.php'; ?>