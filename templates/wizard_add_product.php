<?php
include_once 'header.php';
include_once 'navigation.php';
require_once 'scripts/user_actions.php';
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


if(count($_POST) > 0) {
    $target_dir = "product_pics/default_product.png";
    $target_file =  $target_dir . basename($_FILES["product_image_add"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $tmp_name = $_FILES["product_image_add"]["tmp_name"];
    move_uploaded_file($tmp_name, $target_file);
    
    $name                = $_POST['name_add'];
    $type                = $_POST['type_add'];
    $price               = $_POST['price_add'];
    $description         = $_POST['description_add'];
    $amount              = $_POST['amount_add'];
    $in_stock            = $_POST['in_stock_add'];
    $produced_by         = $_POST['produced_by_add'];
    $product_image       = $target_file . $_POST['product_image_add'];
    
    
    
    if($in_stock == "В наличии") {
        $in_stock = 1;
    }
    else {
    $in_stock = 0;    
    }
    
    
     add_product($connection, $name, $type, $price, $description, $amount, $in_stock, $produced_by, $product_image);
    
    
}

?>
<style>
    form {
        display: flex;
        flex-direction: column;
        align-items: end;
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
    <div><?php  if(isset($_SESSION['succ_add_product'])) echo $_SESSION['succ_add_product']; ?></div>
    <form action="" method="post" enctype="multipart/form-data" class="pure-form pure-form-aligned">
        <label> Название товара:
            <input type="text" name="name_add"/>
        </label>
        <label> Тип товара:
            <select name="type_add">
                <option value="Средства для ухода">Средства для ухода</option>
                <option value="Бритвенные принадлежности">Бритвенные принадлежности</option>
                <option value="Аксессуары">Аксессуары</option>
            </select>
        </label>
        <label> Цена товара:
            <input type="text" name="price_add"  />
        </label>
        <label> Описание товара:<br>
            <textarea rows="4" cols="25" name="description_add"></textarea>
        </label>
        <label> Количество на складе:
            <input type="text" name="amount_add" value="0" />
        </label>
        <label> В наличии(Нет/В наличии):
            <input type="text" name="in_stock_add" />
        </label>
        <label> Имя производителя:
            <select name="produced_by_add">
                <option value="BAXTER OF CALIFORNIA">BAXTER OF CALIFORNIA</option>
                <option value="SUAVECITO">SUAVECITO</option>
                <option value="MR NATTY">MR NATTY</option>
                <option value="MALIN-GOETZ">MALIN-GOETZ</option>
                <option value="MURRAYS">MURRAY'S</option>
                <option value="AMERICAN CREW">AMERICAN CREW</option>
            </select>
        </label>
        <label> Изображение товара:
            <input type="file" name="product_image_add"  />
        </label>
        <input type="submit" value="Отправить" name="add_product">
    </form>
    
    
    
</main>