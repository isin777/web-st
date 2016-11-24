<?php
function connect()
{
        //Настройки подключения к БД.
        $host = 'ibdc.dmkd.dp.ua:osts';
        $username = 'ISIN';
        $password = '2306';
        //Подключение к БД.
        $dbh = ibase_connect($host, $username, $password, 'WIN1251', 0, 3);
        if(!$dbh) die("ошибка соединения ". ibase_error());
        return $dbh;

        
        //session_start();
}
