<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$is_logged = FALSE;



$header = <<<_END_
     <head>
        <title>Барбершоп &laquo;Бородинский&raquo;</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="css/normalize.css" type="text/css" rel="stylesheet">
        <link href="css/style.css" type="text/css" rel="stylesheet">
        <link href="css/applyFormStyle.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700&amp;subset=cyrillic" rel="stylesheet">

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
        <img src="images/tablet-form-mock.svg" alt="" width="768" height="50"
                class="form-tablet-mock">
        <img src="images/desktop-apply-mock.svg" alt="1200" height="50"
             class="form-desktop-mock">
         </a>
           <nav class="main-nav main-nav-closed main-nav-nojs">
               <button class="main-nav-toggle" type="button">
                   <span class="visually-hidden">Открыть меню</span>
               </button>
                <div class="main-nav-wrapper">
                    <ul class="main-nav-list site-list">
                        <li class="list-site-item"><a href="index.php">Главная</a></li>
                        <li class="list-site-item"><a href="our_works.php">Наши работы</a></li>
                        <li class="list-site-item list-site-item-active"><a>Записаться</a></li>
                        <li class="list-site-item"><a href="#">Контакты            </a></li>
                        <li class="list-site-item"><a href="#">Магазин            </a></li>
                    </ul>
                    
                    
                    <ul class="main-nav-list user-list">
                        <li class="user-list-item">
                            <button class="list-item-login" type="button"
                                    onclick="openForm()">
                        <svg class="user-list user-list-icon" width="16" height="16"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                        <polygon points="0 7 7.01 7 7.01 4.06 10.96 8.01 7.01 11.91 7.01
                        9.06 0 9.02 0 7"/><polygon points="7.01 0 7.01 2 14.03
                        2 14.03 13.99 7.01 13.99 7.01 16 16 16 16 0 7.01 0"/>
                        </svg>
                        Войти</button>
                        </li>
                    </ul>
                </div>
                <!--MODAL-->
           
                <div  class="modal-window modal-closed" id="modalForm">
               <!--MODAL CONTENT-->
               <h1 class="modal-header">Личный кабинет</h1>
               <p class="modal-text">Введите свой логин и пароль, чтобы войти</p>
               <form action="index.php" class="modal-form" method="POST">
                   <div class="modal-container">
                       <div class="modal-login-wrap">
                       <input type="text" class="modal-name" name="Login" id="IdLogin"
                              autocomplete="username" required maxlength="25"
                              minlength="5" placeholder="Логин" pattern="[A-Za-z\s]+">
                       <img src="images/user_icon.svg" id="LogIcon" alt=""
                            class="modal-icon-login">
                       </div>
                       <div class="modal-pass-wrap">
                       <input type="password" class="modal-pass" name="password"
                              required minlength="6" maxlength="20"
                              placeholder="Пароль" title="Пароль от 6 до 20 символов">
                       <img src="images/pass_icon.svg" id="PassIcon" alt=""
                            class="modal-icon-pass">
                       </div>
                       
                       <div class="modal-bottom">
                       <label for="remember">
                       <input type="checkbox" class="modal-checkbox"
                              name="modal-remember" id="remember">
                       <span class="checkmark"></span> Запомните меня</label>
                       <a class="f-pass" href="#">Я забыл пароль!</a>
                       
                       <input  type="submit" value="Войти" name="submitForm"
                               class="modal-button-mobile">
                       <input  type="submit" value="Войти в личный кабинет"
                               name="submitForm"
                               class="modal-button">
                      
                       <button class="modal-close" title="Close window"
                               type="button" onclick="closeForm()">Закрыть</button>
                       </div>
                              
                       
                   </div>
               </form>
           </div>
           </nav>
           
          
           
        
           
           
       </header>  
_END_;

