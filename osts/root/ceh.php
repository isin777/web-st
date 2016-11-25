<?php
//подключение библиотек
include_once('connection.php');
include_once('model/model.php');
include_once('view.php');
$dbh = connect();  

//Заголовок страницы
$title = 'Перечень цехов';



if (isset($_GET['id']))
	{
		//подготовка данных
		$today = date("ym");
		$ceh = $_GET['id'];
		$nait_ceh = '0';
		$invent_ceh = inv_ceh($dbh, $ceh, $nait_ceh, $today);
		$title = $invent_ceh[0]['NAIM'];
		$ob_ceh = ob_get($dbh, $ceh);
		//выводим список инвентарных номеров техники подразделения
		if (isset($_GET['ob']))
		{
			$ceh = $_GET['id'];
			$ob = $_GET['ob'];
			$nait_ob = nait_ob_get($dbh, $ceh, $ob);
			
			
			if (isset($_GET['nait']))
			{
				$nait = $_GET['nait'];
			}
			else
			{
				$nait = '0';
			}
			$invent_ob = inv_ceh_ob($dbh, $ceh, $ob, $nait, $today);
			$title = $invent_ceh[0]['NAIM'] . '(' . $invent_ob[0]['NAIO'] . ')' ;
			//выводим список инвентарных номеров техники подразделения
			// Внутренний шаблон
			$content = view_include('templates/v_inv_ob.php', array('invent_ceh' => $invent_ceh,'invent_ob' => $invent_ob, 'ob_ceh' => $ob_ceh, 'nait_ob' => $nait_ob));
					
		}
		//выводим список инвентарных номеров техники цеха
		else
		{
		$title = $invent_ceh[0]['NAIM'];
		$nait_ceh = nait_c_get($dbh, $ceh);
		if (isset($_GET['nait']))
		{
			$ceh = $_GET['id'];
			$nait = $_GET['nait'];
			$invent_ceh = inv_ceh($dbh, $ceh, $nait, $today);
		}
		
		//выводим список инвентарных номеров техники цеха
		// Внутренний шаблон
		$content = view_include('templates/v_inv_ceh.php', array('invent_ceh' => $invent_ceh, 'ob_ceh' => $ob_ceh, 'nait_ceh' => $nait_ceh, 'nait' => $nait));
		}
		
	}
//выводим перечень цехов
	else
{
	//подготовка данных
	$today = date("ym");
	$all_ceh = list_ceh($dbh);
//выводим цеха
// Внутренний шаблон
$content = view_include('templates/v_ceh.php', array('all_ceh' => $all_ceh)); 

}
//выводим х-ки техники по инвент номеру
if (isset($_GET['inv']))
{
	$id_inv = $_GET['inv'];
	$today = date("ym");
	//Заголовок страницы
	$title = 'Характеристики техники';
	//проверка наличия объекта в цехе в этом инв номере, запрос с объектом или без
	$ob_inv = ob_get_inv($dbh, $id_inv, $today);
	if ($ob_inv['KOB'] == '0' || $ob_inv['KOB'] == '200')
	{   
		$invent = inv_get($dbh, $id_inv, $today);
	}
	else
	{
		$invent = inv_get_ob($dbh, $id_inv, $today);
	}
	$har = haract_get($dbh, $id_inv, $today);
	//выводим технику по  инвентарному номеру
	// Внутренний шаблон
	$content = view_include('templates/v_inv.php', array('invent' => $invent, 'har' => $har, 'ob_inv' => $ob_inv));
}

// Внешний шаблон.
$page = view_include(
	'templates/main.php', 
	array('title' => $title, 'content' => $content));

// Вывод.
echo $page; 