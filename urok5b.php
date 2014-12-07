<?PHP  header("Content-Type: text/html; charset=utf-8");?>
<?php
if (!isset($_POST['id']) || empty($_POST['id'])){
    
    header("HTTP/1.1 404 Not Found"); // 
    //header('HTTP/1.1 404 Not Found');
    //header('Status: 404 Not Found');
    /*var_dump($_SERVER["SERVER_PROTOCOL"]);
    echo "<h1>404</h1> Страница не найдена";
    die();*/
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<h3>Метод POST</h3>
<form method="POST">
    Введите id: <input type="text" name="id" value="" /><br><br>
    <input type="submit" value="Отправить!">
</form>
</body>
</html>

<?php
$news='Четыре новосибирские компании вошли в сотню лучших работодателей
Выставка университетов США: открой новые горизонты
Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
Студент-изобретатель раскрыл запутанное преступление
Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
Здоровое питание: вегетарианская кулинария
День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
«Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»
проверка как выводится массив 
еще одна строка для проверки'
;

$news =  explode("\n",$news);
echo "<pre>";
//print_r($news);
print_r($_POST);
echo "</pre>";
echo "<br>";
//echo $news[$_GET['id']];
echo "<br>";


/*************Вывод всего списка статей*************/
function show_all_news($news){
    echo '<p><b>Функция вывода всего списка новостей</b></p>';
    for ($i = 1; $i < count($news) + 1; $i++){
        echo $i . ' <a href = "?id=' . ($i) . '">' . $news[$i-1] . '</a><br>';
    }
}
show_all_news($news);


function showNews(array $news, $id = null) {
    
    if (!is_null($id) && !empty($news[$id-1])) {
        echo '<p><b>Вывод одной статьи:</b></p>';
        echo 'Статья: № ' . $id . '<br><br>';
        echo $news[$id-1];
    } else {
        echo '<p><b><h2>Такой статьи нету, повторите запрос!</h2></b></p>';
        foreach($news as $newsId => $newsItem) {
            $newsId += 1;
            echo $newsId . sprintf('<a href="?id=%s"> %s </a><br>', $newsId, $newsItem);
            
        }
    }
}
showNews($news, $_POST['id']);



?>