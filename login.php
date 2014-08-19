<?php

echo '<meta charset=UTF-8>';
include_once 'conexao/conecta.inc';

if(isset($_POST['email']) and isset ($_POST['senha']))
{
   $email = $_POST['email'];
   $senhan = $_POST['senha'];
   
   $custo= "08";
   $salt="oiujko0987ujikloOOPL00"; 

   $senha= crypt($senhan ,'$2a$'.$custo.'$'.$salt.'$');

   $query = "SELECT * FROM usuario WHERE EMAIL_USUARIO='$email'";
   $result = mysql_query($query);
   $totalUsuarios = mysql_num_rows($result);
   if($totalUsuarios === 0)
       {
       echo '<a href="frmlogin.php"> Usuário Inexistente </a>';
       }
   else
       {
       $usuarios = mysql_fetch_array($result);
       $senhaUsuario = $usuarios['SENHA_USUARIO'];
       $tipoUsuario = $usuarios['TIPO_USUARIO'];
       
       if($senha !== $senhaUsuario)
       {
           echo '<a href="frmlogin.php" Senha não confere!</a>';
       }
       else
       {
           // agora sim estão corretos email e senha
           session_start();
           $_SESSION['email'] = $email;
           $_SESSION['senha'] = $senha;
           
           //agora vamos direcionar o usuário para seu ambiente (RESTRITO ou ADMINISTRATIVO))
           if($tipoUsuario === 'RES')
           {
               echo '<script type="text/javascript">
               location.href="indexrestrito.php"
                     </script>';
           }
           elseif($tipoUsuario === 'ADM')
           {
               echo '<script type="text/javascript">
               location.href="admin/indexadmin.php"
                     </script>';
           }
           else
           {
               //caso seja cadastrado um tipo usuário diferente de ADM ou RES 
               echo '<a href=frmlogin.php> Tipo de Usuário Inválido!</a>';
           }
       }
       }
}
else
{
    //Caso algum usuário tente acessar o arquivo login diretamente sem passar pelo frmlogin.php
    echo '<script type="text/javascript">
          location.href="frmlogin.php"
          </script>';
}
