<h2>Zadanie 1</h2>
<?php

	$name = 'Alex';
	$age = 27;
		echo 'Меня зовут ' .$name. ', мне ' .$age. ' лет.'.'</br>';
	unset($name, $age);
		echo 'Меня зовут ' .$name. ', мне ' .$age. ' лет.';
?>

</br>
<h2>Zadanie 2</h2>

<?php
	define('town', 'Kaliningrad');
	if (defined('town')) {
		echo 'Я живу в городе ' . 'Kaliningrad' . '!';
		}
	else{
		echo 'Город Kaliningrad не задан! Задайте его!';
		}
?>

</br>
<h2>Zadanie 3</h2>

<?php
	$book = array("title" => "PHP Book",
		      "author" => "Koterov",
		       "pages" => "1100");
	echo 'Недавно я прочитал книгу ' . $book["title"]. ' написанную автором '. $book["author"]. ' я осилил все ' . $book["pages"]. ' страниц, мне она очень понравилась. На самом деле я ее еще читаю))))';

?>

</br>
<h2>Zadanie 4</h2>

<?php
$books = array();
$books['book1'] = array('title1' => 'Психо', 'author1' => 'Синельников', 'pages1' => '100');
$books['book2'] = array('title2' => 'Программинг', 'author2' => 'Котеров', 'pages2' => '500'); 
echo 'Недавно я прочитал книги ', $books['book1']['title1'], ' и ', $books['book2']['title2'], ', написанные соответственно авторами ', $books['book1']['author1'], ' и ', $books['book2']['author2'], ' я осилил в сумме ', ($books['book1']['pages1'] + $books['book2']['pages2']), ' страниц, не ожидал от себя подобного';
?>











