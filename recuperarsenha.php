<?php
echo '<meta charset=UTF-8>';
include 'conexao/conecta.inc';

$email = $_POST['login'];

$query = "SELECT COD_USUARIO FROM usuario WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);
   $totalUsuarios = mysql_num_rows($result);
   if($totalUsuarios === 0)
       {
       echo '<a href="frmrecuperarsenha.php"> Email invÃ¡lido! </a>';
       }

   else{
       function geraSaltAleatorio($tamanho = 6) {
	return substr(sha1(mt_rand()), 0, $tamanho);  
}
 
$senha_temp = geraSaltAleatorio();
       $subject = "Nova senha - E aÃ­ Gabi?";
       $message = "Sua senha temporÃ¡ria Ã©".$senha_temp;
       mail($email, $subject, $message);
   }

$custo= "08";
$salt="oiujko0987ujikloOOPL00"; 

$senha= crypt($senha_temp ,'$2a$'.$custo.'$'.$salt.'$');

   
  $sql="UPDATE  usuario SET  SENHA_USUARIO = '$senha' WHERE  EMAIL_USUARIO = '$email'";
$resSql = mysql_query($sql);

if($resSql == TRUE)
{
echo '<script>alert("Senha atualizada. Faça login.")</script>';

}

else{
echo '<script>alert("Tente outra vez!")</script>';
}
