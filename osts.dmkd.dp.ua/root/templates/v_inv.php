<?/*
Шаблон страницы вывод х-ки по инвентарному номеру
=======================

$invent- техника по инвентарному:
INV - инвентарный номер
NAIT - наименование техники
NAIM - наименование цеха
CEX - номер цеха
NAIO - объект
MESTO - Место расположения
USIK - Пользователь
FIOO - Ответственный за эксплуатацию
GVP - Год выпуска

$har - характеристика техники
NAIX - наименование х-ки
XK - значение х-ки 
*/?>
<a href="index.php"><font color="blue"><b>Поиск по инвентарному номеру</b></font></a> | <a href="ceh.php"><b><font color="blue">Выбор Цеха</font></b></a> | <a href="ceh.php?id=<?=$invent['CEX']?>"><b><font color="blue">Просмотр <?=$invent['NAIM']?></font></b></a>
<br/><br/>
<hr width="100%">
<h2 align="center" ><?=$invent['NAIT']?></h2>
<hr width="100%">
<h4 align="center">Инвентарный номер: <?=$invent['INV']?></h4>
<table border="1" align="center" cellpadding="10" cellspacing="5">
<tr>
	<td>Цех: <?=$invent['CEX']?> <?=$invent['NAIM']?></td>
	<td>Подразделение: <?=$invent['NAIO']?></td>
	<td>Место расположения: <?=$invent['MESTO']?></td>
</tr>
<tr>
	<td>Пользователь: <?=$invent['USIK']?></td>
	<td>Ответственный за эксплуатацию: <?=$invent['FIOO']?><?=$invent['FIOC']?></td>
	<td>Год выпуска: <?=$invent['GVP']?></td>
</tr>
</table>
<h4 align="center">Характеристики</h4>
<table border="1" align="center" cellpadding="10" cellspacing="5">
<?php for ($i = 0; $i < (count($har)-1); $i++): ?>
	<tr>
		<td><?=$har[$i]['NAIX']?></td>
		<td><?=$har[$i]['XK']?></td>
	</tr>
<?php endfor?>
</table>


	<a href="obsl.php?inv_obs=<?=$invent['INV']?>"><font color="blue"><p align="center"><b><?=Обслуживание?></b></p></font></a>
	
<br/><br/>
<hr width="100%">


