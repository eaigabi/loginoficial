<?php
//configuração 
$serverhost = 'localhost';
$user       = 'root';
$password   = '12345678';
$database   = 'loginoficial3ddb';
//Estabelecendo a conexão

$connection = mysql_connect($serverhost, $user, $password);
if($connection === FALSE)
{
    echo 'Não foi possível estabelecer conexão com o gerenciador Mysql </br>';
    echo mysql_error();
}
else{
    if(!mysql_select_db($database,$connection))
     {
       echo 'Não foi possível selecionar o banco de dados'.$database.'</br>';
       echo mysql_error();
     }
}
