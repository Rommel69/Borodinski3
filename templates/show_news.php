<?php

require_once 'scripts/database_connect.php';

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


$SQL = "SELECT * FROM news ORDER BY id DESC LIMIT 3";

$result = $connection->query($SQL);

if(!$result)die($connection->error);


while($row = $result->fetch_array(MYSQLI_ASSOC) ) {
    $text  = $row['text'];
    $date  = $row['date'];
    $day   = $row['day'];
    $month = $row['month'];
    $article_id = $row['id'];
?>

<li class="news-list-item">
                       <a href="index.php?selected_news&article_id=<?php echo $article_id?> ">
                       <div class="date-sector">
                           
                           <b class="date-day"><?php echo $day; ?></b>
                           <b class="date-month"><?php echo $month; ?></b>
                       </div>

                       <p>
                           <?php echo $text; ?>
                       </p>
                       </a>
</li>

<?php } ?>
