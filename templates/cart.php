<?php
include_once 'header.php';
include_once 'navigation.php';
require_once 'scripts/database_connect.php';
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
    <h2 class="cart-title">Ваша корзина</h2>
    <div class="cart-container">
	<div class="cart-table">
	  <table class="pure-table-horizontal">
	  	<tr>
	  		<th>Название товара</th>
	  		<th>Цена</th>
	  	</tr>
  	
<?php
$total = '';
$i=1;
 foreach ($cartitems as $key=>$id) {
	$sql = "SELECT * FROM products WHERE id = $id";
	$res=mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($res);
?>	  	
	<tr>
		
            <td><a href="scripts/del_cart.php?remove=<?php echo $key; ?>" class="cart--a">Удалить</a> <?php echo $row['name']; ?></td>
		<td><?php echo $row['price']; ?>  руб</td>
	</tr>
<?php 
	$total = $total + $row['price'];
	$i++; 
	} 
?>

	
<tr>
	<td><strong>Итого</strong></td>
	<td><strong><?php echo $total; ?> руб</strong></td>
	
</tr>
	  </table>
            <input type="submit" name="submit" value="Оплатить" class="comment-button">
	</div>
</div>
    
    
    
</main>