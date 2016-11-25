<?php
// Получение техники по  инвентарному номеру без учета инф о объектах  .
function inv_get($dbh, $id_inv, $today)
{
	// Запрос.
	$t = "select * from OSB1, KCEX_GD, OS_TEX where (INV = ?) and (DD = $today) and (OSB1.CEX = KCEX_GD.CEX) and (OSB1.KODT = OS_TEX.KODT)";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $id_inv);
	
	if (!$sth) 
		die(ibase_error()); 
    
	// Извлечение из БД. 
	$row = ibase_fetch_assoc($sth);
	return $row; 
}
// Получение техники по  инвентарному номеру с учетом инф о объектах.
function inv_get_ob($dbh, $id_inv, $today)
{
	// Запрос.
	$t = "select * from OSB1, KCEX_GD, OS_TEX, OS_OB where (INV = ?) and (DD = $today) and (OSB1.CEX = KCEX_GD.CEX) and (OSB1.CEX = OS_OB.CEX) and (OSB1.KOB = OS_OB.KOB) and (OSB1.KODT = OS_TEX.KODT)";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $id_inv);
	
	if (!$sth) 
		die(ibase_error()); 
    
	// Извлечение из БД. 
	$row = ibase_fetch_assoc($sth);
	return $row; 
}

// Получение характеристик техники
function haract_get($dbh, $id_inv, $today)
{
	// Запрос.
	$t = "select * from OSB1S, OS_XK where (INV = ?) and (DD = $today) and (OSB1S.KODX = OS_XK.KODX) order by OSB1S.KODX";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $id_inv);
	
	if (!$sth) 
		die(ibase_error()); 
    //while ($row = ibase_fetch_object($sth)) {
  //echo ($row->XK.$row->NAIX."<br>");}
	// Извлечение из БД.
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}
	return $row; 
}

//Получение списков цехов
function list_ceh($dbh)
{
	// Запрос
	$query = "select * from KCEX_GD order by NAIM";
	$sth = ibase_query($dbh, $query);
	
	if (!$sth) 
		die(ibase_error());
	
	// Извлечение из БД.
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}

	return $row;	
}

// Получение инвентарных номеров по заданному цеху без разделения по объектам
function inv_ceh($dbh, $ceh, $nait_ceh, $today)
{
	// Запрос
	//$query = "select * from OSB1, KCEX_GD, OS_TEX, OS_OB where CEX = ? and DD = $today and OSB1.CEX = KCEX_GD.CEX and OSB1.CEX = OS_OB.CEX and OSB1.KOB = OS_OB.KOB and OSB1.KODT = OS_TEX.KODT order by INV";
	if ($nait_ceh == '0')
	{
		$t = "select * from OSB1, KCEX_GD, OS_TEX where (OSB1.CEX = ?) and (DD = $today) and (OSB1.CEX = KCEX_GD.CEX) and (OSB1.KODT = OS_TEX.KODT) order by INV";
	}
	else
	{
		$t = "select * from OSB1, KCEX_GD, OS_TEX where (OSB1.CEX = ?) and (OSB1.KODT = ?) and (DD = $today) and (OSB1.CEX = KCEX_GD.CEX) and (OSB1.KODT = OS_TEX.KODT) order by INV";
	}
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $ceh, $nait_ceh);
	
	if (!$sth) 
		die(ibase_error());
	
	// Извлечение из БД.
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}

	return $row;	
}

// Получение инвентарных номеров по заданному цеху и объекту
function inv_ceh_ob($dbh, $ceh, $ob, $nait, $today)
{
	if ($nait == '0')
	{
		
		$t = "select * from OSB1, KCEX_GD, OS_TEX, OS_OB where (OSB1.CEX = ?) and (OS_OB.KOB = ?) and (DD = $today) and (OSB1.CEX = KCEX_GD.CEX) and (OSB1.CEX = OS_OB.CEX) and (OSB1.KOB = OS_OB.KOB) and (OSB1.KODT = OS_TEX.KODT) order by INV";
	}
	else
	{
		
		$t = "select * from OSB1, KCEX_GD, OS_TEX, OS_OB where (OSB1.CEX = ?) and (OS_OB.KOB = ?) and (OSB1.KODT = ?) and (DD = $today) and (OSB1.CEX = KCEX_GD.CEX) and (OSB1.CEX = OS_OB.CEX) and (OSB1.KOB = OS_OB.KOB) and (OSB1.KODT = OS_TEX.KODT) order by INV";
	}
	// Запрос
	
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $ceh, $ob, $nait);
	
	if (!$sth) 
		die(ibase_error());
	
	// Извлечение из БД.
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}

	return $row;	
}

