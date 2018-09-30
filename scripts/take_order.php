<?php
/**
 * Created by PhpStorm.
 * User: Predator
 * Date: 9/30/18
 * Time: 16:41
 */

require_once 'database_connect.php';


if(isset($_REQUEST['Apply_Last_Name']) &&
    isset($_REQUEST['Apply_First_Name']) &&
    isset($_REQUEST['Apply_Midlle_Name']) &&
    isset($_REQUEST['Apply_Email']) &&
    isset($_REQUEST['mobile']) &&
    isset($_REQUEST['beard']))
{

    $last_name = $_REQUEST['Apply_Last_Name'];
    $first_name = $_REQUEST['Apply_First_Name'];
    $middle_name = $_REQUEST['Apply_Midlle_Name'];
    $email_adress = $_REQUEST['Apply_Email'];
    $phone = $_REQUEST['mobile'];
    $beard_type = $_REQUEST['beard'];
    $description = $_REQUEST['Add_Info'];
    $date = date("d M");
    $add_servise = $_POST['service-selection'];


    $sql = "INSERT INTO bids (last_name, first_name, middle_name, phone, email, "
        . "description, beard_type, date, add_service) VALUES('{$last_name}', '{$first_name}', "
        . "'{$middle_name}', '{$phone}', '{$email_adress}', '{$description}',"
        . "'{$beard_type}', '{$date}', '{$add_servise}')";

    $result = $connection->query($sql);

    if(!$result) die($connection->error);

    $message = "Заявка отправлена!";
    header("HTTP/1.1 301 Moved Permamentrly");
    header("Location: ../index.php?order");
}

else {
    $message = "Пожалуйста заполните все поля!";
}
