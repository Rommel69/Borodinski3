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
        width: 320px;
    }

   tr, td, th {
       background-color: #f8f5f2;
   }

    h3 {
        text-align: center;
        margin-top: 0;
    }


    a {
        color: red;
        text-decoration: none;
    }

    .cart {
        list-style: none;
        padding: 0;
        width: 280px;
        margin: 0 auto;
    }
    .item-cart {
        margin-bottom: 15px;
    }

    .cart-main {
        width 280px;
        margin: 0 auto;
    }

    @media (min-width: 768px) {
        .cart {
            width: 640px;
        }



        .item-cart {
            display: flex;
            text-align: center;

        }
        .product-total-bot {
            display: flex;
            justify-content: center;
        }

        .total {
            padding-right: 20px;
        }

        .comment-button {
            width: 640px;

        }
    }
</style>

<main class="cart-main">
    <div class="order-title"> <h3>Детали заказа</h3></div>
    <div class="table-responsive">
        <ul class="cart">
            <?php
            if(!empty($_SESSION["shopping_cart"]))
            {
                $total = 0;
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                {
                    ?>
                    <div class="order-wrap">
                    <li class="item-cart">
                       <div class="product-name"><?php echo $values["item_name"]; ?></div>
                       <div class="product-quan">Количество: <?php echo $values["item_quantity"]; ?></div>
                       <div class="product-price">Стоимость: <?php echo $values["item_price"] . "РУб"; ?></div>
                       <div class="product-total">Общая стоимость: <?php echo number_format($values["item_quantity"] * $values["item_price"], 2) . "РУб"; ?></div>
                       <div class="delete-product"><a href="scripts/del_cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Удалить</span></a></div>

                    <?php
                     $total = $total + ($values["item_quantity"] * $values["item_price"]);
                }
                ?>
                </li>
                           <div class="product-total-bot">
                    <span class="total">Итого </span>
                   <?php echo number_format($total, 2) . "РУб"; ?>
                           </div>

                </div>


                <?php
            }
            ?>
            <input type="submit" name="submit" value="Оплатить" class="comment-button">
        </ul>



	</div>

    
    
    
</main>