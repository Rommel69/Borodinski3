<?php
require_once 'app_config.php';
require_once 'database_connect.php';



if(isset($_REQUEST['Login']) &&
   isset($_REQUEST['password'])) {
    
    $login = sanitizeString($_REQUEST['Login']);
    $password = sanitizeString($_REQUEST['password']);
    
    
    
    $sql = "SELECT * FROM users WHERE user_login='{$login}'";
    
    $result = $connection->query($sql);
    
    if(!$result) {
        header("Location: ../templates/conditions.php?message='{$connection->error}'");
    }
    
    if($result->num_rows) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        
        
    $salt1 = "no";
    $salt2 = "hackers";
    
    $token = hash('ripemd128', "$salt1$password$salt2");
    
    
    
//    $sql2 = "SELECT COUNT(*) FROM users u, groups g, user_groups ug
//            WHERE u.user_login = '{$login}'
//            AND g.name = 'Administraitors'
//            AND u.{$user_id} = ug.{$user_id}
//            AND g.group_id = ug.group_id";
//    $result2 = $connection->query($sql2);
    
    if($token == $row['user_password'] && $login == 'Admin') {
        session_start();
        setcookie("user_group", "1");
        $_SESSION['user_login'] = $login;
        $_SESSION['password']  = $row['user_password'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['user_surname'] = $row['user_surname'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_group'] = "1";
        header("Location: ../index.php?home");
    }
    
    if($token == $row['user_password'] && $login == $row['user_login']) {
        session_start();
        
        if(isset($_POST['remember'])) {
            $params = session_get_cookie_params();
            setcookie(session_name(), $_COOKIE[session_name()], time() + 60*60*24*30, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        }
        
        $_SESSION['user_login'] = $login;
        $_SESSION['password']  = $row['user_password'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['user_surname'] = $row['user_surname'];
        $_SESSION['user_id'] = $row['user_id'];
        
        
        
        
        header("Location: ../index.php?home");
    }
    
    
    else {
        session_start();
        $_SESSION['msg_error'] = "Неправильный логин или пароль!";
    header("Location: ../index.php?conditions");
}
    
        
    }
    
    else {
        session_start();
        $_SESSION['msg_error'] = "Неправильный логин или пароль!";
    header("Location: ../index.php?conditions");
}

}

