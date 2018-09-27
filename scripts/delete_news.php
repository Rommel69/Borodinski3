<?php


require_once 'database_connect.php';
$sql = "DELETE FROM news WHERE id = '" . $_GET['id'] . "'";
$result = $connection->query($sql);
header("Location: ../index.php?wizard_add_news");
?>