<?php

require_once 'scripts/database_connect.php';
include_once 'header.php';
include_once 'navigation.php';

$SQL = "SELECT * FROM products";
$result = $connection->query($SQL);

?>

<?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) { 
    
    $p_name = $row['name'];
    $p_pic  = $row['product_image'];
    $p_price = $row['price'];
    $p_type  = $row['type'];
    
    
    ?> 


                    <li>
                        <img src="<?php echo $p_pic; ?>" alt="" width="220" height="165">
                        <b><?php echo $p_name; ?></b>
                        
                        <span><?php echo $p_price ?>.</span>
                        <a href="#">Купить</a>
                    </li>
                    
                    
                    <?php } ?>