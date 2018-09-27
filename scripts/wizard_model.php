<?php
require_once 'app_config.php';
require_once 'database_connect.php';


$sql = "SELECT COUNT(user_id) FROM users";

$result = $connection->query($sql);

if($result) {
    $row = $result->fetch_array(MYSQLI_NUM);
    $user_quantity = $row[0];
}

?>