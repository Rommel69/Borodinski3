<?php

include_once 'header.php';
include_once 'navigation.php';



?>



<main>
    <section class="apply-section">
        <form action="scripts/create_user.php" method="POST" class="apply-form"
              enctype="multipart/form-data">
                <fieldset class="register-form-top">
                    <div class="top-title-reg">
                        <h2 class="register-top">Регистрация</h2>
                    <a href="index.php" class="form-button-toindex">На главную</a>
                    </div>
                    
                    <div class="form-field-containerCon">
                    <input type="text" maxlength="20" placeholder="Фамилия"
                           name="Apply_Last_Name" required class="form-field">
                    <input type="text" maxlength="20" placeholder="Имя"
                           name="Apply_First_Name" class="form-field" required>
                    <input type="text" maxlength="20" placeholder="Логин"
                           name="Apply_Login" class="form-field" required>
                    <input type="password" maxlength="20" placeholder="Пароль"
                           name="Apply_Password" class="form-field" required>
                    <input type="password" maxlength="20" placeholder="Повторите пароль"
                           name="Apply_Repeat" class="form-field" required>
                    
                    
                    
                    
                    
                    <input type="email" placeholder="Контактный e-mail"
                           class="form-field" name="Apply_Email" required>
                    
                    
                    
                    <input type="submit" class="submit-button" name="Apply_button" value="Отправить" >
                    </div>
                </fieldset>
            </form>
    </section>
</main>


<?php include_once 'footer.php'; ?>