$ourWork_Header = <<<_END
        <head>
        <title>Барбершоп &laquo;Бородинский&raquo;</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="css/normalize.css" type="text/css" rel="stylesheet">
        <link href="css/style.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700&amp;subset=cyrillic" rel="stylesheet">

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
           <nav class="main-nav main-nav-closed main-nav-nojs">
               <button class="main-nav-toggle" type="button">
                   <span class="visually-hidden">Открыть меню</span>
               </button>
                <div class="main-nav-wrapper">
                    <ul class="main-nav-list site-list">
                        <li class="list-site-item"><a>Главная</a></li>
                        <li class="list-site-item list-site-item-active"><a>Наши работы </a></li>
                        <li class="list-site-item"><a href="applyForm.php">Записаться</a></li>
                        <li class="list-site-item"><a href="#">Контакты            </a></li>
                        <li class="list-site-item"><a href="#">Магазин            </a></li>
                    </ul>
                    
                    
                    <ul class="main-nav-list user-list">
                        <li class="user-list-item">
                            <button class="list-item-login" type="button"
                                    onclick="openForm()">
                        <svg class="user-list user-list-icon" width="16" height="16"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                        <polygon points="0 7 7.01 7 7.01 4.06 10.96 8.01 7.01 11.91 7.01
                        9.06 0 9.02 0 7"/><polygon points="7.01 0 7.01 2 14.03
                        2 14.03 13.99 7.01 13.99 7.01 16 16 16 16 0 7.01 0"/>
                        </svg>
                        Войти</button>
                        </li>
                    </ul>
                </div>
                <!--MODAL-->
           
                <div  class="modal-window modal-closed" id="modalForm">
               <!--MODAL CONTENT-->
               <h1 class="modal-header">Личный кабинет</h1>
               <p class="modal-text">Введите свой логин и пароль, чтобы войти</p>
               <form action="index.php" class="modal-form" method="POST">
                   <div class="modal-container">
                       <div class="modal-login-wrap">
                       <input type="text" class="modal-name" name="Login" id="IdLogin"
                              autocomplete="username" required maxlength="25"
                              minlength="5" placeholder="Логин" pattern="[A-Za-z\s]+">
                       <img src="images/user_icon.svg" id="LogIcon" alt=""
                            class="modal-icon-login">
                       </div>
                       <div class="modal-pass-wrap">
                       <input type="password" class="modal-pass" name="password"
                              required minlength="6" maxlength="20"
                              placeholder="Пароль" title="Пароль от 6 до 20 символов">
                       <img src="images/pass_icon.svg" id="PassIcon" alt=""
                            class="modal-icon-pass">
                       </div>
                       
                       <div class="modal-bottom">
                       <label for="remember">
                       <input type="checkbox" class="modal-checkbox"
                              name="modal-remember" id="remember">
                       <span class="checkmark"></span> Запомните меня</label>
                       <a class="f-pass" href="#">Я забыл пароль!</a>
                       
                       <input  type="submit" value="Войти" name="submitForm"
                               class="modal-button-mobile">
                       <input  type="submit" value="Войти в личный кабинет"
                               name="submitForm"
                               class="modal-button">
                      
                       <button class="modal-close" title="Close window"
                               type="button" onclick="closeForm()">Закрыть</button>
                       </div>
                              
                       
                   </div>
               </form>
           </div>
           </nav>
           
          
           
           
       </header>
        
_END;

$footer = <<<_END
        <footer class="main-page-footer">
            <section class="footer-adress">
                
                <div class="shop-adress">
                <h3 class="shop-name" >
                    Барбершоп Бородинский
                </h3>
                <p class="adress-text">
                    г. Санкт-Петербург, ул.Большая <br> Конюшенная 19/8
                </p>
                <b class="phone-number">+7 (812) 555-66-66</b>
                </div>
                
                <div class="social-container">
                    <span class="social-promo">Давайте дружить!</span>
                    <div class="social-item-container">
                    <a href="#"><div class="social-item social-item-vk">
                            <img src="images/vk-icon-big.png"
                         height="25" width="25" alt="vk icon"></div></a>
                    <a href="#"> <div class="social-item social-item-f">
                            <img src="images/facebook-icon-big.png"
                         height="39" width="19" alt="f icon"></div></a>
                    <a href="#"><div class="social-item social-item-insta">
                            <img src="images/insta-icon-big.png"
                         height="36" width="36" alt="instagramm icon"></div></a>
                </div>
                </div>
                <div class="developed-by">
                    <p class="developed-by-p">Разработано:</p>
                    <b class="developed-company">HTML ACADEMY</b>
                </div>
            
            </section>
        </footer>
        
_END;

