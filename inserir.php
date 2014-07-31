<?php
echo'<meta charset = "UTF-8">';

include_once'conexao/conecta.inc';


   $nome = $_POST['nome'];
   $email = $_POST['login'];
   $senhan = $_POST['senha'];
   $custo= "08";

   $salt="oiujko0987ujikloOOPL00"; 
   $senha= crypt($senhan ,'$2a$'.$custo.'$'.$salt.'$');

   $tipoUsuario = 'RES';
 

//inserindo dados
 $query = "INSERT INTO  usuario  (NOME_USUARIO,EMAIL_USUARIO,SENHA_USUARIO, TIPO_USUARIO)";
 $query.= " VALUES ('$nome', '$email', '$senha', '$tipoUsuario')";
 
 if(mysql_query($query))
 {
     echo '<script> alert("Cadastro efetuado com sucesso!")</script>';
     echo '<a href=frmlogin.php> Efetuar login</a>';
 }
 
 else
 {
     echo '<script> alert ("Não foi possível realizar seu cadastro!") 
          location.href="index.php"
          </script>';
     
     
 }

 
