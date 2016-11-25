<?php
//����������� ���������
include_once('connection.php');
include_once('model/model.php');
include_once('view.php');

$dbh = connect();  

//��������� ��������
$title = '����� ��������-����������� �������. ���� �������������� � ����������';

//���������� ������
if (isset($_POST['inv']))
        {
                $id_inv = $_POST['inv'];
                $today = date("ym");
                $ob_ceh = ob_get($dbh, $ceh);
                //�������� ������� ������� � ���� � ���� ��� ������, ������ � �������� ��� ���
                $ob_inv = ob_get_inv($dbh, $id_inv, $today);
                if ($ob_inv['KOB'] == '0' || $ob_inv['KOB'] == '200')
                {   
                        $invent = inv_get($dbh, $id_inv, $today);
                }
                else
                {
                        $invent = inv_get_ob($dbh, $id_inv, $today);
                }
                $har = haract_get($dbh, $id_inv, $today);
                                                
                //������� ������� ��  ������������ ������
                // ���������� ������
                $content = view_include('templates/v_inv.php', array('invent' => $invent, 'har' => $har)); 
        }
else
{

// ���������� ������. ������� ���� ����� ���. ������
$content = view_include('templates/v_index.php'); 


}

// ������� ������.
$page = view_include(
        'templates/main.php', 
        array('title' => $title, 'content' => $content));

// �����.
echo $page; 
