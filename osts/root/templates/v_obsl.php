<?/*
������ �������� ������������ �� ������������ ������
=======================

$obsl_inv - �������� �� ������������:

*/?>
<a href="index.php"><b><font color="blue">����� �� ������������ ������</font></b></a> | <b>�������� ������������</b> | <a href="ceh.php?inv=<?=$_GET['inv_obs']?>"><font color="blue"><b>�-�� <?=$_GET['inv_obs']?></b></font></a>
<br/><br/>
<hr width="100%">

<table border="1" align="center" cellpadding="7" cellspacing="3">
<?php for ($i=0; $i < (count($obsl_inv)-1); $i++): ?>
<tr>
	<td>����: <?=$obsl_inv[$i]['DT1']?></td>
	<td>��� �����: <?=$obsl_inv[$i]['NAIJ']?></td>
	<td>���������: <?=$obsl_inv[$i]['NAIR']?></td>
	<td>�����������: <?=$obsl_inv[$i]['FIO']?></td>
</tr>
<?php endfor?>
</table>

<br/><br/>
<hr width="100%">