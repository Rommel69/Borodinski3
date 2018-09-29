<?php
header("Refresh: 5; url=../index.php?home");
include_once 'header.php';
include_once 'navigation.php';

$message = $_SESSION['msg_error'];
?>

<main class="main-cond">
    <h2 class="cond-msg"><?php echo $message;
         ?></h2>
</main>


<?php include_once 'footer.php'; ?>