<?php
require_once 'database_connect.php';
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

function do_query($connection,$query) {
    $result = $connection->query($query);
    if(!$result) die($connection->error);
return $result;
}