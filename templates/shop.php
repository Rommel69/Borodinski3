<?php
require_once 'scripts/database_connect.php';
include_once 'header.php';
include_once 'navigation.php';



/* 
 * Copyright (c) 2018, Predator
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 * * Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

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
                   <label><input type="checkbox" name="produced" value="AMERICAN-CREW"> American Crew</label>
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
               
                <ul class="goods-list">
                  <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) { 
    
    $p_name = $row['name'];
    $p_pic  = $row['product_image'];
    $p_price = $row['price'];
    $p_type  = $row['type'];
    $p_id    = $row['id'];
    
    
    ?> 


                    <li class="product-item">
                        <img src="<?php echo $p_pic; ?>" alt="" width="220" height="165">
                        <b><?php echo $p_name; ?></b>
                        <span><?php echo $p_price ?>.</span>
                        <a href="scripts/add_to_cart.php?id=<?php echo $p_id; ?>" class="product-buy">Купить</a>
                    </li>
                    
                    
                    <?php } ?>
                </ul>
                
                <div class="page-number">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                </div>
            </section>
            </div>
            </div>
        </main>


