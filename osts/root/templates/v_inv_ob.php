<?/*
������ �������� ��� ������� ��������
=======================
$invent_ob- ������� �� �������:
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

$nait_ob - ���� ������� �������������
*/?>
<a href="index.php"><b>����� �� ������������ ������</b></a> | <a href="ceh.php"><b>����� ����</font></b></a>
<br/><br/>
<hr width="100%">
<br/><br/>

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
		//�������	������������� 
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
<?//������� ���� ������� �������������?>
<table border="1" align="center" cellpadding="3" cellspacing="1">
<tr>
<?php for ($i=0; $i < (count($nait_ob)-1); $i++): ?>
<td><a href="ceh.php?nait=<?=$nait_ob[$i]['KODT']?>&id=<?=$_GET['id']?>&ob=<?=$_GET['ob']?>"><?=$nait_ob[$i]['NAIT']?>
	</a></td>
<?php endfor?>
<td><a href="ceh.php?id=<?=$_GET['id']?>&ob=<?=$_GET['ob']?>"><?='��� �������'?>
	</a></td>
</tr>
</table>	
<br/>
<b>���������� ������ �������������� � ���.�������:</b>&nbsp;&nbsp;&nbsp;-&nbsp;<?=(count($invent_ob)-1)?><br/>
<b>������������� �� ������������:</b>&nbsp;&nbsp;<?=$ob_ceh[$_GET['ob']-1]['FIOO']?><br/>
<?//������� ������� �������?>
<table border="1" align="center" cellpadding="7" cellspacing="3">
<?php for ($i=0; $i < (count($invent_ob)-1); $i++): ?>
 <tr>
	<td><a href="ceh.php?inv=<?=$invent_ob[$i]['INV']?>"><?=$invent_ob[$i]['INV']?>
	</a></td>
	<td><?=$invent_ob[$i]['NAIT']?></td>
	<td>����� ������������: <?=$invent_ob[$i]['MESTO']?></td>
	<td>������������: <?=$invent_ob[$i]['USIK']?></td>
	<td>��� �������: <?=$invent_ob[$i]['GVP']?></td>
</tr>
<?php endfor?>
<br/>
<hr width="100%">