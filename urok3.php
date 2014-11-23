
<h2>Урок 3</h3>
         
<?php

$date = array('data1' => rand(0,time()),
              'data2' => rand(0,time()),
              'data3' => rand(0,time()),
              'data4' => rand(0,time()),
              'data5' => rand(0,time())
              );
 echo 'Реализован массив $date.';
    echo '<pre>';
            print_r($date);
    echo '</pre>';
    //echo var_dump($date);
    //Текущая дата;
         echo "<br>";
    echo 'Текущая дата: ' .' '. date("d/m/Y H:i:s");
         echo "<br>";
    echo "<br>";
    echo 'Дата 1: ' . 'Unix time: ' . $date['data1'] . ' GMT: ' . date("d/m/Y", $date['data1']);
         echo "<br>";
    echo 'Дата 2: ' . 'Unix time: ' . $date['data2'] . ' GMT: ' . date("d/m/Y", $date['data2']);
         echo "<br>";
    echo 'Дата 3: ' . 'Unix time: ' . $date['data3'] . ' GMT: ' . date("d/m/Y", $date['data3']);
         echo "<br>";
    echo 'Дата 4: ' . 'Unix time: ' . $date['data4'] . ' GMT: ' . date("d/m/Y", $date['data4']);
         echo "<br>";
    echo 'Дата 5: ' . 'Unix time: ' . $date['data5'] . ' GMT: ' . date("d/m/Y", $date['data5']);
        
echo "<br>";
    
//Наименьший день
    echo '<h4>'; echo 'Наименьший день в сгенерированном массиве: '; echo '</4>';     
    echo min(date("d", $date['data1']), date("d", $date['data2']),date("d", $date['data3']),date("d", $date['data4']),date("d", $date['data5'])) . '<br>';

//Наибольший месяц
    echo '<h4>'; echo 'Наибольший месяц в сгенерированном массиве: '; echo '</4>';     
    echo max(date("m", $date['data1']), date("m", $date['data2']),date("m", $date['data3']),date("m", $date['data4']),date("m", $date['data5'])) . '<br>';

//Сортировка массива по возрастанию дат
    echo '<h4>'; echo 'Сортировка массива по возрастанию дат: '; echo '</4>';  
    echo array_multisort($date, SORT_DESC);
        echo "<br>";
             echo '<pre>';
                 print_r($date);
             echo '</pre>';

//Извлечение последнего элемента массива в новую переменную $selected
    echo '<h4>'; echo 'Извлечение последнего элемента массива в новую переменную $selected: '; echo '</4>';  
    $selected = array_pop($date);
             echo "<br>";
             echo '<pre>';
                 print_r($date);
             echo '</pre>';
    echo "<br>";         
    echo '$selected = ' . $selected;

//Преобразование переменной $selected в формат "дд.мм.ГГ ЧЧ:ММ:СС"
echo '<h4>'; echo 'Преобразование переменной $selected в формат "дд.мм. ГГ ЧЧ:ММ:СС": '; echo '</4>';  
echo date("d.m.Y H:i:s", $selected);

//Установка часовой пояса для Нью-Йорка:
echo '<h4>'; echo 'Установка часовой пояса для Нью-Йорка: '; echo '</4>'  . "<br>" . "<br>"; 
echo 'Текущий часовой пояс - ' . date_default_timezone_get() . "<br>";
echo 'Текущее время - ' . date("d/m/Y H:i:s") . "<br>" . "<br>";
//Изменил на Американский ЧП
date_default_timezone_set('America/New_york');
echo 'Новый часовой пояс - ' . date_default_timezone_get() . "<br>";
echo 'Время в Нью-Йорке: ' .' '. date("d/m/Y H:i:s");


?>