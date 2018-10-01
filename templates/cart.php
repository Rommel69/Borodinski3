<?php
include_once 'header.php';
include_once 'navigation.php';
require_once 'scripts/database_connect.php';

$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
?>

<style>
    .cart-table {
        display: flex;
        flex-direction: column;
    }

    .comment-button {
        align-self: center;
    }
</style>

<main class="cart-main">
    <h3>Order Details</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Название</th>
                <th width="10%">Количество</th>
                <th width="20%">Цена</th>
                <th width="15%">Итого</th>
                <th width="5%">Действие</th>
            </tr>
            <?php
            if(!empty($_SESSION["shopping_cart"]))
            {
                $total = 0;
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                {
                    ?>
                    <tr>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"]; ?></td>
                        <td>$ <?php echo $values["item_price"]; ?></td>
                        <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                        <td><a href="scripts/del_cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                    </tr>
                    <?php
                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
        </table>


            <input type="submit" name="submit" value="Оплатить" class="comment-button">
	</div>
</div>
    
    
    
</main>