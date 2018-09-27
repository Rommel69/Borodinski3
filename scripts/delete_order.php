<?php

require_once 'database_connect.php';
session_start();

$sql = "DELETE FROM bids WHERE id = '{$_REQUEST['id']}'";
$result = $connection->query($sql);
$_SESSION["cond_message"] = "Запись удалена";

header("Location: ../index.php?wizard_orders");