<?php
require_once '/components/Database.php';

$mysqli = Database::getConnection();
$mysqli -> query("SET NAMES 'utf8'") or die ("Ошибка соединения с базой!");

if(!empty($_POST["nameOfTeacher"])) { //Принимаем данные

    $nameOfTeacher = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["nameOfTeacher"]))));

    $db = $mysqli -> query("SELECT lesson_teacher from lessons WHERE lesson_teacher LIKE '%$nameOfTeacher%'")
    or die('Ошибка №'.__LINE__.'<br>Обратитесь к администратору сайта пожалуйста, сообщив номер ошибки.');

    $list = array();
    $i = 0;
    while ($row = $db-> fetch_array()) {
        if (!in_array($row["lesson_teacher"], $list)){
            $list[$i] = $row["lesson_teacher"];
            echo "\n<li>".$row["lesson_teacher"]."</li>"; //$row["name"] - имя таблицы
            $i++;
        }
    }
}
?>