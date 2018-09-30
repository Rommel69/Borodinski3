<?php

include_once 'header.php';
include_once 'navigation.php';
require_once 'scripts/database_connect.php';

?>

<style>
    form {
        display: flex;
        flex-direction: column;
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

table {
    width: 1200px;
}
</style>

<main>
    <h2>Заказы</h2>
    <a href="index.php?wizard">Главное меню</a>
    <div><?php if(isset($_SESSION['cond_message'])) echo $_SESSION['cond_message']; ?></div>
    <form name="orders" method="POST" action="">
        <table class="pure-table pure-table-bordered">
            <thead>
            <th>Номер Заказа        </th>
            <th>Фамилия:            </th>
            <th>Имя:                </th>
            <th>Отчество:           </th>
            <th>Номер телефона:     </th>
            <th>Email адрес:        </th>
            <th>Доп.Инфо            </th>
            <th>Тип желаемой бороды </th>
            <th>Дата                </th>
            <th>Доп.Услуга          </th>
            <th>Удалить             </th>
            
            </thead>
            <?php
            
            $sql = "SELECT * FROM bids";
            
            $result = $connection->query($sql);
            
            if(!$result)die($connection->error);
            
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            
                $order_id       =   $row['id'];
                $last_name      =   $row['last_name'];
                $first_name     =   $row['first_name'];
                $middle_name    =   $row['middle_name'];
                $phone          =   $row['phone'];
                $email          =   $row['email'];
                $add_info       =   $row['description'];
                $beard_type     =   $row['beard_type'];
                $date           =   $row['date'];
                $add_servise    =   $row['add_service'];
                
            ?>
            <tbody>
                <tr>
                    <td><input type="text" name="id" value="<?php echo $order_id;?>"></td>
                    <td><input type="text" name="last_name" value="<?php echo $last_name;?>"></td>
                    <td><input type="text" name="first_name" value="<?php echo $first_name ;?>"></td>
                    <td><input type="text" name="middle_name" value="<?php echo $middle_name;?>"></td>
                    <td><input type="text" name="mobile" value="<?php echo $phone;?>"></td>
                    <td><input type="text" name="email" value="<?php echo $email ;?>"></td>
                    <td><?php echo $add_info; ?></td>
                    <td><input type="text" name="beard_type" value="<?php echo $beard_type ;?>"></td>
                    <td><input type="text" name="date" value="<?php echo $date;?>"></td>
                    <td><input type="text" name="add_service" value="<?php echo $add_servise;?>"></td>
                    <td><a href="scripts/delete_order.php?id=<?php echo $order_id; ?>">Удалить</a></td>

                </tr>
            </tbody>
            <?php } ?>
        </table>
    </form>
</main>

