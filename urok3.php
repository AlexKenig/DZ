
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
    echo '<h4>'; echo 'Наименьший день в сгенерированном массиве: '; echo '</h4>'; 
    $date_low_day = array('data1' => rand(0,time()),
                          'data2' => rand(0,time()),
                          'data3' => rand(0,time()),
                          'data4' => rand(0,time()),
                          'data5' => rand(0,time())
              );
    echo 'Наименьший день - ' . min(date("d", $date_low_day['data1']), 
                                    date("d", $date_low_day['data2']),
                                    date("d", $date_low_day['data3']),
                                    date("d", $date_low_day['data4']),
                                    date("d", $date_low_day['data5'])) . '<br>';
    echo "<br>";
    echo 'Дата 1: ' . 'Unix time: ' . $date_low_day['data1'] . ' GMT: ' . date("d/m/Y", $date_low_day['data1']);
         echo "<br>";
    echo 'Дата 2: ' . 'Unix time: ' . $date_low_day['data2'] . ' GMT: ' . date("d/m/Y", $date_low_day['data2']);
         echo "<br>";
    echo 'Дата 3: ' . 'Unix time: ' . $date_low_day['data3'] . ' GMT: ' . date("d/m/Y", $date_low_day['data3']);
         echo "<br>";
    echo 'Дата 4: ' . 'Unix time: ' . $date_low_day['data4'] . ' GMT: ' . date("d/m/Y", $date_low_day['data4']);
         echo "<br>";
    echo 'Дата 5: ' . 'Unix time: ' . $date_low_day['data5'] . ' GMT: ' . date("d/m/Y", $date_low_day['data5']);

//Наибольший месяц
    echo '<h4>'; echo 'Наибольший месяц в сгенерированном массиве: '; echo '</h4>';
    $date_high_mon = array('data1' => rand(0,time()),
                           'data2' => rand(0,time()),
                           'data3' => rand(0,time()),
                           'data4' => rand(0,time()),
                           'data5' => rand(0,time())
              );
    echo 'Наибольший месяц - ' . max(date("m", $date_high_mon['data1']), 
                                     date("m", $date_high_mon['data2']),
                                     date("m", $date_high_mon['data3']),
                                     date("m", $date_high_mon['data4']),
                                     date("m", $date_high_mon['data5'])) . '<br>';
    echo "<br>";
    echo 'Дата 1: ' . 'Unix time: ' . $date_high_mon['data1'] . ' GMT: ' . date("d/m/Y", $date_high_mon['data1']);
         echo "<br>";
    echo 'Дата 2: ' . 'Unix time: ' . $date_high_mon['data2'] . ' GMT: ' . date("d/m/Y", $date_high_mon['data2']);
         echo "<br>";
    echo 'Дата 3: ' . 'Unix time: ' . $date_high_mon['data3'] . ' GMT: ' . date("d/m/Y", $date_high_mon['data3']);
         echo "<br>";
    echo 'Дата 4: ' . 'Unix time: ' . $date_high_mon['data4'] . ' GMT: ' . date("d/m/Y", $date_high_mon['data4']);
         echo "<br>";
    echo 'Дата 5: ' . 'Unix time: ' . $date_high_mon['data5'] . ' GMT: ' . date("d/m/Y", $date_high_mon['data5']);
    
//Сортировка массива по возрастанию дат
    echo '<h4>'; echo 'Сортировка массива по возрастанию дат: </b><br></h4>';
    echo 'Массив до сортировки: <br>';
      echo '<pre>';
        print_r($date);
      echo '</pre>';
    echo 'Массив после сортировки: <br><br>';
    asort($date);
    foreach($date as $key => $value) {
        echo $key  . ' Unix time: ' . "$value" . ' GMT: ' . date("d/m/Y", $value) . '</b><br>';
      }

//Извлечение последнего элемента массива в новую переменную $selected
    echo '<h4>'; echo 'Извлечение последнего элемента массива в новую переменную $selected: '; echo '</h4>';  
    echo 'Массив до сортировки: <br><br>';
        foreach($date as $key => $value) {
            echo $key  . ' Unix time: ' . "$value" . ' GMT: ' . date("d/m/Y", $value) . '</b><br>';
        }
    echo "<br>";
    echo 'Массив после сортировки: <br><br>';
    $selected = array_pop($date);
             echo '<pre>';
                 print_r($date);
             echo '</pre>';         
    echo '$selected = ' . date("d/m/Y", $selected);

//Преобразование переменной $selected в формат "дд.мм.ГГ ЧЧ:ММ:СС"
echo '<h4>'; echo 'Преобразование переменной $selected в формат "дд.мм. ГГ ЧЧ:ММ:СС": '; echo '</h4>';  
echo date("d.m.Y H:i:s", $selected);

//Установка часовой пояса для Нью-Йорка:
echo '<h4>'; echo 'Установка часовой пояса для Нью-Йорка: '; echo '</4>'  . "<br>" . "<br>"; 
echo 'Текущий часовой пояс - ' . date_default_timezone_get() . "<br>";
echo 'Текущее время - ' . date("d/m/Y H:i:s") . "<br>" . "<br>";

//Изменил на Американский ЧП
date_default_timezone_set('America/New_york');
echo 'Новый часовой пояс - ' . date_default_timezone_get() . "<br>";
echo 'Время в Нью-Йорке: ' .' '. date("d/m/Y H:i:s");
