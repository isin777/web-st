<?php
function connect()
{
        //��������� ����������� � ��.
        $host = 'ibdc.dmkd.dp.ua:osts';
        $username = 'ISIN';
        $password = '2306';
        //����������� � ��.
        $dbh = ibase_connect($host, $username, $password, 'WIN1251', 0, 3);
        if(!$dbh) die("������ ���������� ". ibase_error());
        return $dbh;

        
        //session_start();
}
