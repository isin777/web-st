<?/*
Шаблон страницы выбора цехов
=======================
$all_ceh - список цехов:
CEX - идентификатор цеха
NAIM - наименование цеха
*/?>
<a href="index.php"><b><font color="blue">Поиск по инвентарному номеру</font></b></a> | <b>Выбор цеха</b>
<br/><br/>
<hr width="100%">
<table border="1" align="center" cellpadding="5" cellspacing="3">
	<?php for ($i=0; $i < (count($all_ceh)-1); $i++): ?>
	<tr>
		<td><a href="ceh.php?id=<?=$all_ceh[$i]['CEX']?>"><?=$all_ceh[$i]['NAIM']?></a></td>
		<td><?=$all_ceh[$i]['CEX']?></td>
	</tr>
	<?php endfor?>
</table>
<br/>
<hr width="100%">