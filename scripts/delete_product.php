<?php
require_once 'database_connect.php';
$sql = "DELETE FROM products WHERE id = '" . $_GET['id'] . "'";
$result = $connection->query($sql);
$_SESSION['succ_prod_msg'] = "Продукт удалён";
header("Location: ../index.php?wizard_products");
?>