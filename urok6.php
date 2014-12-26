<?php
header("Content-Type: text/html; charset=utf-8");
error_reporting(E_ERROR|E_WARNING|E_PARSE);
ini_set('display_errors', 1);


session_start();

/************ВЫВОД ТАБЛИЦЫ***************/

function show_t() {
    
    if(empty($_SESSION['bd'])){
        return;
    }
          echo '<table border = "1">
                <tr>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Имя</th>
                    <th>Удалить</th>
                </tr>';
        
        foreach($_SESSION['bd'] as $id => $params){
            $title = trim(strip_tags($params['title']));
            $price = trim(strip_tags($params['price']));
            $seller_name = trim(strip_tags($params['seller_name']));
            echo '<tr>
                    <td><a href="?action=show&id='.$id.'">'.$title.'</td>
                    <td>' . $price . '</td>
                    <td>' . $seller_name . '</td> 
                    <td><a href="?action=delete&id='.$id.'">Удалить</td>
                </tr>';
        }
        echo '</table>';
    }    
    
/************ПРОВЕРКА ЗАПОЛНЕНИЯ ПОЛЕЙ***************/
    
 function check_form($title,$price,$seller_name){
     
     if(!$title && !$price && !$seller_name){
               return false;
     }
     else{
         return true;
     }
 }   
 /************ВЫБОР ГОРОДОВ***************/
    
     function show_city(){
            $citys = array( '641780'=>'Новосибирск',
                            '641490'=>'Барабинск',
                            '641510'=>'Бердск',
                            '641600'=>'Искитим',
                            '641630'=>'Колывань',
                            '111111'=>'Калининград',
                            '222222'=>'Черняховск'
                           );
            $gorod = $_SESSION['bd'][$_GET['id']]['location_id'];
            foreach ($citys as $number => $city){
                    $selected = ($number==$gorod) ? 'selected=" "' : ''; 
                    echo '<option ' .$selected. 'value="'.$number.'">'.$city.'</option>';
                }
    }
 
/************ВЫБОР КАТЕГОРИИ***************/
    
     function show_categor(){
            $catId = array( '9'=>'Автомобили с пробегом',
                            '109'=>'Новые автомобили',
                            '14'=>'Мотоциклы и мототехника'
                           );
            $catVibor = $_SESSION['bd'][$_GET['id']]['category_id'];
            foreach ($catId as $number => $categor){
                    $selected = ($number==$catVibor) ? 'selected=" "' : ''; 
                    echo '<option ' .$selected. 'value="'.$number.'">'.$categor.'</option>';
            }
     }
 
 /************УДАЛЕНИЕ, ЗАПИСЬ, РЕДАКТИРОВАНИЕ ДАННЫХ В ТАБЛИЦЕ***************/
 
 if(isset($_GET['action']) && isset($_GET['id'])){ //Удаление 
     $id = (int)$_GET['id'];
     $id = abs($id);
     switch($_GET['action']){
         case 'delete':{
             if(isset($_SESSION['bd'][$id])){  
                 unset($_SESSION['bd'][$id]);
                 header("Location: urok6.php");  // редирект, подстраховка в таблице
                 exit;
             }
             break;
         }
         case 'show':{
             if(!isset($_SESSION['bd'][$id])){  
                 //header 404;
                 header("Location: urok6.php");
                 exit;
             }
             if(isset($_POST['main_form_submit'])) {
                        $result = check_form($_POST['title'],$_POST['price'],$_POST['seller_name']);
                        if($result){
                            $_SESSION['bd'][$id] = $_POST;
                        }else{
                            echo '<p><b>Вы не ввели необходимые поля</b></p>';
                        }
            }
             $ad = $_SESSION['bd'][$id];
             break;
         }
     }
 }else{
/************ОБРАБАТЫВАЕМ ОТПРАВКУ ФОРМЫ ***************/
 
             if(isset($_POST['main_form_submit'])) {
                $result = check_form($_POST['title'],$_POST['price'],$_POST['seller_name']);
                if($result){
                    $_SESSION['bd'][] = $_POST;
                    header("Location: urok6.php");
                    exit;
                }else{
                    echo '<p><b>Вы не ввели необходимые поля</b></p>';
                }
             }
 }
/****************ОЧИСТКА ФОРМЫ*******************/

        if(isset($_POST['reset_form'])){
            unset($_SESSION['bd']['id']);
            /*$_SESSION['bd'] = $_POST;*/
                    header("Location: urok6.php");
                    exit;
        }

?>

<form  method="post">
   
    <div class="form-row-indented"> 
        
            <?php
