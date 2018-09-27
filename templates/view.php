<?php
session_start();
require_once 'app_config.php';
require_once 'database_connect.php';

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

if(!isset($_SESSION['user_id'])) {
    
    $is_logged = FALSE;
    
    
    display_header('Барбершоп &laquo;Бородинский&raquo;');
    display_body();
    display_footer();
    
}

else {
    display_for_user_header('Main');
}



function display_header($title) {
    
    echo <<<_EOD
 <!DOCTYPE html>



<html lang="ru">
    <head>
        <title>$title</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="css/normalize.css" type="text/css" rel="stylesheet">
        <link href="css/style.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700&amp;subset=cyrillic" rel="stylesheet">

    </head>
    <body>
        
        <?php require_once './models/news.php';
              require_once './database.php';      ?>

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
                        <li class="list-site-item list-site-item-active"><a>Главная</a></li>
                        <li class="list-site-item"><a href="our_works.php">Наши работы         </a></li>
                        <li class="list-site-item"><a href="applyForm.php">Записаться</a></li>
                        <li class="list-site-item"><a href="#">Контакты            </a></li>
                        <li class="list-site-item"><a href="#">Магазин            </a></li>
                        <li class="list-site-item"><a href="../signup_form.php">Регистрация            </a></li>
                        
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
               <form action="scripts/authorization.php" class="modal-form" method="POST">
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
} 
function  display_body() {
    echo <<<_EOD
 <main>
         <h1 class="visually-hidden">Барбершоп «Бородинский» – истинно мужская классика</h1>
           
           
           <section class="stats">
               <header class="stats-header">
                   <h2 class="visually-hidden">Статистика Барбершопа</h2>
                   <b class="stats-slogan">Стрижка у нас<br> это выгодно!</b>
                   <p class="stats-intro">
                       Мужская стрижка требует точного подхода. Обратимся к статистике:
                   </p>
                   <small class="stats-legend stats-legend-top">
                       <sup>*</sup> - приведённые данные ложь
                   </small>
               </header>
               <table class="stats-list">
                   <tr>
                       <td class="stats-value">
                           1 500 <sup>*</sup>
                       </td>
                       <td class="stats-field">
                           рублей <br> вложений
                       </td>
                   </tr>
                   
                   <tr>
                       <td class="stats-value">
                           7 200
                       </td>
                       <td class="stats-field">
                           секунд времени мастера
                       </td>
                   </tr>
                   
                   <tr>
                       <td class="stats-value">
                           90 000
                       </td>
                       <td class="stats-field">
                           постриженных волос
                       </td>
                   </tr>
                   
                   <tr>
                       <td class="stats-value">
                           500 000 
                       </td>
                       <td class="stats-field">
                           лайков и комплиментов
                       </td>
                   </tr>
               </table>
               <small class="stats-legend stats-legend-bottom">
                   <sup>*</sup> приведённые данные ложь
               </small>
           </section>

           <section class="articles">
             
             
             <div class="articles-wrapper-slider">
                 <h2 class="visually-hidden">Наши преймущества</h2>
                 <ul class="articles-list slider-list">
                     <li class="articles-item articles-item-fast slider-item slider-item-active">
                         <img class="articles-item-icon"
                              src="images/advantage-1-illustration-Fast.svg"
                              height="95" width="95" alt="Advertise icon">
                              
                         <h3 class="articles-title">Быстро</h3>
                           <p class="articles-description">
                               Мы делаем свою работу быстро!
                               Два часа пролетят незаметно
                               и Вы - счастливый обладатель
                               стильной стрижки-минутки
                           </p>
                     </li>
                     <li class="articles-item articles-item-cool slider-item slider-item-notActive">
                         <img class="articles-item-icon"
                              src="images/advantage-2-illustration-Cool.svg"
                              height="95" width="95" alt="Advertise icon">
                         <h3 class="articles-title">Круто</h3>
                           <p class="articles-description">
                               Забудьте, как вы стриглись
                               раньше. Мы сделаем из вас
                               звезду футбола или кино.
                               Во всяком случае внешне.
                           </p>
                     </li>
                     <li class="articles-item articles-item-expensive slider-item slider-item-notActive">
                         <img class="articles-item-icon"
                              src="images/advantage-3-illustration-Expensive.svg"
                              height="95" width="95" alt="Advertise icon">
                         <h3 class="articles-title">Дорого</h3>
                           <p class="articles-description">
                               Наши мастера - профессионалы
                               своего дела и не могут стоить
                               дешёво. К тому же, разве цена
                               не даёт определённый статус?
                           </p>
                     </li>
                 </ul>
                 <p class="articles-toggles slider-toggles">
<!--                     <button class="slider-toggle">1</button>
                     <button class="slider-toggle">2</button>
                     <button class="slider-toggle">3</button>-->
                     <span class="slider-toggle slider-toggle-active"
                           onclick="currentSlide(1)"></span>
                     <span class="slider-toggle slider-toggle-notActive"
                           onclick="currentSlide(2)"></span>
                     <span class="slider-toggle slider-toggle-notActive"
                           onclick="currentSlide(3)"></span>
                 </p>
             </div>
             
               
               <img class="news-mock-tablet" src="images/news-sector-mock-tablet.svg"
                    alt="" height="50" width="768">
               <img class="news-mock-desktop"
                    src="images/news-sector-mock-desktop.svg"
                    alt="" width="1200" height="50">
               <img class="news-mock" src="images/news-sector-mock.svg"
                    width="320" height="34" alt="">  
               
               
           </section>
         <section class="bottom-part-background">
           <section class="news-section">
               <h2 class="news-promo">Новости и акции</h2>
               <a href="#" class="show-news-button">Показать Все</a>
               <ul class="news-list">
                   <li class="news-list-item">
                       <a href="#">
                       <div class="date-sector">
                           
                           <b class="date-day">29</b>
                           <b class="date-month">сен</b>
                       </div>

                       <p>
                           Нам наконец завезли
                           Ягермайстер! Теперь вы можете
                           пропустить стаканчик во время
                           стрижки.
                       </p>
                       </a>
                   </li>
                   
                   <li class="news-list-item">
                       <a href="#">
                       <div class="date-sector">
                           
                           <b class="date-day">19</b>
                           <b class="date-month">сен</b>
                       </div>

                       <p>
                           В нашей команде пополнение,
                           Борис &laquo;Бритва&raquo; Стригунец,
                           пополнил наши стройные ряды.
                           Спешите записаться!
                       </p>
                       </a>

                   </li>
                   
                   <li class="news-list-item news-list-hidden">
                       <a href="#">
                       <div class="date-sector">
                           
                           <b class="date-day">9</b>
                           <b class="date-month">сен</b>
                       </div>

                       <p>
                           Все дорожает, а наши стрижки нет!
                           Как так? Приходите, подстригитесь
                           и узнаете, в чем здесь подвох!
                       </p>
                       </a>
                   </li>
                   
               </ul>
           </section>
         

           <section class="reviews-section">
               <h2 class="reviews-promo">Отзывы о нас</h2>
               <a href="#" class="leave-review-button">Оставить свой</a>
               <div class="news-section-slider">
                 <blockquote class="reviews-item review-item-active">
                   <p class="reviews-author-picture">
                       <img src="images/avatar.jpg" alt="Фото Трэвиса Баркера"
                     width="80" height="80">
                   </p>
                   <cite class="reviews-author-name">Трэвис Баркер</cite>
                   <p class="review-text">
                     Спасибо за лысину! был проездом в Москве,
                     заскочил побриться, чтобы было видно новую татуировку!
                   </p>
                 </blockquote>
                 <blockquote class="reviews-item review-item-hidden">
                     <p class="reviews-author-picture">
                         <img src="#" alt="Фото Джона Смита"
                              width="80" height="80">
                     </p>
                     <cite class="reviews-author-name">Джон Смит</cite>
                     <p class="review-text">
                         Отличную стрижку сделали мне ребята!
                     </p>
                 </blockquote>
                 <blockquote class="reviews-item review-item-hidden">
                     <p class="reviews-author-picture">
                         <img src="#" alt="Фото Ивана Бородайло"
                              width="80" height="80">
                     </p>
                     <?php $name = "Владислав"; ?>
                     <cite class="reviews-author-name"><?php echo $name;?></cite>
                     <p class="review-text">
                         В бородинском ваша борода в надёжных руках!
                     </p>
                 </blockquote>
<!--                 <button class="previusly-button">Предыдущий отзыв</button>
                 <button class="next-button">Следующий отзыв</button>-->
                     <a class="prev" onclick="plusSlidesRev(-1)" >&#9664;</a>
                     <a class="next" onclick="plusSlidesRev(+1)" >&#9658;</a>
               </div>
               <p class="button-toggles">
<!--                   <button class="slider-toggle">1</button>
                   <button class="slider-toggle">2</button>
                   <button class="slider-toggle">3</button>-->
                     <span class="slider-rev-toggle slider-rev-toggle-active"
                           onclick="currentSlideRev(1)"></span>
                     <span class="slider-rev-toggle slider-rev-toggle-notActive"
                           onclick="currentSlideRev(2)"></span>
                     <span class="slider-rev-toggle slider-rev-toggle-notActive"
                           onclick="currentSlideRev(3)"></span>
               </p>
                
               <img class="reviews-mock" src="images/reviews-sector-mock.svg"
                    width="320" height="34" alt="rev mock">
           </section>
         </section>
       </main>
_EOD;
}
function display_footer() {
    echo <<<_EOD
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


<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.2/less.min.js" ></script>
<script src='js/toggleScript.js'></script>
<script src="js/modalWindow.js"></script>
<script src="js/slider.js"></script>

    </body>
</html>
_EOD;
}

function display_for_user_header($title) {
    echo <<<_EOD
 <!DOCTYPE html>



<html lang="ru">
    <head>
        <title>$title</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="css/normalize.css" type="text/css" rel="stylesheet">
        <link href="css/style.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700&amp;subset=cyrillic" rel="stylesheet">

    </head>
    <body>
        
        <?php require_once './models/news.php';
              require_once './database.php';      ?>

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
                        <li class="list-site-item list-site-item-active"><a>Главная</a></li>
                        <li class="list-site-item"><a href="our_works.php">Наши работы         </a></li>
                        <li class="list-site-item"><a href="applyForm.php">Записаться</a></li>
                        <li class="list-site-item"><a href="#">Контакты            </a></li>
                        <li class="list-site-item"><a href="#">Магазин            </a></li>
                        <li class="list-site-item"><a href="../signup_form.php">Регистрация            </a></li>
                        
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
                        echo $_SESSION[4]</button>
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
}