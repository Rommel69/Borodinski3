<?php
require_once 'database_connect.php';
session_start();


$target_dir = "../user_pics/";
$target_file =  $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));





if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== FALSE) {
       
        $uploadOk = 1;
    }
    else {
        
        $uploadOk = 0;
        header("Location:../index.php?user_profile");
    }
}


//check file size
if($_FILES["fileToUpload"]["size"] > 1000000) {
   
    $uploadOk = 0;
    header("Location:../index.php?user_profile");
}

//allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png"  && $imageFileType != "gif") {
    
    $uploadOk = 0;
    header("Location:../index.php?user_profile");
}

//check if $uploadOk is set to 0 by an error
if($uploadOk == 0) {
    header("Location:../index.php?user_profile");
    
     
}



//if everything is ok, try to upload file
else {
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        $user_id = $_SESSION['user_id'];
        
        $name_direct = $target_dir . basename( $_FILES["fileToUpload"]["name"]);
        
        $_SESSION['msg'] = "";
        $sql = "UPDATE users SET user_pick_path = '{$name_direct}' WHERE user_id ='{$user_id}'";
        $result = $connection->query($sql);
        
        if($result) {
            $_SESSION['msg'] = "Аватар обновлён!";
            header("Location:../index.php?user_profile");
        }
        echo "The file " . basename($_FILES["fileToUpload"]["name"]). " has been uploaded";
    }
    else {
        $_SESSION['msg'] =  "Sorry, there was an error uploading your file.";
    }
}