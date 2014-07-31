
<!DOCTYPE html>
<html>
    <head>
        <title> Formulário</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="#">
    </head>    
    <body>
        <?php
              include 'conexao/conecta.inc';
              $codigo_usuario = $_REQUEST['codigo'];
              
              //echo '<h1>'.$codigo_usuario.'</h1>';
              $sql = "SELECT * FROM usuarios WHERE COD_USUARIO ='$codigo_usuario'";
              $result = mysql_query($sql);
              $usuarios = mysql_fetch_array($result);
        ?>
        
        <form action="atualizarUsuario.php" method="post">
           Nome: <input type="text" name="nome" required  value="<?php echo $usuarios['NOME_USUARIO'] ?>"> <br/>
           Senha: <input type="password" name="senha" required value="<?php echo $usuarios['SENHA_USUARIO']?>"> <br/>
           Email: <input type="email" name="email" required value="<?php echo $usuarios['EMAIL_USUARIO']?>"> <br/>
           Tipo de usuário:
              <select name="tipo">
           <?php 
              $tipo = $usuarios['TIPO_USUARIO'];
               if($tipo === 'ADM')
               {
                   echo '<option selected> ADM </option>';
                   echo '<option> RES </option>';
               }
               else
               {
                 echo '<option selected> RES </option>';  
                 echo '<option> ADM </option>';
               }
              ?>
            </select> <br/>
           CPF: <input type="text" name="cpf" required><br/>
           Logradouro: <input type="text" name="endereco" required> <br/>
           CEP: <input type="text" name="cep" required><br/>
           <input type="submit" value="Cadastrar" >
           </form>
        
        
    </body>
</html>

