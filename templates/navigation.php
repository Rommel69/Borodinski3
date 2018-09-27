

<?php 
session_start();
$name = $_SESSION['user_name'];
$active_item = ""; ?>

  <?php
      if($_REQUEST['home'])
      {$active_item = "list-site-item-active";}
      else {$active_item = " ";}
    ?>

<?php if(!isset($_SESSION['user_name'])) { ?>
  
    <nav class="main-nav main-nav-closed main-nav-nojs">
               <button class="main-nav-toggle" type="button">
                   <span class="visually-hidden">Открыть меню</span>
               </button>
                <div class="main-nav-wrapper">
                    <ul class="main-nav-list site-list">
                       
                        <li class="list-site-item  <?php echo $active_item; ?>"><a href="?home">Главная</a></li>
                       
                        <li class="list-site-item"><a href="index.php?order">Записаться</a></li>
                        <li class="list-site-item"><a href="#contacts">Контакты        </a></li>
                        <li class="list-site-item"><a href="index.php?shop">Магазин    </a></li>
                        <li class="list-site-item"><a href="index.php?signup">Регистрация            </a></li>
                        <li class="list-site-item"><a href="index.php?cart">Корзина </a></li>
                        
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
                               placeholder="Логин" >
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

<?php } ?>
       <?php
    if(isset($_SESSION['user_name']) && $_SESSION['user_group'] != '1') {
       echo <<<_EOD
         <nav class="main-nav main-nav-closed main-nav-nojs">
               <button class="main-nav-toggle" type="button">
                   <span class="visually-hidden">Открыть меню</span>
               </button>
                <div class="main-nav-wrapper">
                    <ul class="main-nav-list site-list">
                        <li class="list-site-item list-site-item-active"><a>Главная</a></li>
                        <li class="list-site-item"><a href="index.php?order">Записаться</a></li>
                        <li class="list-site-item"><a href="#contacts">Контакты            </a></li>
                        <li class="list-site-item"><a href="index.php?shop">Магазин            </a></li>
                        <li class="list-site-item"><a href="index.php?user_profile">Профиль</a></li>
                        <li class="list-site-item"><a href="index.php?cart">Корзина </a></li>
                        
                    </ul>
                    
                    
                    <ul class="main-nav-list user-list">
                        <li class="user-list-item">
                            
                        <svg class="user-list user-list-icon" width="16" height="16"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                        <polygon points="0 7 7.01 7 7.01 4.06 10.96 8.01 7.01 11.91 7.01
                        9.06 0 9.02 0 7"/><polygon points="7.01 0 7.01 2 14.03
                        2 14.03 13.99 7.01 13.99 7.01 16 16 16 16 0 7.01 0"/>
                        </svg>
                        <a href="scripts/logout.php">Выйти</a></button>
               
                        </li>
               
                    </ul>
                </div>
                <!--MODAL-->
           
                
           </nav>
           
          
           
           
       </header>
_EOD;
    }
    
    if(isset($_SESSION['user_group']) && $_SESSION['user_group'] == "1") {
        
            echo <<<_EOD
         <nav class="main-nav main-nav-closed main-nav-nojs">
               <button class="main-nav-toggle" type="button">
                   <span class="visually-hidden">Открыть меню</span>
               </button>
                <div class="main-nav-wrapper">
                    <ul class="main-nav-list site-list">
                        <li class="list-site-item list-site-item-active"><a>Главная</a></li>
                        <li class="list-site-item"><a href="index.php?order">Записаться</a></li>
                        <li class="list-site-item"><a href="index.php?wizard">Управлять     </a></li>
                        <li class="list-site-item"><a href="index.php?shop">Магазин            </a></li>
                        <li class="list-site-item"><a href="index.php?user_profile">Профиль</a></li>
                        <li class="list-site-item"><a href="index.php?cart">Корзина </a></li>
                    </ul>
                    
                    
                    <ul class="main-nav-list user-list">
                        <li class="user-list-item">
                            
                       <a href="scripts/logout.php"> <svg class="user-list user-list-icon" width="16" height="16"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                        <polygon points="0 7 7.01 7 7.01 4.06 10.96 8.01 7.01 11.91 7.01
                        9.06 0 9.02 0 7"/><polygon points="7.01 0 7.01 2 14.03
                        2 14.03 13.99 7.01 13.99 7.01 16 16 16 16 0 7.01 0"/>
                        </svg>
                        </a>
               
                        </li>
               
                    </ul>
                </div>
                <!--MODAL-->
           
                
           </nav>
           
          
           
           
       </header>
_EOD;
        
    }
?>



       
       