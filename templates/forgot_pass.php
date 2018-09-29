<?php
require_once 'scripts/database_connect.php';
include_once 'header.php';
include_once 'navigation.php';


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
 $cond_msg = "";
if(isset($_POST['forgot_login'])) {
    $user_login = sanitizeString($_POST['forgot_login']);
    $SQL = "SELECT * FROM users WHERE user_login = '{$user_login}'";
    $result = $connection->query($SQL);
    
    if(!$result)die($connection->error);
    
    if($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $to = $row['user_email'];
        
        $subject = "Смена пароля";
        
        $new_password = rand(10000, 100000);
        $message = "Вы запросили восстановление пароля для своего аккаунта "
                . "ваш новый пароль: " . $new_password . "если вы не запрашивали "
                . "восстановление пароля обратитесь к администратору.";
        $headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        $salt1 = "no";
        $salt2 = "hackers";
        
        $token = hash('ripemd128', "$salt1$new_password$salt2");
        
        $SQL = "UPDATE users SET user_password = '{$token}' WHERE user_login= '$user_login'";
        $result = $connection->query($SQL);
        if(!$result)die($connection->error);
        
        mail($to, $subject, $message, $headers);
        $cond_msg = "Письмо с новый паролем успешно отправлено вам на электронную почту.";
        header("Location: forgot_pass");
        
        
        
    }
    else {
        $cond_msg = "Пользователя с таким логином не существует!";
        header("Location: index.php?forgot_pass");
        
    }
    
}






?>


<main class="main-comments">
    <h2 class="cart-title">Восстановление пароля</h2>
    <p class="cond-msg"><?php echo $cond_msg; ?></p>
    
    <form method="post" class="forgot-form" action="?forgot_pass">
        <label for="forgot">Для восстановления пароля введите свой Логин
        </label>
        <input type="text" name="forgot_login" id="forgot">
        <input type="submit" name="submit" value="Восстановить пароль" class="forgot-button">
    </form>
</main>


<?php include_once 'footer.php'; ?>