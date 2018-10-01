<?php
require_once 'scripts/database_connect.php';
include_once 'header.php';
include_once 'navigation.php';




$SQL = "SELECT * FROM products";
$result = $connection->query($SQL);

if(count($_POST['product_g']) > 0) {
$type = $_POST['product_g'];
$SQL = "SELECT * FROM PRODUCTS WHERE type LIKE '{$type}'";
$result = $connection->query($SQL);
}

if (count($_POST['product_g'] > 0) && $_POST['produced'] ) {
    
    $type = $_POST['product_g'];
    $produced_by = $_POST['produced'];
    
    $SQL = "SELECT * FROM products WHERE  type LIKE '{$type}' AND produced_by LIKE '{$produced_by}'";
    $result = $connection->query($SQL);
    if(!$result)die ($connection->error);
}

if ($_POST['produced']) {
    $produced_by = $_POST['produced'];
    
    $SQL = "SELECT * FROM products WHERE produced_by LIKE '{$produced_by}'";
    $result = $connection->query($SQL);
    if(!$result)die($connection->error);
}


if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
}
?>




<style>
    main {
	
	display: flex;
        width: 320px;
        margin: 0 auto;
        color: black;
        background-color: #f8f5f2;
}

fieldset {
	border: none;
	padding: 0;
	margin: 0;
	display: flex;
	flex-direction: column;
}

.goods-list {
	list-style: none;
	padding: 0;
	margin: 0;
	display: flex;
	flex-direction: column;
        margin-top: 50px;
        margin-left: 10px;
        margin-bottom: 50px;
}

a {
    text-decoration: none;
    color: white;
}

.product-buy {
    width: 10px;
    height: 10px;
    background-color: black;
}

span {
	width: 10px;
	height: 10px;
	background-color: gray;
        padding-left: 10px;
        padding-right: 10px;
}

.checkmark {
    width: 10px;
}
.product-item {
    background-color: white;
    padding-left: 10px;
    padding-right: 10px;
    margin-bottom: 20px;
    width: 155px;
}

form {
    display: flex;
    flex-direction: column;
}

.checkbox-list {
    margin-bottom: 50px;
    margin-top: 50px;
}

label {
    margin-bottom: 10px;
}

.page-number a {
    color: black;
}

.content-wrapper {
    display: flex;
}

@media (min-width: 768px) {
    main {
        width: auto;
    }
    
    .goods-list {
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    
    .product-item {
        margin-left: 15px;
    }
    
    .content-wrapper {
	display: flex;
	margin: 0 auto;
	width: 768px;
    }
}

@media (min-width: 1200px) {
    main {
        width: auto;
    }
    .content-wrapper {
        width: 960px;
        margin: 0 auto;
        display: flex;
    }
}
</style>

<main>
    <div class="content-wrapper">
    <aside class="goods-filter">
                <form action="?shop" method="post" enctype="multipart/form-data">
                <fieldset class="checkbox-list">
                   <legend class="filter-title">Производители:</legend>
                   <label><input type="checkbox" name="produced" value="BAXTER OF CALIFORNIA"> Baxter of California</label>
                   <label><input type="checkbox" name="produced" value="MR-NATTY"> Mr Natty</label>
                   <label><input type="checkbox" name="produced" value="SUAVECITO"> Suavecito</label>
                   <label><input type="checkbox" name="produced" value="MALIN-GOETZ"> Malin-goetz</label>
                   <label><input type="checkbox" name="produced" value="MURRAYS"> Murray's</label>
                   <label><input type="checkbox" name="produced" value="AMERICAN CREW"> American Crew</label>
                </fieldset>
                
                <fieldset class="goods-group">
                    <legend class="filter-title">Группы товаров:</legend>
                    <label for="razors">Бритвенные наборы <input type="radio" class="product_g" name="product_g" id="razors" value="Бритвенные принадлежности"></label>
                    
                    <label for="shampoo">Средства для ухода <input type="radio" class="product_g" name="product_g" id="shampoo" value="Средства для ухода"></label>
                    
                    <label for="additional">Аксессуары <input type="radio" class="product_g" name="product_g" id="additional" value="Аксессуары"></label>
                    
                    
                </fieldset>
                    <input class="left-menu-btn" type="submit" name="show-goods" value="Показать">
                </form>
                
                
            </aside>
            
            
            <div class="container clearfix">
            <section class="goods-container">
<?php
                $result = mysqli_query($connection, $SQL);
                if(mysqli_num_rows($result) > 0)
                {
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <div class="col-md-4">
                    <form method="post" action="scripts/add_to_cart.php?action=add&id=<?php echo $row["id"]; ?>">
                        <div class="product-wrap">
                            <img src="<?php echo $row["product_image"]; ?>" alt=" " width="250" height="250" class="img-responsive" /><br />
                            <h4 class="text-info"><?php echo $row["name"]; ?></h4>
                            <h4 class="text-danger"> <?php echo $row["price"]; ?>РУБ</h4>
                            <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                            <input type="hidden" name="hidden_type" value="<?php echo $row["type"]; ?>" />
                            <input type="hidden" name="hidden_made" value="<?php echo $row["produced_by"]; ?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Добавить в корзину" />
                        </div>
                    </form>
                </div>
                <?php
                     }
                }
                ?>


            </section>
            </div>
            </div>
        </main>


