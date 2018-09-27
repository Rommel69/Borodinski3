<?php
require_once 'scripts/database_connect.php';
include_once 'header.php';
include_once 'navigation.php';
require_once 'scripts/user_actions.php';

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


if(count($_GET) > 0) {
    update_user($connection, $_REQUEST['user_id'], $_REQUEST['user_login'],
            $_REQUEST['user_name'], $_REQUEST['user_surname'], $_REQUEST['user_email']);
}

?>

<style>
    main {
	background-color: #353535;
	display: flex;
	flex-direction: column;
	align-items: center;
}

table {
    padding: 10px;
}

table td {
    padding: 20px;
    text-align: center;
}
</style>

<main>
    <h2 align="center">Все пользователи</h2>
    <a href="index.php?wizard">Назад</a>
    <div><?php if(isset($_SESSION['succ_msg'])) echo $_SESSION['succ_msg']; ?></div>
    <form action="" method="post">
    <table>
        <thead>
            
            <tr>
                <th>ID</th>
                <th>Логин</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Email</th>
                <th>Аватар</th>
                <th>Удалить пользователя</th>
            </tr>
        </thead>
        
         <?php
 $sql = "SELECT * FROM users order by user_id ASC";
 
 $result = $connection->query($sql);
 
 while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
     $user_id =         $row['user_id'];
     $user_login =      $row['user_login'];
     $user_name =       $row['user_name'];
     $user_surname =    $row['user_surname'];
     $user_email =      $row['user_email'];
     $user_pic =        $row['user_pick_path'];
     
 
 ?>
        
        <tr>
            <td><input type="text" name="user_id" value="<?php echo $user_id;        ?>"></td>
            <td><input type="text" name="user_login" value="<?php echo  $user_login;    ?>"></td>
            <td><input type="text" name="user_name" value="<?php echo $user_name;      ?>"></td>
            <td><input type="text" name="user_surname" value="<?php echo $user_surname;   ?>"></td>
            <td><input type="text" name="user_email" value="<?php echo $user_email;     ?>"></td>
            <td><img width="100" height="100" src="<?php echo $user_pic;       ?>"></td>
            <td><input type="submit" value="Изменить">
                <a href="scripts/delete_user.php?user_id=<?php echo $user_id; ?>">удалить</a></td>
            
        </tr>
 <?php } ?>
    </table>
        </form>
</main>

<!--<td><a href="../scripts/delete_user.php?id=<?php echo $user_id; ?>"><button>Удалить</button></a>
                <a href="index.php?wizard_usUp"><button>Редактировать</button></a></td>-->