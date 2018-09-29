<?php
session_start();
require_once 'scripts/app_config.php';
require_once 'scripts/database_connect.php';

include_once './templates/header.php';

if(isset($_GET['home']) && !isset($_SESSION['user_name'])) {
    include_once './templates/navigation.php';
    include_once './templates/home.php';
    
}

else if(isset($_GET['conditions']) && !isset($_SESSION['user_name'])) {
    include_once './templates/conditions.php';
}

else if(isset($_GET['conditions']) && isset($_SESSION['user_name'])) {
    include_once './templates/conditions.php';
}

else if (isset($_GET['order']) && !isset($_SESSION['user_name'])) {
    include_once './templates/order.php';
}

else if (isset($_GET['signup']) && !isset($_SESSION['user_name'])) {
    include_once './templates/signup.php';
}

else if (isset($_GET['conditions']) && !isset($_SESSION['user_name'])) {
    include_once './templates/conditions.php';
}

else if (isset($_GET['home']) && isset($_SESSION['user_name'])) {
    include_once './templates/navigation.php';
    include_once './templates/home.php';
}

else if (isset($_GET['order']) && isset($_SESSION['user_name'])) {
    include_once './templates/order.php';
}

else if (isset($_GET['user_profile']) && isset($_SESSION['user_name'])) {
    include_once './templates/user_profile.php';
}

else if (isset($_GET['wizard']) && $_SESSION['user_group'] == "1") {
    include_once './templates/wizard.php';
    
}
else if (isset($_GET['wizard_products']) && $_SESSION['user_group'] == "1") {
    include_once './templates/wizard_products.php';
    
}

else if (isset($_GET['wizard_users']) && $_SESSION['user_group'] == "1") {
    include_once './templates/wizard_users.php';
    
}

else if (isset($_GET['wizard_add_product']) && $_SESSION['user_group'] == "1") {
    include_once './templates/wizard_add_product.php';
    
}

else if (isset($_GET['wizard_orders']) && $_SESSION['user_group'] == "1") {
    include_once './templates/wizard_orders.php';
    
}

else if (isset($_GET['wizard_add_news']) && $_SESSION['user_group'] == "1") {
    include_once './templates/wizard_add_news.php';
    
}

else if (isset($_GET['wizard_create_news']) && $_SESSION['user_group'] == "1") {
    include_once './templates/wizard_create_news.php';
    
}

else if (isset($_GET['wizard_moder_comments']) && $_SESSION['user_group'] == "1") {
    include_once './templates/wizard_moder_comments.php';
    
}

else if (isset($_GET['show_all_news'])) {
    include_once './templates/show_all_news.php';
    
}



else if (isset($_GET['add_comment']) && isset($_SESSION['user_name'])) {
    include_once './templates/add_comment.php';
}

else if (isset($_GET['add_comment']) && !isset($_SESSION['user_name'])) {
    session_start();
    $_SESSION['msg_error'] = "Чтобы оставлять комментарии нужно зарегистрироваться!";
    
    include_once 'templates/conditions.php';
}

else if (isset($_GET['forgot_pass']) && !isset($_SESSION['user_name'])) {
    session_start();
    include_once 'templates/forgot_pass.php';
}

else if (isset($_GET['shop'])) {
    include_once './templates/shop.php';
    
}

else if (isset($_GET['cart'])) {
    include_once './templates/cart.php';
    
}




else {
    include_once './templates/navigation.php';
    include_once './templates/home.php';
}




include_once './templates/footer.php';

?>

