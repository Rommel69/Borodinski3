<?php

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

$db_hostName = 'localhost';
$db_login = 'Wlad';
$db_password = 'BoomBoomSatellites';
$db_database = 'Borodinski_DataBase';



define("DEBUG_MODE_ON", FALSE);

if(DEBUG_MODE_ON) {
    error_reporting(E_ALL);
}
else {
    error_reporting(0);
}

function debug_print($message) {
    if(DEBUG_MODE_ON) {
        echo $message;
    }
}



function mysql_fix_string($conn, $string) {
    if(get_magic_quotes_gpc()) {
        $string = stripcslashes($string);
        return $conn->real_escape_string($string);
    }
}

function mysql_entities_fix_string($conn, $string) {
    return htmlentities(mysql_fix_string($conn, $string));
}

function sanitizeString($var) {
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}

function sanitizeMySQL($link, $var) {
    $var = $link.mysqli_real_escape_string($var);
    $var.sanitizeString($var);
    return $var;
    
}


function createTable($name, $query) {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Таблица '$name' создана или уже существовала<br>";
}

function queryMysql($query) {
    global $connection;
    $result = $connection->query($query);
    if(!$result) die($connection->error);
    return $result;
}

function destroySession() {
    $_SESSION=array();
    
    if(session_id() != "" || isset($_COOKIE[session_name()])) {
        setcookie(session_name(),'', time()-2592000, '/');
        
        session_destroy();
    }
}

function showProfile($user_id) {
    if(file_exists(("$user_id.jpg"))) {
        echo "<img src='$user_id.jpg'>";
    }
    
    $result = queryMysql("SELECT * FROM users WHERE user_id='$user_id'");
    
if($result->num_rows) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo stripslashes($row['user_id']);
}
}