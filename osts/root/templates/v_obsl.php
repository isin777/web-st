<?/*
Шаблон страницы обслуживания по инвентарному номеру
=======================

$obsl_inv - обслужив по инвентарному:

*/?>
<a href="index.php"><b><font color="blue">Поиск по инвентарному номеру</font></b></a> | <b>Просмотр обслуживания</b> | <a href="ceh.php?inv=<?=$_GET['inv_obs']?>"><font color="blue"><b>Х-ки <?=$_GET['inv_obs']?></b></font></a>
<br/><br/>
<hr width="100%">

<table border="1" align="center" cellpadding="7" cellspacing="3">
<?php for ($i=0; $i < (count($obsl_inv)-1); $i++): ?>
<tr>
	<td>Дата: <?=$obsl_inv[$i]['DT1']?></td>
	<td>Тип работ: <?=$obsl_inv[$i]['NAIJ']?></td>
	<td>Результат: <?=$obsl_inv[$i]['NAIR']?></td>
	<td>Исполнитель: <?=$obsl_inv[$i]['FIO']?></td>
</tr>
<?php endfor?>
</table>

<br/><br/>
<hr width="100%">