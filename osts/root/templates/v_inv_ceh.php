<?/*
������ �������� ������ ��� ������� ����
=======================
$invent_ceh- ������� �� ����:
NAIT - ������������ �������
INV - ����������� �����
NAIM - ������������ ����
CEX - ����� ����
NAIO - ������
MESTO - ����� ������������
USIK - ������������
FIOC - ������������� �� ������������ �� � ����
GVP - ��� �������

$ob_ceh - ������� ����
FIOO - ������������� �� ������������ �� �������
NAIO - ������������ �������
KOB - ��� �������

$nait_ceh - ���� ������� ����

*/?>
<a href="index.php"><font color="blue"><b>����� �� ������������ ������</b></font></a> | <a href="ceh.php"><b><font color="blue">����� ����</font></b></a>
<br/><br/>

<hr width="100%">
<br/>

<?//������� �������������?>
<?php 
if ($ob_ceh[0] == true)
{
	
	echo('
	<table border="1" align="center" cellpadding="1" cellspacing="1">');
		echo('
	
		<tr>');
	if ($_GET['id'] == '95')
	{
		for ($i=0; $i < 18; $i++)
		{
		echo('<td><a href="ceh.php?id=' . $_GET['id'] . '&ob=' .$ob_ceh[$i]['KOB'].'">'.$ob_ceh[$i]['NAIO'].'</a></td>');
		}
		echo('</tr>');
	
		echo('<tr>');
		for ($i=18; $i < (count($ob_ceh)-1); $i++)
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
		//�������	������������� 
		echo('<tr>');
		for ($i=0; $i < (count($ob_ceh)-1); $i++)
		{
			echo(
				
				'<td>' . $ob_ceh[$i]['FIOO'] . '</td>');
		}
	}
	echo('</tr>');
	echo ('</table>');
}
?>
<b>���������� ������ �������������� � ���.�������:</b>&nbsp;&nbsp;&nbsp;-&nbsp;<?=(count($invent_ceh)-1)?><br/>
<?php
if ($ob_ceh[0] == false)
{
echo('<b>������������� �� ������������:</b>&nbsp;&nbsp;' . $invent_ceh[0]['FIOC'] . '<br/>');
}
?>
<br/>
<?//������� ���� ������� ����?>
<table border="1" align="center" cellpadding="3" cellspacing="1">
<tr>
<?php for ($i=0; $i < (count($nait_ceh)-1); $i++): ?>
<td><a href="ceh.php?nait=<?=$nait_ceh[$i]['KODT']?>&id=<?=$_GET['id']?>"><?=$nait_ceh[$i]['NAIT']?>
	</a></td>
<?php endfor?>

<td><a href="ceh.php?id=<?=$_GET['id']?>"><?='��� �������'?>
	</a></td>
</tr>
</table>	
<br/>
<?//������� �������� �������?>
<table border="1" align="center" cellpadding="5" cellspacing="3">
<tr>
	<td>����������� �����:</td>
	<td>��� �������:</td>
	<?php if ($ob_ceh[0] == true):?>
	<td>�������������:</td>
	<?php endif?>
	<td>����� ������������:</td>
	<td>������������:</td>
	<td>��� �������:</td>
</tr>	
<?php for ($i=0; $i < (count($invent_ceh)-1); $i++): ?>
 <tr>
	<td><a href="ceh.php?inv=<?=$invent_ceh[$i]['INV']?>"><?=$invent_ceh[$i]['INV']?>
	</a></td>
	<td><?=$invent_ceh[$i]['NAIT']?></td>
	<?php if ($ob_ceh[0] == true):?>
	<td><?=$ob_ceh[($invent_ceh[$i]['KOB']-1)]['NAIO']?></td>
	<?php endif?>
	<td><?=$invent_ceh[$i]['MESTO']?></td>
	<td><?=$invent_ceh[$i]['USIK']?></td>
	<td><?=$invent_ceh[$i]['GVP']?></td>
</tr>
<?php endfor?>
</table>
<br/>
<hr width="100%">