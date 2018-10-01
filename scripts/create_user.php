<?php
session_start();
require_once 'app_config.php';
require_once 'database_connect.php';
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



$default_pic_path = "../user_pics/default_userpic.jpg";
$user_dir_pic = "../user_pics/default_userpic.jpg";

    

if(isset($_REQUEST['Apply_Last_Name']) &&
   isset($_REQUEST['Apply_First_Name']) &&
   isset($_REQUEST['Apply_Login']) &&
   isset($_REQUEST['Apply_Email']) &&
   isset($_REQUEST['Apply_Password']) &&
   isset($_REQUEST['Apply_Repeat'])) {
    
    
    
    
    $last_name = sanitizeString($_REQUEST['Apply_Last_Name']);
    $first_name = sanitizeString($_REQUEST['Apply_First_Name']);
    $login = sanitizeString($_REQUEST['Apply_Login']);
    $email = sanitizeString($_REQUEST['Apply_Email']);
    $password = sanitizeString($_REQUEST['Apply_Password']);
    $repeat_password = sanitizeString($_REQUEST['Apply_Repeat']);
    
    if($password != $repeat_password) {
        $_SESSION['reg_err_msg'] = "Пароли не совпадают!";
        header("Location: ../index.php?signup");
        exit();
    }
    
    $sql = "SELECT * FROM users WHERE user_login = '{$login}' OR user_email = '{$email}'";
    
    $result = $connection->query($sql);
    if($result){
        $rows = $result->num_rows;
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $user_login = $row['user_login'];
        $user_email = $row['user_email'];
        
        if($login === $user_login || $user_email === $email)
        {
            $_SESSION['msg_error'] = "Пользователь с таким именем или email адрессом уже существует!";
        header("Location: ../index.php?conditions.php");
        
        
        }
    
    
    else {
    
    $salt1 = "no";
    $salt2 = "hackers";
    
    $token = hash('ripemd128', "$salt1$password$salt2");
    
    $sql = "INSERT INTO users (user_login, user_password, user_name, user_surname,
            user_email, user_pick_path)
            VALUES('{$login}', '{$token}', '{$first_name}', '{$last_name}',
                  '{$email}', '{$user_dir_pic}')";
    
    $result = $connection->query($sql);
    $last_id = $connection->insert_id;
    $sql2= "INSERT INTO user_groups (id, group_id) VALUES('{$last_id}', '2')";
    
    
    $result2 = $connection->query($sql2);
    $connection->close();
    
    if($result && $result2) {
        $_SESSION['msg_error'] = "Регистрация прошла успешно!";
     header("Location: ../index.php?conditions");
    exit();
    }
    if(!$result && !$result2) {
       $_SESSION['msg_error'] = "Во время регистрации произошла ошибка!" . $connection->error;
        header("Location: ../index.php?conditions.php");
        
    }
    
    }
   
    }
}