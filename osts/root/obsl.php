<?php
//����������� ���������
include_once('connection.php');
include_once('model/model.php');
include_once('view.php');
$dbh = connect();  
// ������� ������������
if (isset($_GET['inv_obs']))
{
	$id_inv = $_GET['inv_obs'];
	$today = date("ym");
	//��������� ��������
	$title = '������������ ������� ���. � ' . $id_inv;
	$obsl_inv = obsl_get($dbh, $id_inv);
	//������� ������������
	// ���������� ������
	$content = view_include('templates/v_obsl.php', array('obsl_inv' => $obsl_inv));
}	


// ������� ������.
$page = view_include(
	'templates/main.php', 
	array('title' => $title, 'content' => $content));

// �����.
echo $page; 