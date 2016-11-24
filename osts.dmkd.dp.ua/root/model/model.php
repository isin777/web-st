<?php
// ��������� ������� ��  ������������ ������ ��� ����� ��� � ��������  .
function inv_get($dbh, $id_inv, $today)
{
	// ������.
	$t = "select * from OSB1, KCEX_GD, OS_TEX where (INV = ?) and (DD = $today) and (OSB1.CEX = KCEX_GD.CEX) and (OSB1.KODT = OS_TEX.KODT)";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $id_inv);
	
	if (!$sth) 
		die(ibase_error()); 
    
	// ���������� �� ��. 
	$row = ibase_fetch_assoc($sth);
	return $row; 
}
// ��������� ������� ��  ������������ ������ � ������ ��� � ��������.
function inv_get_ob($dbh, $id_inv, $today)
{
	// ������.
	$t = "select * from OSB1, KCEX_GD, OS_TEX, OS_OB where (INV = ?) and (DD = $today) and (OSB1.CEX = KCEX_GD.CEX) and (OSB1.CEX = OS_OB.CEX) and (OSB1.KOB = OS_OB.KOB) and (OSB1.KODT = OS_TEX.KODT)";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $id_inv);
	
	if (!$sth) 
		die(ibase_error()); 
    
	// ���������� �� ��. 
	$row = ibase_fetch_assoc($sth);
	return $row; 
}

// ��������� ������������� �������
function haract_get($dbh, $id_inv, $today)
{
	// ������.
	$t = "select * from OSB1S, OS_XK where (INV = ?) and (DD = $today) and (OSB1S.KODX = OS_XK.KODX) order by OSB1S.KODX";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $id_inv);
	
	if (!$sth) 
		die(ibase_error()); 
    //while ($row = ibase_fetch_object($sth)) {
  //echo ($row->XK.$row->NAIX."<br>");}
	// ���������� �� ��.
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}
	return $row; 
}

//��������� ������� �����
function list_ceh($dbh)
{
	// ������
	$query = "select * from KCEX_GD order by NAIM";
	$sth = ibase_query($dbh, $query);
	
	if (!$sth) 
		die(ibase_error());
	
	// ���������� �� ��.
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}

	return $row;	
}

// ��������� ����������� ������� �� ��������� ���� ��� ���������� �� ��������
function inv_ceh($dbh, $ceh, $nait_ceh, $today)
{
	// ������
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
	
	// ���������� �� ��.
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}

	return $row;	
}

// ��������� ����������� ������� �� ��������� ���� � �������
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
	// ������
	
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $ceh, $ob, $nait);
	
	if (!$sth) 
		die(ibase_error());
	
	// ���������� �� ��.
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}

	return $row;	
}

//��������� ��������(�������������) � ����
function ob_get($dbh, $ceh)
{
	// ������
	$t = "select * from OS_OB where CEX=? order by KOB";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $ceh);
	
	if (!$sth) 
		die(ibase_error());

 // while ($row = ibase_fetch_object($sth)) {
//  echo ("���-".$row->CEX."��-".$row->NAIO."�����-".$row->KOB."���-".$row->FIOO."<br>");}
		// ���������� �� ��.
		$count = 0;
		while($row[$count] = ibase_fetch_assoc($sth))
		{	
			$count++;
		}
	
	return $row;	
}

//��������� ������� �� ��� �����
function ob_get_inv($dbh, $id_inv, $today)
{
	// ������
	$t = "select KOB from OSB1 where INV=? and DD = $today";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $id_inv);
	
	if (!$sth) 
		die(ibase_error());

 // while ($row = ibase_fetch_object($sth)) {
//  echo ("���-".$row->CEX."��-".$row->NAIO."�����-".$row->KOB."���-".$row->FIOO."<br>");}
	
		// ���������� �� ��. 
	$row = ibase_fetch_assoc($sth);
	return $row;
	
}

// ��������� ������������ �� ������������ ������
function obsl_get($dbh, $id_inv)
{
	$t = "select * from OBSLS, OS_TN, OS_TIJ, OS_TIR where OBSLS.INV = ? and (OBSLS.TN = OS_TN.TN) and (OBSLS.KODJ = OS_TIJ.KODJ) and (OBSLS.KODR = OS_TIR.KODR)";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $id_inv);
	
	if (!$sth) 
		die(ibase_error());
		
	// ���������� �� ��.
	
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}
	
	return $row;
}

// ��������� ����� ������� ����
function nait_c_get($dbh, $ceh)
{
$t = "select distinct osb1.kodt, os_tex.nait from OSB1, os_tex where OSB1.CEX = ? and os_tex.kodt = osb1.kodt";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $ceh);
	
	if (!$sth) 
		die(ibase_error());
		
	// ���������� �� ��.
	
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}
	
	return $row;
}

// ��������� ����� ������� �������������
function nait_ob_get($dbh, $ceh, $ob)
{
$t = "select distinct osb1.kodt, os_tex.nait from OSB1, os_tex where OSB1.CEX = ? and OSB1.KOB = ? and os_tex.kodt = osb1.kodt";
	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $ceh, $ob);
	
	if (!$sth) 
		die(ibase_error());
		
	// ���������� �� ��.
	
	$count = 0;
	while($row[$count] = ibase_fetch_assoc($sth))
	{	
		$count++;
	}
	
	return $row;
}

/*
// ��������� ������
function page_add($dbh, $title, $content)
{	
	// ����������.
	$title = trim($title);
	$content = trim($content);
	// ��������.
	if ($title == '')
		return false; 
	// ������
	$t = "INSERT INTO BOOK (NAME, CONTENT) VALUES (?, ?)";

	$query = ibase_prepare($dbh, $t);
	$sth = ibase_execute($query, $title, $content);
	
	if (!$sth) 
		die(ibase_error());
	
	return true;	
}
*/


/*

//�������������� ������
function page_edit($id, $name, $content, $dbh)
{
	// ����������.
	$title = trim($name);
	$content = trim($content);
	// ��������.
	
	if ($title == '')
	{
		echo '�������';
		return false;
	}
	
	// ������.
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

// ������� ������

function page_delete($id_page, $dbh)
{
	// ������.
	$t = "DELETE from BOOK where ID = '%d'";
	$squery = sprintf($t,
					$id_page);
	$sth = ibase_query($dbh, $squery);
	
	if (!$sth) 
		die(ibase_error());
		
	return true;
} 

// �������� �������� ������
//
function articles_intro($book)
{
	// TODO
	// $article - ��� ������������� ������, �������������� ������
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