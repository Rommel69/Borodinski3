<?php
require_once 'scripts/app_config.php';
require_once 'scripts/database_connect.php';
require_once 'scripts/change_avatar.php';
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
$pic_dir = $_SESSION['avatar_path'];

if(isset($_SESSION['user_name'])) {
    
    $user_id = $_SESSION['user_id'];
    
    $sql = "SELECT * FROM users WHERE user_id = $user_id";
    
    $result = $connection->query($sql);
    
    if(!$result) die(header("Location: conditions.php?message=Неудалось подключится к базе данных!"));
    
    if($result) {
        $rows = $result->num_rows;
        $row = $result->fetch_array(MYSQLI_ASSOC);
        
        $user_name = $row['user_name'];
        $user_surname = $row['user_surname'];
        $user_pic_path = $row['user_pick_path'];
    }
    
    else {
        die(header("Location: conditions.php?message=User with '$user_id' ID does not exist!"));
    }
    
    
}
?>

<?php
include_once 'header.php';
include_once 'navigation.php';
?>

<main class="user-profile-main">
    <div class="user-profile-wrapper">
        <a href="index.php?home">На главную</a>
    <h3>Профиль пользователя <?php echo "$user_name" ." ". "$user_surname"; ?></h3>
    <img src="<?php echo $user_pic_path ?>" height="50" width="50" alt="" class="profile-pic">
    <form action="../scripts/change_avatar.php" method="post" enctype="multipart/form-data">
        
        <label for="change">Сменить аватар</label>
        <input id="change" name="fileToUpload" type="file">
        <input type="submit" value="Загрузить" name="submit" class="pure-button">
    </form>
    <div class="succes-upload"><?php $is_uploaded = $_SESSION['msg']; echo $is_uploaded; ?></div>
    </div>
</main>

<?php include_once 'footer.php'; ?>