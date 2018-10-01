<?php





?>

<!DOCTYPE html>



<html lang="ru">
    <head>
        
        <title><?php if(isset($_GET['signup']))  echo "Регистрация"; 
                     if(isset($_GET['shop']))    echo "Магазин";
                     if(isset($_GET['order']))   echo "Записаться";
                     if(isset($_GET['cart']))    echo "Корзина";
                     if(isset($_GET['home']))    echo "Главная"; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
       
        <?php if(isset($_GET['order']) || isset($_GET['signup'])) 
            {          echo '<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">';                  echo '<link href="../css/normalize.css" type="text/css" rel="stylesheet">';
                                         echo '<link href="css/style.css" type="text/css" rel="stylesheet">';
                                         echo '<link href="css/applyFormStyle.css" type="text/css" rel="stylesheet">';
                                         echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';}
               else {               echo '<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">';     echo '<link href="../css/normalize.css" type="text/css" rel="stylesheet">';
                                         echo '<link href="css/style.css" type="text/css" rel="stylesheet">';
                                         echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';}?>
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700&amp;subset=cyrillic" rel="stylesheet">
        <?php if(isset($_GET['wizard']) && $_SESSION['user_group'] == '1')
            echo '<link href="templates/style.css" type="text/css" rel="stylesheet">'; ?>

    </head>
    <body>
        
        

       <header class="main-header">
         <a class="main-header-logo">
         <picture>
            <source media="(min-width: 1200px)" srcset="images/logotype-desktop.svg">
            <source media="(min-width: 768px)" srcset="images/logotype-tablet.svg">
             <img class="page-header-logo-image" alt="Барбершоп Бородинский"
           width="226" height="30" src="images/logotype-mobile.svg">
         </picture>
         </a>
           