/*-------------------ВЫБОР ЧАСТНИК/КОМПАНИЯ------------------------*/
            
                $checkbox = 'checked=""';
                    $private = "";
                    $company = "";
                if(isset($_SESSION['bd'][$id]['private']) )
                {
                    if($_SESSION['bd'][$id]['private']==1) {
                        $private = $checkbox;                      
                    }else{
                        $company = $checkbox;
                    }       
                }else{
                    $private = $checkbox;
                }
            ?>
        
        <label class="form-label-radio"><input type="radio" <?=$private;?> checked="" value="1" name="private">Частное лицо</label> 
        <label class="form-label-radio"><input type="radio" <?=$company;?> value="0" name="private">Компания</label> 
    </div>
        
    <div class="form-row"> 
        
        <label for="fld_seller_name" class="form-label"><b id="your-name">Ваше имя</b></label>          
        <input type="text" maxlength="40" class="form-input-text" 
               value="<?php if($ad['seller_name']){ echo $ad['seller_name'];} ?>" name="seller_name" id="fld_seller_name"> 
    
    </div>
    
    <div class="form-row"> 
        <label for="fld_email" class="form-label">Электронная почта</label>
        <input type="text" class="form-input-text" 
               value="<?php if($ad['email']){ echo $ad['email'];} ?>" name="email" id="fld_email">
    
      
    </div>
         
    <div class="form-row-indented"> 
        
        <?php
                $checkbox = 'checked=""';
                   $mails = "";
                if(isset($_SESSION['bd'][$id]['allow_mails']) )
                {
                    if($_SESSION['bd'][$id]['allow_mails']==1) {
                        $mails = $checkbox;                      
                    }       
                }
            ?>
        
        <label class="form-label-checkbox" for="allow_mails"> 
            <input type="checkbox" value="1" <?=$mails;?> name="allow_mails" id="allow_mails" class="form-input-checkbox">
            <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span> 
        </label> 
    </div>
    
    <div class="form-row"> 
        <label id="fld_phone_label" for="fld_phone" class="form-label">Номер телефона</label> 
        <input type="text" class="form-input-text" 
               value="<?php if($ad['phone']){ echo $ad['phone'];} ?>" name="phone" id="fld_phone"> 
    
  
    </div>
    
     
    
    <div id="f_location_id" class="form-row form-row-required"> 
        <label for="region">Город</label> 
        

        <select title="Выберите Ваш город" name="location_id" id="region"> 
            <option value="">-- Выберите город --</option>
    
            <?php 
/************ВЫБОР ГОРОДА***************/           
                show_city();
            ?>
             
        </select> 
                   
    <div class="form-row"> 
        <label for="fld_category_id" class="form-label">Категория</label> 
        <select title="Выберите категорию объявления" name="category_id" id="fld_category_id" class="form-input-select"> 
            <option value="">-- Выберите категорию --</option>
            <optgroup label="Транспорт">
                
            <?php 
/************ВЫБОР КАТЕГОРИИ***************/           
                show_categor();
            ?>
             
            </optgroup>
        </select> 
    
      
    </div>

    <div style="display: none;" id="params" class="form-row form-row-required"> 
        <label class="form-label ">Выберите параметры</label> 
        <div class="form-params params" id="filters">
        </div> 
    </div>

    <div id="f_title" class="form-row f_title"> 
        <label for="fld_title" class="form-label">Название объявления</label> 
        <input type="text" maxlength="50" class="form-input-text-long" 
               value="<?php if($ad['title']){ echo $ad['title'];}?>" name="title" id="fld_title"> 
    </div>
        
    <div class="form-row"> 
        <label for="fld_description" class="form-label" id="js-description-label">Описание объявления</label> 
        <textarea maxlength="3000" name="description" id="fld_description" class="form-input-textarea" ><?php if($ad['description']){ echo $ad['description'];} ?></textarea> 
    </div>
    
    <div id="price_rw" class="form-row rl"> 
        <label id="price_lbl" for="fld_price" class="form-label">Цена</label> 
        <input type="text" maxlength="9" class="form-input-text-short" 
               value="<?php if($ad['price']){ echo $ad['price'];} ?>" name="price" id="fld_price">&nbsp;
            <span id="fld_price_title">руб.</span> 
              
    </div>

    <div class="form-row-indented form-row-submit b-vas-submit" id="js_additem_form_submit">
        <div class="vas-submit-button pull-left"> 
            <span class="vas-submit-border"></span> 
            <span class="vas-submit-triangle"></span> 
            <input type="submit" value="Сохранить" id="form_submit" name="main_form_submit" class="vas-submit-input"> 
            <input type="submit" value="Очистить форму" id="form_reset" name="reset_form"> 
        </div>
    </div>
</form>




<?php
    show_t(); //Vivod tablici
echo "<pre>";
//print_r($_SESSION);
print_r($_SESSION['bd']);
echo "</pre>";
?>