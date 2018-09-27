<?php

include_once  'header.php';
include_once  'navigation.php';

require_once 'scripts/database_connect.php';


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
    
    header("Location: index.php?order");
   }
   
   else {
       $message = "Пожалуйста заполните все поля!";
   }

?>

<style>
    .title-top {
        color: black;
    }
    
    .beard-radio .radio-container  {
        color: black;
    }
    
    .checkbox-container {
        color: black;
    }
</style>
<main>
            
            <section class="apply-section">
                
                <form action="?order" method="POST" class="apply-form">
                <fieldset class="form-top">
                    <div class="top-title-wrap">
                        <div class="error_msg"><?php echo $message = ''; ?></div>
                        <h2 class="title-top">Запись на стрижку</h2>
                    <a href="index.php" class="form-button-toindex">На главную</a>
                    </div>
                    
                    <div class="form-field-container">
                    <input type="text" maxlength="20" placeholder="Фамилия"
                           name="Apply_Last_Name" required class="form-field"
                           value="<?php echo $last_name; ?>">
                    <input type="text" maxlength="20" placeholder="Имя"
                           name="Apply_First_Name" class="form-field" required
                           value="<?php echo $first_name; ?>">
                    <input type="text" maxlength="20" placeholder="Отчество"
                           name="Apply_Midlle_Name" class="form-field" required
                           value="<?php echo $middle_name; ?>">
                    </div>
                    
                    <div class="form-field-containerCon">
                    
                    <input type="tel" placeholder="Контактный телефон"
                           class="form-field" maxlength="12" required name="mobile"
                           value="<?php echo $phone ; ?>">
                    <input type="email" placeholder="Контактный e-mail"
                           class="form-field" name="Apply_Email" required
                           value="<?php echo $email_adress; ?>">
                    </div>
                    <textarea class="textarea" name="Add_Info" wrap="hard">Доп.информация для мастера.
                    <?php echo $description; ?>
                    </textarea>
                    
                </fieldset>
                
                <fieldset class="form-mid">
                    <legend class="title-middle">Выберите модель бороды:</legend>
                    <div class="beard-radio">
                        
                        <label for="admiral" class="radio-container">
                            <input type="radio" class="form-radio" name="beard"
                               id="admiral" checked value="Admiral">
                            <span class="checkmark-radio"></span>
                            Адмирал
                        </label>
                        <img src="images/beard-admiral-icon.svg" alt=""
                             class="form-radio-icon"> 
                    </div>
                    <div class="beard-radio">
                        
                        <label for="woodman" class="radio-container">
                            <input type="radio" class="form-radio" name="beard"
                               id="woodman" value="Woodman">
                            <span class="checkmark-radio"></span>
                            Лесоруб
                        </label>
                        <img src="images/beard-woodman-icon.svg" alt=""
                             class="form-radio-icon"> 
                    </div>
                    
                    <div class="beard-radio">
                       
                        <label for="polarman" class="radio-container">
                            <input type="radio" class="form-radio" name="beard"
                               id="polarman" value="Polarman">
                            <span id="polarfix" class="checkmark-radio polarman"></span>
                            Полярник
                        </label>
                        <img src="images/beard-polarman-icon.svg" alt=""
                             class="form-radio-icon"> 
                    </div>
                    
                    <div class="beard-radio">
                        
                        <label for="boyarinman" class="radio-container">
                            <input type="radio" class="form-radio" name="beard"
                               id="boyarinman" value="Boyarinman">
                             <span class="checkmark-radio"></span>
                            Боярин
                        </label>
                        <img src="images/beard-boyarinman-icon.svg" alt=""
                             class="form-radio-icon"> 
                    </div>
                    
                    <div class="beard-radio">
                        
                        <label for="wiseman" class="radio-container">
                            <input type="radio" class="form-radio" name="beard"
                               id="wiseman" value="Wiseman">
                            <span class="checkmark-radio"></span>
                            Мудрец
                        </label>
                        <img src="images/beard-wiseman-icon.svg" alt=""
                             class="form-radio-icon"> 
                    </div>
                    
                </fieldset>
                
                <fieldset class="form-bot">
                    <legend class="title-bot">Дополнительные услуги:</legend>
                    <div class="form-checkbox-container">
                    <label class="checkbox-container">Подкрасить бороду
                    <input type="checkbox" class="form-checkbox"
                           name="service-selection">
                    <span class="checkmark-checkbox"
                          value="Подкрасить бороду"></span>
                    </label>
                    
                    <label class="checkbox-container">Накрутить усы
                    <input type="checkbox" class="form-checkbox"
                           name="service-selection">
                    <span class="checkmark-checkbox"
                          value="Накрутить усы"></span>
                    </label>
                    
                    <label class="checkbox-container">Причесать бороду
                    <input type="checkbox" class="form-checkbox"
                           name="service-selection"
                           value="Причесать бороду">
                    <span class="checkmark-checkbox"></span>
                    </label>
                    </div>
                    <div class="form-checkbox-container">
                    <label class="checkbox-container">Подровнять виски
                    <input type="checkbox" class="form-checkbox"
                           name="service-selection"
                           value="Подровнять виски">
                    <span class="checkmark-checkbox"></span>
                    </label>
                    
                    <label class="checkbox-container" id="beardFix1">Убрать седину
                    <input type="checkbox" class="form-checkbox"
                           name="service-selection"
                           value="Убрать седину">
                    <span class="checkmark-checkbox"></span>
                    </label>
                    
                    <label class="checkbox-container" id="beardFix2">Отполировать лысину
                    <input type="checkbox" class="form-checkbox"
                           name="service-selection"
                           value="Oтполировать лысину">
                    <span class="checkmark-checkbox"></span>
                    </label>
                    </div>
                </fieldset>
                
                <input type="submit" name="send_apply" value="Отправить заявку"
                       class="submit-button">
                <img class="reviews-mock" src="images/reviews-sector-mock.svg"
                    width="320" height="34" alt="rev mock">
            </form>
                <div class="pop-fail" id="popFail">
                    <b class="pop-title">Неудача</b>
                    <p class="pop-text">Что-то пошло не так.
                    Проверьте выделенные красным поля формы.</p>
                    <button class="pop-close" onclick="closePop()"
                            type="button">Ок</button>
                </div>
                
                <div class="pop-succ" id="popSucc">
                    <b class="pop-title">Это успех!</b>
                    <p class="pop-text">Ваша заявка отправлена.
                    Ожидайте, мы свяжемся с вами как только будет минутка.</p>
                    <button class="pop-close"
                            onclick="closePop()" type="button">Закрыть окно</button>
                </div>
                
            </section>
        </main>
<?php include 'footer.php'; ?>
