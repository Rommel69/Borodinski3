<?php

require_once 'database_connect.php';

$sql = "DELETE FROM users WHERE user_id = '" . $_GET['user_id'] . "'";
$result = $connection->query($sql);
header("Location: ../index.php?wizard_users");