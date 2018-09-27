<?php
require_once 'scripts/database_connect.php';
include_once 'header.php';
include_once 'navigation.php';

$SQL = "SELECT
  user_reviews.text,
  users.user_id,
  users.user_name,
  users.user_surname,
  users.user_pick_path
FROM
  users
  INNER JOIN user_reviews ON user_reviews.user_id = users.user_id
  LIMIT 3";


$result = $connection->query($SQL);





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

?>

<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { 
    
    $user_name = $row['user_name'];
    $user_lastname = $row['user_surname'];
    $text = $row['text'];
    $avatar_path = $row['user_pick_path'];
    
    
    ?>
                <blockquote class="reviews-item review-item-active">
                   <p class="reviews-author-picture">
                       <img src="<?php echo $avatar_path; ?>" alt="<?php echo $user_name . $user_lastname; ?>"
                     width="80" height="80">
                   </p>
                   <cite class="reviews-author-name"><?php echo $user_name . " " . $user_lastname; ?></cite>
                   <p class="review-text">
                     <?php echo $text; ?>
                   </p>
                 </blockquote>

<?php } ?>