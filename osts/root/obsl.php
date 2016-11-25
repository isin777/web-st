<?php
//подключение библиотек
include_once('connection.php');
include_once('model/model.php');
include_once('view.php');
$dbh = connect();  
// выводим обслуживание
if (isset($_GET['inv_obs']))
{
	$id_inv = $_GET['inv_obs'];
	$today = date("ym");
	//Заголовок страницы
	$title = 'Обслуживание техники инв. № ' . $id_inv;
	$obsl_inv = obsl_get($dbh, $id_inv);
	//выводим обслуживание
	// Внутренний шаблон
	$content = view_include('templates/v_obsl.php', array('obsl_inv' => $obsl_inv));
}	


// Внешний шаблон.
$page = view_include(
	'templates/main.php', 
	array('title' => $title, 'content' => $content));

// Вывод.
echo $page; 