<?php
//configuração
$serverhost = 'localhost';
$user = 'root';
$password = '12345678';
$database = 'loginoficial3ddb';

//estabelecendo a conexão e selecionando o banco de dados
$connection = mysql_connect($serverhost,$user,$password);
mysql_select_db($database,$connection);

//montando a query
$query= "SELECT EMAIL_USUARIO FROM usuario WHERE EMAIL_USUARIO='$email'";

//executando a query
$result = mysql_query($query);

//criando uma matriz para armazenar os emails cadastrados
$emailsCadastrados = array();

//carregando a matriz com os emails do banco de dados

while($usuaruips = mysql_fetch_assoc($result))
{
    $emailsCadastrados[] = $usuarios['EMAIL_USUARIO'];
}

//a função in_array(), verifica a existência de um certo valor dentro de uma matriz qualquer.
// a função recebe dois parâmetros: "o valor a ser persquisado" e "a matriz" objeto da busca.
//veja:

if(in_array($email, $emailsCadastrados))
{
    echo'false';
}
 else 
 {
     echo'true';
 }     
 exit();