//получение объектов(подразделения) в цехе
function ob_get($dbh, $ceh)
{
	// Запрос
	$t = "select * from OS_OB where CEX=? order by KOB";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $ceh);
	
	if (!$sth) 
		die(ibase_error());

 // while ($row = ibase_fetch_object($sth)) {
//  echo ("цех-".$row->CEX."об-".$row->NAIO."кодоб-".$row->KOB."отв-".$row->FIOO."<br>");}
		// Извлечение из БД.
		$count = 0;
		while($row[$count] = ibase_fetch_assoc($sth))
		{	
			$count++;
		}
	
	return $row;	
}

//получение объекта по инв номер
function ob_get_inv($dbh, $id_inv, $today)
{
	// Запрос
	$t = "select KOB from OSB1 where INV=? and DD = $today";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $id_inv);
	
	if (!$sth) 
		die(ibase_error());

 // while ($row = ibase_fetch_object($sth)) {
//  echo ("цех-".$row->CEX."об-".$row->NAIO."кодоб-".$row->KOB."отв-".$row->FIOO."<br>");}
	
		// Извлечение из БД. 
	$row = ibase_fetch_assoc($sth);
	return $row;
	
}

// Получение обслуживания по инвентарному номеру
function obsl_get($dbh, $id_inv)
{
	$t = "select * from OBSLS, OS_TN, OS_TIJ, OS_TIR where OBSLS.INV = ? and (OBSLS.TN = OS_TN.TN) and (OBSLS.KODJ = OS_TIJ.KODJ) and (OBSLS.KODR = OS_TIR.KODR)";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $id_inv);
	
	if (!$sth) 
		die(ibase_error());
		
	// Извлечение из БД.
	
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}
	
	return $row;
}

// Получение видов техники цеха
function nait_c_get($dbh, $ceh)
{
$t = "select distinct osb1.kodt, os_tex.nait from OSB1, os_tex where OSB1.CEX = ? and os_tex.kodt = osb1.kodt";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $ceh);
	
	if (!$sth) 
		die(ibase_error());
		
	// Извлечение из БД.
	
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}
	
	return $row;
}

// Получение видов техники подразделения
function nait_ob_get($dbh, $ceh, $ob)
{
$t = "select distinct osb1.kodt, os_tex.nait from OSB1, os_tex where OSB1.CEX = ? and OSB1.KOB = ? and os_tex.kodt = osb1.kodt";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $ceh, $ob);
	
	if (!$sth) 
		die(ibase_error());
		
	// Извлечение из БД.
	
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}
	
	return $row;
}

/*
// Добавлени статьи
function page_add($dbh, $title, $content)
{	
	// Подготовка.
	$title = trim($title);
	$content = trim($content);
	// Проверка.
	if ($title == '')
		return false; 
	// Запрос
	$t = "INSERT INTO BOOK (NAME, CONTENT) VALUES (?, ?)";

	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $title, $content);
	
	if (!$sth) 
		die(ibase_error());
	
	return true;	
}
*/


/*

//редактирование статьи
function page_edit($id, $name, $content, $dbh)
{
	// Подготовка.
	$title = trim($name);
	$content = trim($content);
	// Проверка.
	
	if ($title == '')
	{
		echo 'функция';
		return false;
	}
	
	// Запрос.
	//$t = "UPDATE BOOK SET NAME = '%s', CONTENT = '%s' where ID = '%d'";
	$t = "UPDATE BOOK SET NAME = ?, CONTENT = ? where ID = ?";
	//$squery = sprintf($t,
	//				$name,
	//				$content,
	//				$id);
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $name, $content, $id);
	
	if (!$sth) 
		die(ibase_error());
		
	return true;	
}
*/

/*

// Удалить статью

function page_delete($id_page, $dbh)
{
	// Запрос.
	$t = "DELETE from BOOK where ID = '%d'";
	$squery = sprintf($t,
					$id_page);
	$sth = ibase_query($dbh, $squery);
	
	if (!$sth) 
		die(ibase_error());
		
	return true;
} 

// Короткое описание статьи
//
function articles_intro($book)
{
	// TODO
	// $article - это ассоциативный массив, представляющий статью
	$intro = $book;
	for ($i = 0; $i < count($intro); $i++)
	{
		if (strlen($intro[$i]['CONTENT']) > 100)
		{
			$intro[$i]['CONTENT'] = substr($intro[$i]['CONTENT'], 0, 100) . '...';
		}
	}
	return $intro;	
} 
*/
?>