<?/*
Шаблон страницы инв номеров объектов
=======================
$invent_ob- техника по объекту:
NAIT - наименование техники
INV - инвентарный номер
NAIM - наименование цеха
CEX - номер цеха
NAIO - объект
MESTO - Место расположения
USIK - Пользователь
FIOC - Ответственный за эксплуатацию по в цехе
GVP - Год выпуска

$ob_ceh - объекты цеха
FIOO - Ответственный за эксплуатацию по объекту
NAIO - наименование объекта
KOB - код объекта

$nait_ob - виды техники подразделения
*/?>
<a href="index.php"><b>Поиск по инвентарному номеру</b></a> | <a href="ceh.php"><b>Выбор цеха</font></b></a>
<br/><br/>
<hr width="100%">
<br/><br/>

<?//выводим подразделения?>
<?php 
if ($ob_ceh[0] == true)
{
	
	echo('
	<table border="1" align="center" cellpadding="1" cellspacing="1">');
		echo('
	
		<tr>');
	if ($_GET['id'] == '95')
	{
		for ($i=0; $i < 16; $i++)
		{
		echo('<td><a href="ceh.php?id=' . $_GET['id'] . '&ob=' .$ob_ceh[$i]['KOB'].'">'.$ob_ceh[$i]['NAIO'].'</a></td>');
		}
		echo('</tr>');
	
		echo('<tr>');
		for ($i=16; $i < (count($ob_ceh)-1); $i++)
		{
			echo('<td><a href="ceh.php?id=' . $_GET['id'] . '&ob=' .$ob_ceh[$i]['KOB'].'">'.$ob_ceh[$i]['NAIO'].'</a></td>');
		}
		echo('</tr>');
		
	
	}
	else
	{	
		for ($i=0; $i < (count($ob_ceh)-1); $i++)
		{
			echo('<td><a href="ceh.php?id=' . $_GET['id'] . '&ob=' .$ob_ceh[$i]['KOB'].'">'.$ob_ceh[$i]['NAIO'].'</a></td>');
		}
		echo('</tr>');
		//выводим	ответственных 
		echo('<tr>');
		for ($i=0; $i < (count($ob_ceh)-1); $i++)
		{
			echo(
				
				'<td>' . $ob_ceh[$i]['FIOO'] . '</td>');
		}
	}
	echo('</tr>');
	echo('<tr><td colspan="17" align ="center"><a href="ceh.php?id=' . $_GET['id'] . '">' . $invent_ceh[0]['NAIM'] .'</a></td>');
	echo('</tr>
	</table>');
}
?>
<br/>
<?//выводим виды техники подразделения?>
<table border="1" align="center" cellpadding="3" cellspacing="1">
<tr>
<?php for ($i=0; $i < (count($nait_ob)-1); $i++): ?>
<td><a href="ceh.php?nait=<?=$nait_ob[$i]['KODT']?>&id=<?=$_GET['id']?>&ob=<?=$_GET['ob']?>"><?=$nait_ob[$i]['NAIT']?>
	</a></td>
<?php endfor?>
<td><a href="ceh.php?id=<?=$_GET['id']?>&ob=<?=$_GET['ob']?>"><?='Вся техника'?>
	</a></td>
</tr>
</table>	
<br/>
<b>Количество единиц вычислительной и орг.техники:</b>&nbsp;&nbsp;&nbsp;-&nbsp;<?=(count($invent_ob)-1)?><br/>
<b>Ответственный за эксплуатацию:</b>&nbsp;&nbsp;<?=$ob_ceh[$_GET['ob']-1]['FIOO']?><br/>
<?//выводим таблицу техники?>
<table border="1" align="center" cellpadding="7" cellspacing="3">
<?php for ($i=0; $i < (count($invent_ob)-1); $i++): ?>
 <tr>
	<td><a href="ceh.php?inv=<?=$invent_ob[$i]['INV']?>"><?=$invent_ob[$i]['INV']?>
	</a></td>
	<td><?=$invent_ob[$i]['NAIT']?></td>
	<td>Место расположения: <?=$invent_ob[$i]['MESTO']?></td>
	<td>Пользователь: <?=$invent_ob[$i]['USIK']?></td>
	<td>Год выпуска: <?=$invent_ob[$i]['GVP']?></td>
</tr>
<?php endfor?>
<br/>
<hr width="100%">