<?php
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

function delete_user($id, $connection) {
    $query = "DELETE FROM users WHERE user_id = '{$id}'";
    do_query($connection, $query);
}

function update_user($connection, $id, $login, $user_name, $user_surname, $user_email) {
    $id = sanitizeString($id);
    $login = sanitizeString($login);
    $user_name = sanitizeString($user_name);
    $user_surname = sanitizeString($user_surname);
    $user_email = sanitizeString($user_email);
    
    $_SESSION['succ_msg'] = "База успешно обновлена!";
    
    $query = "UPDATE users SET user_login = '{$login}', user_name = '{$user_name}',"
    . " user_surname = '{$user_surname}', user_email = '{$user_email}' WHERE user_id = '{$id}'";
do_query($connection, $query);
}

function update_product ($connection, $id, $name, $type, $price, $description,
                         $amount, $in_stock, $produced_by, $product_image) {
   $id              = sanitizeString($id);
   $name            = sanitizeString($name);
   $type            = sanitizeString($type);
   $price           = sanitizeString($price);
   $description     = sanitizeString($description);
   $amount          = sanitizeString($amount);
   $in_stock        = sanitizeString($in_stock);
   $produced_by     = sanitizeString($produced_by);
   $product_image   = sanitizeString($product_image);
   
   
   
   $query = "UPDATE products SET name = '{$name}', type = '{$type}', price = '{$price}', "
   . "description = '{$description}', amount = '{$amount}', in_stock = '{$in_stock}', "
   . "produced_by = '{$produced_by}', product_image = '{$product_image}' WHERE id = '{$id}'";
   
   $result = $connection->query($query);
   if(!$result)die($connection->error);
   
}

function add_product($connection, $name, $type, $price, $description,
                         $amount, $in_stock, $produced_by, $product_image) {
   
   $name            = sanitizeString($name);
   $type            = sanitizeString($type);
   $price           = sanitizeString($price);
   $description     = sanitizeString($description);
   $amount          = sanitizeString($amount);
   $in_stock        = sanitizeString($in_stock);
   $produced_by     = sanitizeString($produced_by);
   $product_image   = sanitizeString($product_image);
   
   $_SESSION['succ_add_product'] = "Товар успешно добавлен!";
   
   $query = "INSERT INTO products(name, type, price, description, amount, in_stock, "
           . "produced_by, product_image) VALUES('{$name}', '{$type}', '{$price}',"
           . "'{$description}', '{$amount}', '{$in_stock}', '{$produced_by}', "
           . "'{$product_image}')";
           
   do_query($connection, $query);
   
}

function update_news ($connection, $id, $date, $text) {
    $id = sanitizeString($id);
    $date = sanitizeString($date);
    $text = sanitizeString($text);
    
    $query = "UPDATE news SET date = '{$date}', text = '{$text}' WHERE id = '{$id}';";
    
    do_query($connection, $query);
}

function add_news($connection, $date, $text, $current_day, $current_month) {
    $date = sanitizeString($date);
    $text = sanitizeString($text);
    $current_day = sanitizeString($current_day);
    $current_month = sanitizeString($current_month);
    
    
    $query = "INSERT INTO news (date, text, day, month) VALUES('{$date}', '{$text}', '{$current_day}', '{$current_month}')";
    do_query($connection, $query);
}




function do_query($connection,$query) {
    $result = $connection->query($query);
    if(!$result) die($connection->error);
return $result;
}