$reg_form_header = <<<_EOD
        <!DOCTYPE html>
        <html lang="ru">
    <head>
        <title>Регистрация</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="css/normalize.css" type="text/css" rel="stylesheet">
        <link href="css/style.css" type="text/css" rel="stylesheet">
        <link href="css/applyFormStyle.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700&amp;subset=cyrillic" rel="stylesheet">

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
           <nav class="main-nav main-nav-closed main-nav-nojs">
               <button class="main-nav-toggle" type="button">
                   <span class="visually-hidden">Открыть меню</span>
               </button>
                <div class="main-nav-wrapper">
                    <ul class="main-nav-list site-list">
                        <li class="list-site-item"><a href="index.php">Главная</a></li>
                        <li class="list-site-item"><a href="our_works.php">Наши работы         </a></li>
                        <li class="list-site-item"><a href="applyForm.php">Записаться</a></li>
                        <li class="list-site-item"><a href="#">Контакты            </a></li>
                        <li class="list-site-item"><a href="#">Магазин            </a></li>
                        <li class="list-site-item list-site-item-active"><a>Регистрация            </a></li>
                        
                    </ul>
                    
                    
                    <ul class="main-nav-list user-list">
                        <li class="user-list-item">
                            <button class="list-item-login" type="button"
                                    onclick="openForm()">
                        <svg class="user-list user-list-icon" width="16" height="16"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                        <polygon points="0 7 7.01 7 7.01 4.06 10.96 8.01 7.01 11.91 7.01
                        9.06 0 9.02 0 7"/><polygon points="7.01 0 7.01 2 14.03
                        2 14.03 13.99 7.01 13.99 7.01 16 16 16 16 0 7.01 0"/>
                        </svg>
                        Войти</button>
                        </li>
                    </ul>
                </div>
                <!--MODAL-->
           
                <div  class="modal-window modal-closed" id="modalForm">
               <!--MODAL CONTENT-->
               <h1 class="modal-header">Личный кабинет</h1>
               <p class="modal-text">Введите свой логин и пароль, чтобы войти</p>
               <form action="index.php" class="modal-form" method="POST">
                   <div class="modal-container">
                       <div class="modal-login-wrap">
                       <input type="text" class="modal-name" name="Login" id="IdLogin"
                              autocomplete="username" required maxlength="25"
                              minlength="5" placeholder="Логин" pattern="[A-Za-z\s]+">
                       <img src="images/user_icon.svg" id="LogIcon" alt=""
                            class="modal-icon-login">
                       </div>
                       <div class="modal-pass-wrap">
                       <input type="password" class="modal-pass" name="password"
                              required minlength="6" maxlength="20"
                              placeholder="Пароль" title="Пароль от 6 до 20 символов">
                       <img src="images/pass_icon.svg" id="PassIcon" alt=""
                            class="modal-icon-pass">
                       </div>
                       
                       <div class="modal-bottom">
                       <label for="remember">
                       <input type="checkbox" class="modal-checkbox"
                              name="modal-remember" id="remember">
                       <span class="checkmark"></span> Запомните меня</label>
                       <a class="f-pass" href="#">Я забыл пароль!</a>
                       
                       
                       <input  type="submit" value="Войти" name="submitForm"
                               class="modal-button-mobile">
                       <input  type="submit" value="Войти в личный кабинет"
                               name="submitForm"
                               class="modal-button">
                      
                       <button class="modal-close" title="Close window"
                               type="button" onclick="closeForm()">Закрыть</button>
                       </div>
                              
                       
                   </div>
               </form>
           </div>
           </nav>
           
          
           
           
       </header>
        
_EOD;

$main_content = <<<_EOD
        
        <main>
        <form action="scripts/create_user.php" method="POST" class="apply-form" enctype="multipart/form-data">
                <fieldset class="form-top">
                    <div class="top-title-wrap">
                    <legend class="title-top">Регистрация</legend>
                    <a href="index.php" class="form-button-toindex">На главную</a>
                    </div>
                    
                    <div class="form-field-container">
                    <input type="text" maxlength="20" placeholder="Фамилия"
                           name="Apply_Last_Name" required class="form-field">
                    <input type="text" maxlength="20" placeholder="Имя"
                           name="Apply_First_name" class="form-field" required>
                    <input type="text" maxlength="20" placeholder="Логин"
                           name="login" class="form-field" required>
                    
                    </div>
                    
                    <div class="form-field-containerCon">
                    
                  
                    <input type="email" placeholder="e-mail"
                           class="form-field" name="Apply_Email" required>
        <input type="password" name="password" required class="form-field"
                           placeholder="Пароль">
                    <input type="password" name="rep_password" required class="form-field"
                           placeholder="Повторите пароль">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                    <label for="userPic">Загрузите свою фотографию на аватар!</label>
                    <input type="file" id="userPic" name="user_pic">
                    </div>
                    
                    
                
        
                <input type="submit" class="submit-button" value="Вступить в клуб">
                
            </fieldset>
        </form>
            </main>
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.2/less.min.js" ></script>
<script src='js/toggleScript.js'></script>
<script src="js/modalWindow.js"></script>
<script src="js/slider.js"></script>
        </body>
_EOD;


?>


