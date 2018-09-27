
<?php include_once 'header.php'; ?>
<style>
    article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
	display: block;
	background-color: #292929;
}
</style>
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
               <a href="index.php?show_all_news" class="show-news-button">Показать Все</a>
               <ul class="news-list">
                   <?php include 'templates/show_news.php'; ?>
                   
                  
                   
               </ul>
           </section>
             
                        <section class="reviews-section">
               <h2 class="reviews-promo">Отзывы о нас</h2>
               <a href="index.php?add_comment" class="leave-review-button">Оставить свой</a>
               <div class="news-section-slider">
                 <?php include 'templates/show_comment.php'; ?>
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
         
         <?php include_once 'footer.php'; ?>